<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Clinic Staff Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/staff.css') }}">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
</head>
<body>
    <div class="container">
        <h1 class="title">Clinic Staff Management</h1>
        
        <!-- Buttons for adding different staff categories -->
        <div class="add-buttons">
            <button id="addMedicalStaffBtn" class="add-btn"><i class="fas fa-user-md"></i> Add MT</button>
            <button id="addAdministrativeStaffBtn" class="add-btn"><i class="fas fa-briefcase"></i> Add AT</button>
            <button id="addSupportStaffBtn" class="add-btn"><i class="fas fa-users"></i> Add ST</button>
        </div>

        <div class="filter">
            <label for="staffCategory">Select Staff Category:</label>
            <select id="staffCategory">
                <option value="applicants">Applicants</option>
                <option value="medicalStaff">Medical Staff</option>
                <option value="administrativeStaff">Administrative Staff</option>
                <option value="supportStaff">Support Staff</option>
            </select>
        </div>

        <!-- Staff Table -->
        <table id="staffTable" class="staff-table">
            <thead>
                <tr>
                    <!-- Header will be dynamically populated -->
                </tr>
            </thead>
            <tbody>
                <!-- Dynamic rows will appear here -->
            </tbody>
        </table>
    </div>

   <!-- Modal for adding Medical Staff -->
<div id="addStaffModal-medicalStaff" class="modal">
    <div class="modal-content">
        <span class="close-modal" data-staff-type="medicalStaff">&times;</span>
        <h2>Add Medical Staff</h2>
        <form id="addMedicalStaffForm">
            <label for="medical_name">Name:</label>
            <input type="text" id="medical_name" name="name" required><br>

            <label for="medical_role">Role:</label>
            <input type="text" id="medical_role" name="role" required><br>

            <label for="medical_phone_number">Phone Number:</label>
            <input type="text" id="medical_phone_number" name="phone_number" required><br>

            <label for="medical_address">Address:</label>
            <input type="text" id="medical_address" name="address" required><br>

            <label for="medical_email_address">Email Address:</label>
            <input type="email" id="medical_email_address" name="email_address" required><br>

            <button type="submit">Add Staff</button>
        </form>
    </div>
</div>

<!-- Modal for adding Administrative Staff -->
<div id="addStaffModal-administrativeStaff" class="modal">
    <div class="modal-content">
        <span class="close-modal" data-staff-type="administrativeStaff">&times;</span>
        <h2>Add Administrative Staff</h2>
        <form id="addAdministrativeStaffForm">
            <label for="admin_name">Name:</label>
            <input type="text" id="admin_name" name="name" required><br>

            <label for="admin_role">Role:</label>
            <input type="text" id="admin_role" name="role" required><br>

            <label for="admin_phone_number">Phone Number:</label>
            <input type="text" id="admin_phone_number" name="phone_number" required><br>

            <label for="admin_address">Address:</label>
            <input type="text" id="admin_address" name="address" required><br>

            <label for="admin_email_address">Email Address:</label>
            <input type="email" id="admin_email_address" name="email_address" required><br>

            <button type="submit">Add Staff</button>
        </form>
    </div>
</div>

<!-- Modal for adding Support Staff -->
<div id="addStaffModal-supportStaff" class="modal">
    <div class="modal-content">
        <span class="close-modal" data-staff-type="supportStaff">&times;</span>
        <h2>Add Support Staff</h2>
        <form id="addSupportStaffForm">
            <label for="support_name">Name:</label>
            <input type="text" id="support_name" name="name" required><br>

            <label for="support_role">Role:</label>
            <input type="text" id="support_role" name="role" required><br>

            <label for="support_phone_number">Phone Number:</label>
            <input type="text" id="support_phone_number" name="phone_number" required><br>

            <label for="support_address">Address:</label>
            <input type="text" id="support_address" name="address" required><br>

            <label for="support_email_address">Email Address:</label>
            <input type="email" id="support_email_address" name="email_address" required><br>

            <button type="submit">Add Staff</button>
        </form>
    </div>
</div>

    <script>
function fetchStaffData(category) {
    $.ajax({
        url: `/staff/${category}`, // The correct URL for fetching staff data based on category
        type: 'GET',
        success: function(data) {
            const tableHead = $('#staffTable thead tr');
            const tableBody = $('#staffTable tbody');

            tableHead.empty();
            tableBody.empty();

            // Debugging log to check the response data
            console.log('Fetched staff data:', data);

            // Check if the response contains columns and records
            if (data.columns && Array.isArray(data.columns) && Array.isArray(data.records)) {
                // Build the table header dynamically
                data.columns.forEach(column => {
                    tableHead.append(`<th>${column.replace('_', ' ').toUpperCase()}</th>`);
                });
                tableHead.append('<th>Action</th>'); // Add action column for the delete button

                // Populate the table body with the staff records
                if (data.records.length === 0) {
                    tableBody.append(`<tr><td colspan="${data.columns.length + 1}">No records found</td></tr>`);
                } else {
                    data.records.forEach(record => {
                        // Debugging log to check each record's id and resume field
                        console.log('Record:', record);

                        let row = '<tr>';

                        data.columns.forEach(column => {
                            // Check for the 'resume' field and generate a valid link if it exists
                            if (column === 'resume' && record[column]) {
                                const resumeUrl = `http://127.0.0.1:8000/storage/resumes/${record[column]}
`; 
                                row += `<td><a href="${resumeUrl}" target="_blank">View Resume</a></td>`;
                            } else {
                                row += `<td>${record[column] !== null ? record[column] : ''}</td>`;
                            }
                        });

                        // Add delete button with the correct ID and category for each record
                        const recordId = category === 'applicants' ? record.applicant_id : record.id;
                        row += `<td>
                                    <button class="delete-btn" onclick="deleteRecord(${recordId}, '${category}')">Delete</button>
                                </td>`;
                        row += '</tr>';

                        // Append the row to the table body
                        tableBody.append(row);
                    });
                }
            } else {
                // Handle case where response is not structured as expected
                tableBody.append('<tr><td colspan="100%">Invalid data structure received from server</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            // Log the error details for debugging
            console.error('Error fetching staff data:', status, error);
            alert('Error fetching staff data.');
        }
    });
}



function deleteRecord(id, category) {
    console.log('ID:', id); // Check if the ID is being passed properly
    console.log('Category:', category); // Check the category value

    // Confirm deletion before proceeding
    if (confirm("Are you sure you want to delete this record?")) {
        if (id === undefined || id === null || category === undefined || category === null) {
            console.log('Error: Invalid ID or Category');
            alert('Invalid ID or Category');
            return;
        }

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: `/staff/${category}/${id}`, // Correct URL for deleting the record based on category and ID
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Add CSRF token to the headers
            },
            success: function(response) {
                console.log('Record deleted successfully:', response);
                fetchStaffData(category); // Refresh the table data
            },
            error: function(xhr, status, error) {
                console.log('Error deleting record:', error);
                alert('Error deleting record');
            }
        });
    }
}







function renderStaffTable(records, category) {
    // Clear the table before appending new rows
    $('#staff-table-body').empty();

    records.forEach(function(record) {
        let row = '<tr>';
        
        // Loop through each column to create the row
        records.columns.forEach(function(column) {
            if (column === 'resume' && record[column]) {
                // Check if the resume exists and create a link
                row += `<td><a href="${record[column]}" target="_blank">View Resume</a></td>`;
            } else {
                row += `<td>${record[column] || ''}</td>`;
            }
        });

        // Add delete button for each row
        row += `<td><button onclick="deleteRecord('${record.id}', '${category}')">Delete</button></td>`;
        row += '</tr>';

        // Append the row to the table body
        $('#staff-table-body').append(row);
    });
}





// Function to add staff via AJAX
function addStaff(formId, category, modalId) {
    const formData = $(`#${formId}`).serialize(); // Serialize form data

    $.ajax({
        url: `/staff/${category}`, // Send POST request to the staff category
        type: 'POST',
        data: formData, // Attach form data
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token to the request headers
        },
        success: function(response) {
            alert('Staff added successfully!');
            $(`#${modalId}`).hide(); // Hide modal
            fetchStaffData(category); // Refresh table
            $(`#${formId}`)[0].reset(); // Reset the form
        },
        error: function(xhr, status, error) {
            // Handle errors more effectively by using the error response from the server
            const errorMsg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Error adding staff.';
            alert(errorMsg); // Show error message from the server
        }
    });
}


function openModal(staffType) {
    
    $('.modal').hide();

    
    $(`#addStaffModal-${staffType}`).show();
}


function closeModal(staffType) {
    $(`#addStaffModal-${staffType}`).hide();
}

$(document).ready(function() {
    
    $('#staffCategory').change(function() {
        const category = $(this).val();
        fetchStaffData(category);
    });

  
    fetchStaffData('applicants');

 
    $('.close-modal').click(function() {
        const staffType = $(this).data('staff-type');
        closeModal(staffType);
    });

   
    $('#addMedicalStaffForm').submit(function(e) {
        e.preventDefault();
        addStaff('addMedicalStaffForm', 'medicalStaff', 'addStaffModal-medicalStaff');
    });

    $('#addAdministrativeStaffForm').submit(function(e) {
        e.preventDefault();
        addStaff('addAdministrativeStaffForm', 'administrativeStaff', 'addStaffModal-administrativeStaff');
    });

    $('#addSupportStaffForm').submit(function(e) {
        e.preventDefault();
        addStaff('addSupportStaffForm', 'supportStaff', 'addStaffModal-supportStaff');
    });

    // Event listeners for opening modals
    $('#addMedicalStaffBtn').click(() => openModal('medicalStaff'));
    $('#addAdministrativeStaffBtn').click(() => openModal('administrativeStaff'));
    $('#addSupportStaffBtn').click(() => openModal('supportStaff'));

    // Close the modal when clicking outside of it
    $(window).click(function(event) {
        const modals = $('.modal');
        modals.each(function() {
            if ($(event.target).is(this)) {
                $(this).hide();
            }
        });
    });
});


    </script>
</body>
</html>
