<?php
//Controller for Application Form
namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'job_role' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'date' => 'required|date',
            'resume' => 'nullable|file|mimes:pdf,docx,jpg,jpeg,png|max:2048', // Allow 'nullable' for resume
        ]);

        // Check if the resume file is uploaded
        if ($request->hasFile('resume')) {
            // Get the original file name
            $fileNameWithExtension = $request->file('resume')->getClientOriginalName();

            // Get the file name without extension
            $fileNameWithoutExtension = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('resume')->getClientOriginalExtension();

            // Create a unique file name to prevent collisions
            $uniqueFileName = $fileNameWithoutExtension . '-' . Str::random(8) . '.' . $extension;

            // Store the resume file in the 'public' disk, inside the 'resumes' folder, using the unique file name
            $request->file('resume')->storeAs('resumes', $uniqueFileName, 'public');
            
            // Save only the file name (without the full path) in the database
            $resumePath = $uniqueFileName;
        } else {
            $resumePath = null; // If no file is uploaded, set the resume path to null
        }

        // Create a new application entry in the database
        Application::create([
            'job_role' => $request->job_role,
            'name' => $request->name,
            'phone' => $request->phone,
            'date' => $request->date,
            'resume' => $resumePath,  // Store only the file name (without the storage path)
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}
