<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            align-items: center;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background: linear-gradient(to right, #87CEEB, #4682B4, #00008B);
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="file"] {
            border: none;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
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
    <div class="form-container">
        <h2>Job Application Form</h2>
        <form action="{{ route('applications') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="job-role">Applying for:</label>
    <select name="job_role" id="job-role" required>
        <option value="">Select a position</option>
        <option value="doctor">Doctor</option>
        <option value="nurse">Nurse</option>
        <option value="staff">Staff</option>
    </select>

    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" placeholder="Your full name" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" placeholder="Your phone number" required>

    <label for="date">Date of Application:</label>
    <input type="date" id="date" name="date" required>

    <label for="resume">Upload Resume:</label>
    <input type="file" id="resume" name="resume" accept=".jpg" required>

    <button type="submit">Submit</button>
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
