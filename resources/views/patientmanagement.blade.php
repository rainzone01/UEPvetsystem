<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>
    <link rel="stylesheet" href="{{ asset('css/patientmanagement.css') }}">
    <script>
       // Script to handle the modal display and cancel button functionality
       document.addEventListener('DOMContentLoaded', function() {
            const addPatientButton = document.getElementById('addPatientButton');
            const formModal = document.getElementById('formModal');
            const cancelButton = document.getElementById('cancelButton');
            const closeModalButton = document.getElementById('closeModal');

            addPatientButton.addEventListener('click', function() {
                formModal.style.display = 'block';
            });

            cancelButton.addEventListener('click', function() {
                formModal.style.display = 'none';
            });

            closeModalButton.addEventListener('click', function() {
                formModal.style.display = 'none';
            });

            // Close modal if user clicks outside of it
            window.addEventListener('click', function(event) {
                if (event.target === formModal) {
                    formModal.style.display = 'none';
                }
            });
        });

        // Function to filter patient records based on search input
        function searchRecords() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const patientCards = document.querySelectorAll('.patient-card');
            patientCards.forEach(card => {
                const patientName = card.querySelector('.patient-info p:first-child').textContent.toLowerCase();
                card.style.display = patientName.includes(searchInput) ? '' : 'none';
            });
        }
    </script>
</head>
<body>
    <h1 style="font-family: Arial; font-weight: lighter; color: #4a90e2;">Patients</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add Patient Button -->
    <button class="add-patient-btn" id="addPatientButton">+ Add Patient</button>
    <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchRecords()">

    <!-- Modal Form for Adding Patient -->
    <div id="formModal" style="display:none;">
        <div class="modal-content">
        <span class="close-btn" id="closeModal">&times;</span>
            <h2>Add New Patient</h2>
            <form method="POST" action="{{ route('vet_patients.store') }}">
                @csrf
                <label for="patientName">Patient Name:</label>
                <input type="text" id="patientName" name="patientName" required>

                <label for="patientID">Patient ID:</label>
                <input type="text" id="patientID" name="patientID" required>

                <label for="animalType">Type of Animal:</label>
                <select id="animalType" name="animalType" required>
                    <option value="">Select Animal Type</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                    <option value="Rabbit">Rabbit</option>
                    <option value="Other">Other</option>
                </select>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>

                <label for="diagnosis">Diagnosis:</label>
                <input type="text" id="diagnosis" name="diagnosis" required>

                <button type="submit">Submit</button>
                <button type="button" id="cancelButton">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Patient Cards -->
    <div id="patientCards">
        @forelse ($patients as $patient)
            <div class="patient-card">
                <img src="{{ $patient->image ? asset('storage/' . $patient->image) : 'https://via.placeholder.com/100' }}" alt="Patient Picture">
                <div class="patient-info">
                    <p><strong>Name:</strong> {{ $patient->name }}</p>
                    <p><strong>Patient ID:</strong> {{ $patient->patient_id }}</p>
                    <p><strong>Type of Animal:</strong> {{ $patient->animal_type }}</p>
                    <p><strong>Age:</strong> {{ $patient->age }} Years</p>
                    <p><strong>Date of Birth:</strong> {{ $patient->dob }}</p>
                    <p><strong>Diagnosis:</strong> {{ $patient->diagnosis }}</p>
            <form action="{{ route('vet_patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                @csrf
                @method('DELETE') <!-- This will override the method to DELETE -->
                <button class="delete-btn" type="submit">Delete</button>
            </form>
                </div>
            </div>
        @empty
            <p>No patients found.</p>
        @endforelse
    </div>
</body>
</html>
