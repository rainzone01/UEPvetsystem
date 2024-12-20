<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records Table</title>
    <link rel="stylesheet" href="{{ asset('css/medicalrecords.css') }}">
</head>
<body>

<h1 style="font-family: Arial; font-weight: lighter; color: #4a90e2;">Medical Records</h1>


<button class="add-record-btn" id="addRecordBtn">+Add Record</button>
<input type="text" id="searchInput" placeholder="Search..." onkeyup="searchRecords()">

<table id="recordsTable">
    <thead>
        <tr>
            <th>Record ID</th>
            <th>Patient ID</th>
            <th>Owner</th>
            <th>Pet Name</th>
            <th>Medical Record File</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->record_id }}</td>
                <td>{{ $record->patient_id }}</td>
                <td>{{ $record->owner_name }}</td>
                <td>{{ $record->pet_name }}</td>
                <td><a href="{{ asset('storage/' . $record->medical_file) }}" target="_blank">View File</a></td>
                <td>{{ \Carbon\Carbon::parse($record->date_created)->format('Y-m-d') }}</td>
                <td>
    <form action="{{ route('med_records.delete', $record->record_id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="deleteRecord({{ $record->record_id }})" style="text-decoration: none; color: red; border: none; background-color: rgb(221, 221, 221); font-size: 16px;">Delete</button>
    </form>
</td>
            </tr>
        @endforeach
    </tbody>
</table>


<div id="addRecordModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeModal">&times;</span>
        <h3>Add Medical Record</h3>
        <form id="addRecordForm" enctype="multipart/form-data" method="POST" action="{{ route('med_records.store') }}">
            @csrf
            <div class="form-group">
                <label for="patientID">Patient ID:</label>
                <input type="text" id="patientID" name="patient_id" required>
            </div>
            <div class="form-group">
                <label for="ownerName">Owner:</label>
                <input type="text" id="ownerName" name="owner_name" required>
            </div>
            <div class="form-group">
                <label for="petName">Pet Name:</label>
                <input type="text" id="petName" name="pet_name" required>
            </div>
            <div class="form-group">
                <label for="medicalFile">Medical Record File:</label>
                <input type="file" id="medicalFile" name="medical_file" required>
            </div>
            <div class="form-group">
                <label for="dateCreated">Date Created:</label>
                <input type="date" id="dateCreated" name="date_created" required>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>

<script>
 
var modal = document.getElementById("addRecordModal");
var btn = document.getElementById("addRecordBtn");
var closeBtn = document.getElementById("closeModal");


btn.onclick = function() {
    modal.style.display = "block";
}


closeBtn.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


document.getElementById("addRecordForm").onsubmit = function(event) {
    event.preventDefault();  

    var formData = new FormData(this);

    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "{{ route('med_records.store') }}", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
           
            var newRow = document.createElement("tr");
            newRow.innerHTML = xhr.responseText; 
            document.querySelector("#recordsTable tbody").appendChild(newRow);
            modal.style.display = "none";  
            location.reload();  
        } else {
            alert("Error: " + xhr.status);
        }
    };
    xhr.send(formData);  
};

// Search functionality
function searchRecords() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const tableRows = document.querySelectorAll('#recordsTable tbody tr');

    tableRows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let rowContainsSearchTerm = false;

        for (let cell of cells) {
            if (cell.innerText.toLowerCase().includes(searchInput)) {
                rowContainsSearchTerm = true;
                break;
            }
        }

        row.style.display = rowContainsSearchTerm ? '' : 'none';
    });
}

function deleteRecord(recordId) {
    // Log to confirm the function is triggered
    console.log('Delete function triggered for record ID: ' + recordId);  
    
    // Ask the user for confirmation before proceeding with the deletion
    if (confirm('Are you sure you want to delete this record?')) {
        
        const xhr = new XMLHttpRequest();
        xhr.open('DELETE', '/med_records/' + recordId, true);  // Send DELETE request to backend

        // Set CSRF token for Laravel
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');  // Replace this with your server-side CSRF token if needed

        // Handle the response after the request is processed
        xhr.onload = function() {
            if (xhr.status === 200) {
                // On successful deletion, show the success alert and reload the page
                alert("Medical Record Deleted Successfully.");
                location.reload();  // Reload the page to reflect the deletion
            } else {
                // If an error occurred, show an error message
                alert('Error: Could not delete the record.');
            }
        };

        // Send the request to the backend
        xhr.send();

    } else {
        // If the user cancels, show a cancellation alert
        alert("Record deletion canceled.");
    }
}


</script>

</body>
</html>
