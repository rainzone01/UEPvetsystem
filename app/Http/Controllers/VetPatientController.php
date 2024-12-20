<?php

namespace App\Http\Controllers;
//Controller for Patients Page
use Illuminate\Http\Request;
use App\Models\VetPatient;
use Illuminate\Support\Facades\Storage;


class VetPatientController extends Controller
{
    // Display all patients
    public function index(Request $request)
    {
        $patients = VetPatient::all();

        if ($request->has('json')) {
            return response()->json($patients); 
        }

        return view('patientmanagement', compact('patients'));
    }


    public function store(Request $request)
    {
  
        $data = $request->validate([
            'patientName' => 'required|string|max:255',
            'patientID' => 'required|string|max:255|unique:vet_patients,patient_id',
            'animalType' => 'required|string|max:255',
            'age' => 'required|integer',
            'dob' => 'required|date',
            'diagnosis' => 'required|string|max:255',
        ]);

        VetPatient::create([
            'name' => $data['patientName'],
            'patient_id' => $data['patientID'],
            'animal_type' => $data['animalType'],
            'age' => $data['age'],
            'dob' => $data['dob'],
            'diagnosis' => $data['diagnosis'],
        ]);

    
        return redirect()->route('patientmanagement')->with('success', 'Patient added successfully.');
    }


    public function destroy($id)
    {

        $patient = VetPatient::findOrFail($id);

  
        if ($patient->image) {
            Storage::delete($patient->image);
        }

      
        $patient->delete();

      
        return redirect()->route('patientmanagement')->with('success', 'Patient deleted successfully.');
    }


    public function uploadImage(Request $request)
    {
    
        $data = $request->validate([
            'patientId' => 'required|exists:vet_patients,id', 
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        
        $patient = VetPatient::findOrFail($data['patientId']);

       
        if ($patient->image) {
            Storage::delete($patient->image);
        }

       
        $path = $request->file('image')->store('patients', 'public');

       
        $patient->update(['image' => $path]);

      
        return redirect()->route('patientmanagement')->with('success', 'Image uploaded successfully.');
    }
}
