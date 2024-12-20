
        // Handle "Add Staff" button click with toggle behavior
        document.getElementById('addStaffBtn').addEventListener('click', function() {
            const addStaffControls = document.getElementById('addStaffControls');
            // Toggle display between block (show) and none (hide)
            if (addStaffControls.style.display === 'none' || addStaffControls.style.display === '') {
                addStaffControls.style.display = 'block';
            } else {
                addStaffControls.style.display = 'none';
            }
        });

        // Function to show the corresponding table based on the selected category
        function showTable() {
            // Hide all tables
            document.getElementById('applicantsTable').style.display = 'none';
            document.getElementById('medicalStaffTable').style.display = 'none';
            document.getElementById('administrativeStaffTable').style.display = 'none';
            document.getElementById('supportStaffTable').style.display = 'none';

            // Get the selected category
            const selectedCategory = document.getElementById('staffCategory').value;

            // Show the corresponding table
            if (selectedCategory === 'applicants') {
                document.getElementById('applicantsTable').style.display = 'table';
            } else if (selectedCategory === 'medicalStaff') {
                document.getElementById('medicalStaffTable').style.display = 'table';
            } else if (selectedCategory === 'administrativeStaff') {
                document.getElementById('administrativeStaffTable').style.display = 'table';
            } else if (selectedCategory === 'supportStaff') {
                document.getElementById('supportStaffTable').style.display = 'table';
            }
        }

        // Show the applicants table by default
        showTable();

        // Function to open the modal
        function openModal() {
            const staffType = document.getElementById('staffType').value;
            const modal = document.getElementById("myModal");
            const modalTitle = document.getElementById("modalTitle");

            // Set modal title based on selected staff type
            if (staffType === 'medicalStaff') {
                modalTitle.textContent = "Add Medical Staff Information";
            } else if (staffType === 'administrativeStaff') {
                modalTitle.textContent = "Add Administrative Staff Information";
            } else if (staffType === 'supportStaff') {
                modalTitle.textContent = "Add Support Staff Information";
            }

            modal.style.display = "block";

            // Handle form submission
            document.getElementById('staffForm').onsubmit = function(event) {
                event.preventDefault();
                addStaffToTable(staffType);
                modal.style.display = "none"; // Hide modal after adding
                this.reset(); // Reset the form
            };
        }

        // Function to close the modal
        document.getElementById("closeModal").onclick = function() {
            document.getElementById("myModal").style.display = "none";
        }

        // Function to open the modal and set staff type
function openModal() {
    const staffType = document.getElementById('staffType').value;
    const modal = document.getElementById("myModal");
    const modalTitle = document.getElementById("modalTitle");

    // Set modal title and hidden input value based on selected staff type
    if (staffType === 'medicalStaff') {
        modalTitle.textContent = "Add Medical Staff Information";
        document.querySelector('input[name="staffType"]').value = "medicalStaff";
    } else if (staffType === 'administrativeStaff') {
        modalTitle.textContent = "Add Administrative Staff Information";
        document.querySelector('input[name="staffType"]').value = "administrativeStaff";
    } else if (staffType === 'supportStaff') {
        modalTitle.textContent = "Add Support Staff Information";
        document.querySelector('input[name="staffType"]').value = "supportStaff";
    }

    modal.style.display = "block";
}

// Submit form and add data to HTML table
document.getElementById('staffForm').onsubmit = function(event) {
    // Let the form submit to the PHP server
    // Do not prevent default form submission here!
}

       // Function to load data based on staff type
function loadStaffData(staffType) {
    const tableBody = document.querySelector(`#${staffType}Table tbody`);

    // Clear existing table rows
    tableBody.innerHTML = '';

    // Use AJAX to fetch data from PHP script
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'getstaff.php?staffType=' + staffType, true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Insert the response into the table body
            tableBody.innerHTML = xhr.responseText;
        } else {
            console.error('Error loading staff data');
        }
    };

    xhr.send();
}

// Call this function on page load to load applicants table by default
window.onload = function() {
    loadStaffData('applicants');
};

let selectedApplicantId = null;

// Function to open the modal and store the selected applicant ID
function openPopup(applicantId) {
    // Display popup with options
    var popup = confirm("Move applicant to: \n1. Medical Staff \n2. Administrative Staff \n3. Support Staff");
    if (popup) {
        // Depending on the user's selection, you can send the applicantId and chosen staff type to a PHP script
        var staffType = prompt("Enter 1 for Medical, 2 for Admin, 3 for Support");
        if (staffType == 1) {
            moveToStaff(applicantId, 'medicalStaff');
        } else if (staffType == 2) {
            moveToStaff(applicantId, 'administrativeStaff');
        } else if (staffType == 3) {
            moveToStaff(applicantId, 'supportStaff');
        }
    }
}

function moveToStaff(applicantId, staffType) {
    // Make AJAX request to move the applicant to the selected staff type
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "transferapplicant.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status == 200) {
            alert("Applicant moved successfully!");
            location.reload();  // Refresh the table
        }
    };
    xhr.send("applicant_id=" + applicantId + "&staff_type=" + staffType);
}

function deleteApplicant(applicantId) {
    // Confirm the deletion action
    if (confirm("Are you sure you want to delete this applicant?")) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_applicant.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Define the callback function that will be called when the request is complete
        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText); // Parse the JSON response
                    alert(response.message); // Show success or error message

                    if (response.status === "success") {
                        // Optionally remove the row from the table without reloading
                        document.querySelector(`button[data-id="${applicantId}"]`).closest('tr').remove();
                    }
                } catch (e) {
                    alert("Error parsing response: " + e.message);
                }
            } else {
                alert("Error deleting applicant. Status: " + xhr.status);
            }
        };

        // Handle network errors
        xhr.onerror = function () {
            alert("Request failed. Please try again later.");
        };

        // Send the request with the applicant ID
        xhr.send("applicant_id=" + applicantId);
    }
}




