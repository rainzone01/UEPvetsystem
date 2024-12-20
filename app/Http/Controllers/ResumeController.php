<?php
//Controller for handling resume 
namespace App\Http\Controllers;

use App\Models\Application; // Adjust to your specific model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Adjust size limit as needed
        ]);

        if ($request->hasFile('resume')) {
            // Get the uploaded file
            $file = $request->file('resume');
            
            // Store the file in the 'public/resumes' directory
            $path = $file->storeAs('public/resumes', $file->getClientOriginalName());

            // Save the file path in the database (for example, in the 'Staff' model)
            // Replace 'Staff' with your model and field as needed
            $record = new Application(); // Replace 'Staff' with your actual model
            $record->resume = 'resumes/' . $file->getClientOriginalName(); // Store relative path in DB
            $record->save();
        }

        return back()->with('success', 'Resume uploaded successfully!');
    }

    public function show($filename)
    {
        // Ensure the file exists in the public directory
        if (Storage::exists('public/resumes/' . $filename)) {
            // Return the file for viewing
            return response()->file(storage_path('app/public/resumes/' . $filename));
        } else {
            // Return an error if the file doesn't exist
            return abort(404, 'File not found');
        }
    }
}
