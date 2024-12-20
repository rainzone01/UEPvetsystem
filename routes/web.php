<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminAppointmentsController;
use App\Http\Controllers\VetPatientController;
use App\Http\Controllers\MedRecordController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

Route::get('resumes/{filename}', function ($filename) {
    $path = public_path('storage/resumes/' . $filename);

    if (file_exists($path)) {
        return response()->file($path); // Show the file in the browser
    } else {
        abort(404); // Return 404 if the file doesn't exist
    }
});


// Route to the home page (welcome view)
Route::get('/', function () {
    return view('welcome');
});

// Route to show the appointment form
Route::get('/appointment_form', function () {
    return view('appointment_form');
});

// Route to show the application form, named 'applications.form'
Route::get('/application_form', function () {
    return view('application_form');
})->name('applications.form');

// Route to show the admin login form
Route::get('/login', function () {
    return view('login');
});

// POST route to handle appointment submission, handled by AppointmentController
Route::post('/appointment', [AppointmentController::class, 'store']); //Controller for Appointment

// POST route for submitting applications, handled by ApplicationController
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications'); //Controller for Applications

// Routes for admin login and logout
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login'); // Show login form
Route::post('/admin/login', [AdminLoginController::class, 'login']); // Admin login
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout'); // Admin logout

// Apply middleware to restrict access to authenticated admins only
Route::middleware(['auth:admin'])->group(function () {
    // Admin dashboard route
    Route::get('/admindashboard', function () {
        return view('admindashboard');
    })->name('admindashboard');
});

// Route to show the about page
Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});
// Route to the welcome page (again)
Route::get('/welcome', function () {
    return view('welcome');
});

// Route to patient management view
Route::get('/patientmanagement', function () {
    return view('patientmanagement'); 
});

// Route to medical records view
Route::get('/medicalrecords', function () {
    return view('medicalrecords');
});

// Route to billings view
Route::get('/billings', function () {
    return view('billings');
});

// Route to staff management view
Route::get('/staff', function () {
    return view('staff');
});

// Route to inventory management view
Route::get('/inventory', function () {
    return view('inventory');
});

// Routes for viewing and managing patient appointments by admin
Route::get('/patientappointments', [AdminAppointmentsController::class, 'index'])->name('patientappointments');
Route::resource('appointments', AdminAppointmentsController::class)->except(['create', 'edit']);
Route::post('/appointments', [AdminAppointmentsController::class, 'store'])->name('appointments.store');
Route::delete('/appointments/{id}', [AdminAppointmentsController::class, 'destroy'])->name('appointments.destroy');

// Routes for managing vet patient records
Route::get('/patientmanagement', [VetPatientController::class, 'index'])->name('patientmanagement');
Route::post('/vet_patients', [VetPatientController::class, 'store'])->name('vet_patients.store');
Route::delete('/vet_patients/{id}', [VetPatientController::class, 'destroy'])->name('vet_patients.destroy');
Route::post('/vet_patients/upload-image', [VetPatientController::class, 'uploadImage'])->name('vet_patients.uploadImage');
Route::get('/vet_patients', [VetPatientController::class, 'index'])->name('vet_patients');

// Routes for managing medical records
Route::get('/medicalrecords', [MedRecordController::class, 'index'])->name('medicalrecords');
Route::post('/med_records', [MedRecordController::class, 'store'])->name('med_records.store');
Route::delete('/med_records/{record_id}', [MedRecordController::class, 'destroy'])->name('med_records.delete');
Route::get('/med_records', [MedRecordController::class, 'index'])->name('medicalrecords');
Route::get('/med_records/{record_id}', [MedRecordController::class, 'show'])->name('med_records.show');

// Routes for managing billings and invoices
Route::get('/billings', [PaymentsController::class, 'index'])->name('billings');
Route::post('/invoice', [PaymentsController::class, 'store'])->name('invoice.store'); 
Route::delete('/invoice/{id}', [PaymentsController::class, 'destroy'])->name('invoice.destroy');
Route::get('/invoice', [PaymentsController::class, 'index'])->name('invoice');
Route::get('/invoice/{id}', [PaymentsController::class, 'show'])->name('invoice.show');

// Route to show resumes (dynamic file handling)
Route::get('resume/{filename}', [ResumeController::class, 'show'])->name('resume.show');

// Routes for managing inventory, including medicines and resources
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::post('/add-medicine', [InventoryController::class, 'storeMedicine'])->name('add.medicine');
Route::delete('/delete-medicine/{id}', [InventoryController::class, 'destroyMedicine'])->name('delete.medicine');
Route::post('/add-resource', [InventoryController::class, 'storeResource'])->name('add.resource');
Route::delete('/delete-resource/{id}', [InventoryController::class, 'destroyResource'])->name('delete.resource');
Route::get('/medicines', [InventoryController::class, 'medicines'])->name('medicines');
Route::get('/resources', [InventoryController::class, 'resources'])->name('resources');

// Routes for managing staff (add, delete, fetch staff based on category)
Route::get('/staff/{category}', [StaffController::class, 'fetchStaff'])->name('staff.fetch');
Route::post('/staff/{category}', [StaffController::class, 'addStaff']);
Route::delete('/staff/{category}/{id}', [StaffController::class, 'deleteStaff']);

// Route to show resume (same as above, might be duplicate)
Route::get('resume/{filename}', [ResumeController::class, 'show']);

