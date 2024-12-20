<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Vet Appointment Form</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
   height: 100vh;
   background: linear-gradient(to right, #87CEEB, #4682B4, #00008B);
}

.container {
    background-color: white;
    border-radius: 5px;
    padding: 20px;
    padding-right: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 500px;
    display: flex;
    flex-direction: column;
    align-self: center;
    
}

h1 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

input[type="text"],
input[type="tel"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    margin-top: 20px;
    width: 100%;
    font-size: 16px;
}

button:hover {
    background-color: #218838;
}

.real-container {
    display: flex;
    align-self: center;
    flex-direction: column;
    justify-content: center;
}
.backbtn {
    position: fixed;
    top: 10px; 
    left: 10px; 
    width: 40px;
    height: 40px; 
    background-color: transparent; 
    border-radius: 50%;
    overflow: hidden; 
    z-index: 1000;
}

.backbtn img {
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
}

    </style>
</head>
<body>
<div class="backbtn">
    <a href="{{ url('/welcome') }}">
        <img src="{{ asset('images/backbtn.png') }}" alt="Back Button">
    </a>
</div>
    
        <div class="container">
            <h1>Veterinary Appointment Form</h1>
            <form action="{{ url('/appointment') }}" method="post">
    @csrf
    <label for="patient_name">Name of Patient:</label>
    <input type="text" id="patient_name" name="patient_name" required>

    <label for="pet_type">Kind of Pet:</label>
    <select id="pet_type" name="pet_type" required>
        <option value="" disabled selected>Select your pet</option>
        <option value="cat">Cat</option>
        <option value="dog">Dog</option>
        <option value="bird">Bird</option>
        <option value="rabbit">Rabbit</option>
        <option value="horse">Horse</option>
        <option value="ferret">Ferret</option>
        <option value="fish">Fish</option>
        <option value="guineaPig">Guinea Pig</option>
        <option value="other">Other</option>
    </select>

    <label for="service_type">Type of Veterinarian Services:</label>
    <select id="service_type" name="service_type" required>
        <option value="" disabled selected>Select service type</option>
        <option value="companion">Companion Animal Veterinarians</option>
        <option value="specialist">Veterinary Specialist</option>
        <option value="exotic">Exotic Animal Veterinarians</option>
        <option value="livestock">Livestock, Food, And Large Animal Veterinarians</option>
        <option value="laboratory">Laboratory Veterinarians</option>
    </select>

    <label for="service_needed">Type of Services Needed:</label>
    <select id="service_needed" name="service_needed" required>
        <option value="" disabled selected>Select needed service</option>
        <option value="anesthesia">Anesthesia and Analgesia</option>
        <option value="animalWelfare">Animal Welfare</option>
        <option value="behavioralMedicine">Behavioral Medicine</option>
        <option value="clinicalPharmacology">Clinical Pharmacology</option>
        <option value="dentistry">Dentistry</option>
        <option value="dermatology">Dermatology</option>
        <option value="emergency">Emergency and Critical Care</option>
        <option value="internalMedicine">Internal Medicine</option>
    </select>

    <label for="phone_number">Patient Phone Number:</label>
    <input type="tel" id="phone_number" name="phone_number" required>

    <label for="appointment_date">Date of Appointment:</label>
    <input type="date" id="appointment_date" name="appointment_date" required>

    <button type="submit">Schedule Appointment</button>
</form>


        </div>
    
        @if (session('success'))
    <div id="success-alert" style="color: green; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; margin: 10px 0;">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 5000); // Hide after 5 seconds
    </script>
@endif

    
</body>
</html>
<div style="font-size: 40px;"></div>