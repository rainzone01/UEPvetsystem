<?php
//Controller for appointment form page
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'patient_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'service_needed' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^09[0-9]{9}$/|max:11',  // Filipino phone number format
            'appointment_date' => 'required|date|after:today',
        ]);

        try {
            // Create the appointment with the validated data
            Appointment::create([
                'patient_name' => $validated['patient_name'],
                'pet_type' => $validated['pet_type'],
                'service_type' => $validated['service_type'],
                'service_needed' => $validated['service_needed'],
                'phone_number' => $validated['phone_number'],
                'appointment_date' => $validated['appointment_date'],
            ]);

            // Flash a success message
            return redirect()->back()->with('success', 'Appointment successfully created!');
        } catch (\Exception $e) {
            // Handle any errors during the appointment creation process
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
