<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Lorenzon Ahorro</title>
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
</head>
<body>
    <div class="header-container">
        <div class="htitle1">
            <img src="./IMAGES/hospital_pic.png" style="width: 50px; height: 50px;">
            <div style="font-size: 30px; color: white;">Who's Pital?</div>
        </div>
        <div class="notif-container">
            <img src="./IMAGES/bell.png" style="height: 20px; width: 20px; color: white;">
            |
            <div class="log-container">
                <img src="./IMAGES/profile.jpeg" style="border-radius: 50%; height: 35px; width: 35px;">
                <div class="adminname" style="margin-left: 10px; color: white;">Lorenzon Ahorro</div>
                <br>
                <div>
                    <a href="{{ url('/welcome') }}" style="margin-left: 20px; color: red  !important; text-decoration: none;">log out</a>
                </div>
            </div>
            
        </div>
    </div>
   

    <div class="all-content">
        <div class="sidebar">
            <ul style="padding: 0; padding-top: 10px;">
                <li onclick="showSection('dashboard')">Dashboard</li>
                <li onclick="showSection('appointments')">Appointments</li>
                <li onclick="showSection('patient-management')">Patient Management</li>
                <li onclick="showSection('medical-records')">Medical Records</li>
                <li onclick="showSection('billing')">Billing</li>
                <li onclick="showSection('staff-management')">Staff Management</li>
                <li onclick="showSection('inventory')">Inventory</li>
                <li onclick="showSection('reports')">Reports</li>
                <li onclick="showSection('settings')">Settings</li>
                <li onclick="showSection('support')">Support</li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="main-content-container">
            <div id="dashboard" class="section"> <br>
                <div class="dashboard-title">
                    <div style="font-size: 30px; font-family: arial;">Dashboard</div>
                </div>
                <div class="content1_1">
                    <div class="square1">
                        <div style="font-size: 30px;">Hello, Dr. Lorenzon Ahorro</div><br>
                        <div style="font-size: 20px;">Welcome to your Dashboard</div>
                    </div>
                    <div class="square2">
                        <div class="doctor-count">
                            <img src="./IMAGES/doctordash.jpg" style="height: 50px; width: 50px;">
                            <div>Total Doctors</div>
                            <a href="" style="text-decoration: none;font-size: 30px;color: black;">100</a>
                        </div>
                        <div class="doctor-count">
                            <img src="./IMAGES/petpatient.png" style="height: 50px; width: 50px;">
                            <div>Total Patients</div>
                            <a href="" style="text-decoration: none;font-size: 30px;color: black;">100</a>
                        </div>
                        <div class="doctor-count">
                            <img src="./IMAGES/clinicdash.png" style="height: 50px; width: 50px;">
                            <div>Total Clinics</div>
                            <a href="" style="text-decoration: none; font-size: 30px; color: black;">100</a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="button-container">
                    <div class="admin-button">
                        <div class="button1">Add Patient</div>
                        <div class="button1">Add Specialist</div>
                        <div class="button1">Add an Admin</div>
                        <div id="staff" class="button1">Add Staff</div>
                    </div>
                </div>
            </div>

        <div id="patient-management" class="section">
            <iframe src="/patientmanagement" width="100%" height="580px"></iframe>
        </div>

            <div id="appointments" class="section">
                <iframe src="/patientappointments" width="100%" height="580px"></iframe>
            </div>

            <div id="medical-records" class="section">
                <iframe src="/medicalrecords" width="100%" height="580px"></iframe>
            </div>

            <div id="billing" class="section">
                <iframe src="/billings" width="100%" height="580px"></iframe>
            </div>

            <div id="staff-management" class="section">
                <iframe src="/staff" width="100%" height="580px"></iframe>
            </div>

            <div id="inventory" class="section">
                <iframe src="/inventory" width="100%" height="580px"></iframe>
            </div>

            <div id="reports" class="section">
                Reports Content (Not Functional)
            </div>

            <div id="settings" class="section">
               Settings (Not Functional)
            </div>

            <div id="support" class="section">
                Support Content (Not Functional)
            </div>

        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Get all sections and hide them
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.style.display = 'none';
            });

            // Show the clicked section
            const activeSection = document.getElementById(sectionId);
            activeSection.style.display = 'block';
        }

        // Show dashboard by default when page loads
        document.addEventListener('DOMContentLoaded', () => {
            showSection('dashboard');
        });
        function toggleDropdown() {
    document.getElementById("dropdown").classList.toggle("show");
}




    </script>
</body>
</html>
