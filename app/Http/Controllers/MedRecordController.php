<?php
//Controller for Medical Records
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedRecord;

class MedRecordController extends Controller
{
    
    public function index(Request $request)
    {
        $records = MedRecord::all();

        
        if ($request->query('json') === 'true') {
            return response()->json($records); 
        }


        return view('medicalrecords', compact('records'));
    }

    public function store(Request $request)
    {
  
        $request->validate([
            'patient_id' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'pet_name' => 'required|string|max:255',
            'medical_file' => 'required|file|mimes:pdf,jpeg,png,jpg',
            'date_created' => 'required|date',
        ]);

   
        $filePath = $request->file('medical_file')->store('medical_files', 'public');

   
        MedRecord::create([
            'patient_id' => $request->patient_id,
            'owner_name' => $request->owner_name,
            'pet_name' => $request->pet_name,
            'medical_file' => $filePath,
            'date_created' => $request->date_created,
        ]);

      
        return redirect()->route('medicalrecords')->with('success', 'Record added successfully!');
    }

    public function destroy($record_id)
{

    $record = MedRecord::where('record_id', $record_id)->first();

    if ($record) {

        $record->delete();
        
   
        return redirect()->back()->with('success', 'Medical Record Deleted Successfully');
    }

    return redirect()->back()->with('error', 'Record not found');
}


}