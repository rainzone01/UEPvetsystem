<?php
//Controller for appointments page in admin page
namespace App\Http\Controllers;

use App\Models\AdminAppointment;
use Illuminate\Http\Request;

class AdminAppointmentsController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all appointments
        $appointments = AdminAppointment::all();

        // Check for 'json' query parameter
        if ($request->has('json')) {
            return response()->json($appointments);
        }

        // Default to returning the HTML view
        return view('patientappointments', compact('appointments'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'service_type' => 'required|string|max:255',
            'service_needed' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'appointment_date' => 'required|date',
        ]);

        // Insert the form data into the appointments table
        $appointment = AdminAppointment::create([
            'patient_name' => $request->patient_name,
            'pet_type' => $request->pet_type,
            'service_type' => $request->service_type,
            'service_needed' => $request->service_needed,
            'phone_number' => $request->phone_number,
            'appointment_date' => $request->appointment_date,
        ]);

        // Check if the request is AJAX
        if ($request->ajax()) {
            // Return a JSON response with the newly created appointment
            return response()->json([
                'success' => true,
                'message' => 'Appointment scheduled successfully!',
                'appointment' => $appointment // Return the new appointment data
            ]);
        }

        // If it's not an AJAX request, redirect back with a success message
        return redirect()->route('patientappointments')->with('success', 'Appointment scheduled successfully!');
    }

    public function destroy($id)
    {
        // Find the appointment by ID
        $appointment = AdminAppointment::find($id);

        // Check if appointment exists
        if (!$appointment) {
            return redirect()->route('patientappointments')->with('error', 'Appointment not found.');
        }

        // Delete the appointment
        $appointment->delete();

        // Redirect back with a success message
        return redirect()->route('patientappointments')->with('success', 'Appointment deleted successfully!');
    }
}
