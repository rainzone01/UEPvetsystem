<link rel="stylesheet" href="{{ asset('css/patientappointments.css') }}">


<div class="container">
    <h1 style="font-family: Arial; font-weight: lighter; margin-top: 10px; color: #4a90e2;">Appointments</h1>
    <button id="addAppointmentButton">+ Add Appointment</button>
    <br><br>

    <!-- Success/Error Messages -->
    <div id="messages">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif
    </div>

    <!-- Appointments Table -->
    <div id="appointments">
        <table id="appointmentsTable" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Pet Type</th>
                    <th>Service Type</th>
                    <th>Service Needed</th>
                    <th>Phone Number</th>
                    <th>Appointment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->pet_type }}</td>
                        <td>{{ $appointment->service_type }}</td>
                        <td>{{ $appointment->service_needed }}</td>
                        <td>{{ $appointment->phone_number }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>
                            <!-- Delete Button -->
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; border: none; background: none;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="formModal">
    <div style="background: white; padding: 20px; border-radius: 8px; width: 400px; max-width: 90%; height: 500px; overflow-y: auto; margin: auto;">
        <h2>Add Appointment</h2>
        <form id="appointmentForm" method="POST" action="{{ route('appointments.store') }}">
            @csrf
            <label for="patientName">Patient Name:</label>
            <input type="text" id="patientName" name="patient_name" required>

            <label for="petType">Pet Type:</label>
            <input type="text" id="petType" name="pet_type" required>

            <label for="serviceType">Service Type:</label>
            <input type="text" id="serviceType" name="service_type" required>

            <label for="serviceNeeded">Service Needed:</label>
            <input type="text" id="serviceNeeded" name="service_needed" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phone_number" required>

            <label for="appointmentDate">Appointment Date:</label>
            <input type="date" id="appointmentDate" name="appointment_date" required>

            <div style="margin-top: 15px; text-align: right;">
                <button type="submit" id="submitButton" style="margin-right: 10px;">Submit</button>
                <button type="button" id="cancelButton">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function() {
       // Show the form modal when the "Add Appointment" button is clicked
       $('#addAppointmentButton').on('click', function() {
           $('#formModal').css('display', 'flex');
       });

       // Hide the form modal when the "Cancel" button is clicked
       $('#cancelButton').on('click', function() {
           $('#formModal').hide();
       });

       // Handle form submission with AJAX
       $('#appointmentForm').on('submit', function(event) {
           event.preventDefault(); // Prevent default form submission

           $.ajax({
               url: '{{ route('appointments.store') }}', // Laravel route for form submission
               method: 'POST',
               data: $(this).serialize(),
               success: function(response) {
                   // Check if the response indicates success
                   if (response.success) {
                       alert(response.message); // Show success message

                       // Dynamically append the new appointment data as a row in the table
                       $('#appointmentsTable tbody').append(`
                           <tr>
                               <td>${response.appointment.patient_name}</td>
                               <td>${response.appointment.pet_type}</td>
                               <td>${response.appointment.service_type}</td>
                               <td>${response.appointment.service_needed}</td>
                               <td>${response.appointment.phone_number}</td>
                               <td>${response.appointment.appointment_date}</td>
                               <td>
                                   <form method="POST" action="/appointments/${response.appointment.id}">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" style="color: red; border: none; background: none;">Delete</button>
                                   </form>
                               </td>
                           </tr>
                       `);

                       // Close the modal and reset the form
                       $('#formModal').hide();
                       $('#appointmentForm')[0].reset();
                   } else {
                       alert(response.error); // Show error message if response is not successful
                   }
               },
               error: function(response) {
                   alert('An error occurred. Please try again.'); // Show error if the AJAX request fails
               }
           });
       });
   });
</script>


