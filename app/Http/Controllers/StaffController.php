<?php

namespace App\Http\Controllers;
//Controller for Staff Management Page
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function fetchStaff($category)
{
    $tableMap = [
        'applicants' => ['table' => 'applications', 'columns' => ['applicant_id', 'job_role', 'name', 'phone', 'date', 'resume']],
        'medicalStaff' => ['table' => 'medicalstaff', 'columns' => ['id', 'name', 'role', 'phone_number', 'address', 'email_address']],
        'administrativeStaff' => ['table' => 'administrativestaff', 'columns' => ['id', 'name', 'role', 'phone_number', 'address', 'email_address']],
        'supportStaff' => ['table' => 'supportstaff', 'columns' => ['id', 'name', 'role', 'phone_number', 'address', 'email_address']],
    ];

    // Check if the category is valid
    if (!isset($tableMap[$category])) {
        return response()->json(['error' => 'Invalid category'], 400);
    }

    $tableInfo = $tableMap[$category];

    // Check if the table exists
    if (!DB::getSchemaBuilder()->hasTable($tableInfo['table'])) {
        return response()->json(['error' => 'Table does not exist'], 500);
    }

    // Fetch the records
    $records = DB::table($tableInfo['table'])
        ->select($tableInfo['columns'])
        ->get();

// If category is 'applicants', process the resume field
if ($category === 'applicants') {
    foreach ($records as $record) {
        if (!empty($record->resume)) {
            // Correct path for checking if the resume exists in the storage
            if (Storage::exists('public/resumes/' . $record->resume)) {
                // Generate the correct URL for the stored resume file
                $record->resume = Storage::url('public/resumes/' . $record->resume);
            } else {
                // If resume doesn't exist, set it to null
                $record->resume = null;
            }
        }
    }
}


    // Only remove 'applicant_id' for applicants, don't remove 'id' for others
    $columns = $tableInfo['columns'];

    // Send the response with the columns and records
    return response()->json([
        'columns' => array_values($columns),
        'records' => $records
    ]);
}



    public function addStaff(Request $request, $category)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $tableMap = [
            'medicalStaff' => 'medicalstaff',
            'administrativeStaff' => 'administrativestaff',
            'supportStaff' => 'supportstaff',
        ];

        if (!isset($tableMap[$category])) {
            return response()->json(['error' => 'Invalid category'], 400);
        }

        $data = $request->only(['name', 'role', 'phone_number', 'address', 'email_address']);

        DB::table($tableMap[$category])->insert($data);

        return response()->json(['message' => 'Staff added successfully!'], 200);
    }


    public function deleteStaff($category, $id)
    {
        // Log category and id to ensure we're receiving them correctly
        \Log::info("Delete Request: Category = {$category}, ID = {$id}");
    
        // Ensure category and ID are valid
        if (empty($id) || !is_numeric($id)) {
            return response()->json(['error' => 'Invalid ID provided'], 400);
        }
    
        // Define the table and column mapping
        $tableMap = [
            'medicalStaff' => 'medicalstaff',
            'administrativeStaff' => 'administrativestaff',
            'supportStaff' => 'supportstaff',
            'applicants' => 'applications', // applicants table has a different ID field
        ];
    
        // Check if the category exists in the table mapping
        if (!isset($tableMap[$category])) {
            return response()->json(['error' => 'Invalid category'], 400);
        }
    
        // Get the table name based on category
        $table = $tableMap[$category];
    
        // If category is 'applicants', use applicant_id instead of id
        $column = ($category === 'applicants') ? 'applicant_id' : 'id';
    
        // Log the column being used for deletion
        \Log::info("Deleting from table: {$table}, Column used: {$column}, ID: {$id}");
    
        // Perform the delete operation
        $deleted = DB::table($table)->where($column, $id)->delete();
    
        // Check if the delete was successful
        if ($deleted) {
            return response()->json(['success' => 'Staff deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete staff'], 500);
        }
    }
    
}

