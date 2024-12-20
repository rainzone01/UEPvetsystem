<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .header1 {
            background-color: beige;
            display: flex;
            display: grid;
            grid-template-columns: auto auto;
        }
        .socials {
            display: flex;
            height: 30px;
            width: 200px;
            justify-content: space-evenly;
            align-self: center;
        }
        .email {
            display: flex;
            align-items: center;
        }
        .Contact1 img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }
        .Contact1{
            align-self: center;
            display: flex;
            justify-content: space-evenly;
        }
        .Contact2{
            align-self: center;
            display: flex;
            justify-content: space-evenly;
        }
        .number {
            height: 30px;
            display: flex;
            align-items: center;
        }
        .admin_login {
            display: flex;
            align-self: center;
            font-size: 20px;
            padding: 5px;
        }
        .application_form {
            display: flex;
            align-self: center;
            font-size: 20px;
            padding: 5px;
        }
        .header2 {
            background: linear-gradient(to right, #6699ff,#3366ff, #6699ff, #3366ff, #003399);
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .hospital-name img {
            height: 90px;
            width: 90px;
        }
        .hname {
            display: flex;
            align-items: center;
        }
        .hospitalname{
            margin-left: 10px;
        }
        .hospital-name {
            align-items: center;
        }
        .navbar {
            display: flex;
            justify-content: space-evenly;
            width: 50%;
            color: white;
        }
        .navbar a{
            text-decoration: none;
            color: white; 
        }
        .appointmentbox {
            background: linear-gradient(to right,#a56e9d, #4b0082, #800080);
            margin-right: 20px;
            font-size: 25px;
            border-radius: 10px;
            height: 50px;
            display: flex;
            align-items: center;
            padding: 5px;
            color: white;
            font-family: Arial;
            
        }
        .af:hover, .al:hover {
        color: rgb(6, 206, 83) !important;
        }
        .appointmentbox:hover {
            background: linear-gradient(to right, #004d00, #008000, #66b366);
            transition: background 0.5s ease; 

        }
        .about-header {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
    
        .purpose-section, .mission-section, .team-section {
            padding: 50px;
            background-color: #f4f4f4;
        }
        .purpose-section p{
            text-align: center;
        }
        .vision-section {
            padding: 50px;
            background: linear-gradient(to right, #f0e68c, #ffa500);
            color: #444;
        }
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .achievements-section {
            padding: 50px;
            background-color: #e6e6fa;
            text-align: center;
        }
        .achievement {
            margin: 20px;
            font-size: 18px;
        }
        html {
            scroll-behavior: smooth; 
        }
        .navbar a:hover {
    color: red; /* Text color stays white on hover */
}
.navbar-item:hover {
    color: red; /* Change text color to red */
}
/* Hover effect for the link */
.navbar-link:hover {
    color: red; /* Change text color to red on hover */
}
    </style>
</head>
<body>

    <div class="header1">

        <div class="socials">
            <img src="./IMAGES/facebook (1).png">
            <img src="./IMAGES/instagram.png">
            <img src="./IMAGES/twitter (1).png">
        </div>

        <div class="Contact1">
            <div class="email">
                <div><img src="./IMAGES/email.png"></div>
                <div>hospitalsystem@gmail.com</div>
            </div>

            <div class="Contact2">
        <div class="number" style="height: 30px;">
            Emergency: 09123456789
        </div>
        </div>

        <div class="application_form">
            <a class="af" href="{{ url('/application_form') }}" style="text-decoration:none; color: #000;">Apply</a>
        </div>

        <div class="admin_login">
            <a class="al" href="{{ url('/login') }}" style="text-decoration: none; color: #000;">Admin</a>
        </div>

       
        </div>
    </div>

    <div class="header2">

        <div class="hospital-name">
            <div class="hname">
                <img src="./IMAGES/hospital_pic.png">
                <div class="hospitalname" style="font-size: 50px; color: white;">Who's Pital?</div>
            </div>
        </div>

        <div class="navbar">
        <div class="navbar-item">  <a href="{{ url('/welcome') }}" class="navbar-link" style="text-decoration: none; color: white;">HOME</a></div>
    <div class="navbar-item"><a href="{{ url('/services') }}" class="navbar-link" style="text-decoration: none; color: white;">SERVICES</a></div>
    <div class="navbar-item"><a href="{{ url('/about') }}" class="navbar-link" style="text-decoration: none; color: white;">ABOUT</a></div>
</div>


        <div class="appointmentbox">
            <div class="appointment">
                <a href="{{ url('/appointment_form') }}" style="text-decoration: none; color: white;">GET APPOINTMENT</a>
            </div>
        </div>
    </div>


    <!-- About Us sub-header -->
    <div class="about-header">
        <h1>About Us</h1>
        <h4>Welcome to Who's Pital, where your pet's health and happiness are our top priorities.</h4>
            <br> 
            <p><em>"At Who's Pital?, we are passionate about providing the best possible care for your 
            furry friends. <br>From checkups to emergencies, our trained professionals ensure your pet's health and happiness!"</em></p>
    </div>

    <!-- Purpose Section -->
    <div class="purpose-section">
        <div class="container">
            <h2 class="text-center">Our Purpose</h2>
            <p style="font-size: 18px; line-height: 1.8;">
                Who's Pital is a system designed to revolutionize veterinary care by bridging the gap between advanced medical technologies and compassionate animal care. 
                This platform was developed to address the growing demand for a comprehensive, user-friendly solution that caters to the needs of pet owners, 
                veterinary staff, and pets. Our goal is to simplify clinic management, provide accurate medical records, and ensure timely care for every pet.
            </p>
            <p style="font-size: 18px; line-height: 1.8;">
                Through features such as appointment scheduling, real-time updates, and integrated pet health tracking, 
                Who's Pital empowers clinics to deliver exceptional services with efficiency and precision. By focusing on innovation and accessibility, 
                we aim to enhance the quality of life for pets while fostering trust and transparency with their owners.
            </p>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="mission-section">
        <div class="container">
            <h2 class="text-center">Our Mission</h2>
            <p class="text-center" style="font-size: 18px; line-height: 1.8;">
                To deliver compassionate, top-tier veterinary care and innovative solutions that ensure the well-being of pets while supporting the needs of their owners and fostering trust within our community.
            </p>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="vision-section">
        <div class="container">
            <h2 class="text-center">Our Vision</h2>
            <p class="text-center" style="font-size: 18px; line-height: 1.8;">
                A world where every pet receives exceptional care, supported by state-of-the-art technology, knowledgeable staff, and a commitment to lifelong health and happiness.
            </p>
        </div>
    </div>

    <!-- Achievements Section -->
    <div class="achievements-section">
        <div class="container">
            <h2>Our Achievements</h2>
            <div class="achievement">Recognized as the Best Veterinary Clinic in 2023 by the National Pet Care Association</div>
            <div class="achievement">Over 10,000 pets successfully treated</div>
            <div class="achievement">Implemented eco-friendly practices in all our clinics</div>
            <div class="achievement">Hosted over 100 free community pet health checkups since our founding</div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <div class="container">
            <h2 class="text-center">Meet Our Team</h2>
            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-md-4 team-member">
                <img src="{{ asset('images/sundri.jpg') }}" alt="Sundro">
                    <h4>Sundro Guasis</h4>
                </div>

                <!-- Team Member 2 -->
                <div class="col-md-4 team-member">
                <img src="{{ asset('images/renzon.png') }}" alt="Renzon">
                    <h4>Lorenzon Emmanuel Ahorro</h4>
                </div>

                <!-- Team Member 3 -->
                <div class="col-md-4 team-member">
                <img src="{{ asset('images/jana.jpg') }}" alt="Jana">
                    <h4>Jana Claudine Engay</h4>
                </div>

                <!-- Team Member 4 -->
                <div class="col-md-4 team-member">
                <img src="{{ asset('images/glen.jpg') }}" alt="Jana">
                    <h4>Glen Tagros</h4>
                </div>

                <!-- Team Member 5 -->
                <div class="col-md-4 team-member">
                <img src="{{ asset('images/jerome.jpg') }}" alt="Jana">
                    <h4>Jerome Brenzuela</h4>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get all the navbar links
const navbarLinks = document.querySelectorAll('.navbar-item a');

// Add event listeners for mouseover and mouseout
navbarLinks.forEach(link => {
    link.addEventListener('mouseover', function() {
        // Change text color to red on hover
        link.style.color = 'red';
    });

    link.addEventListener('mouseout', function() {
        // Revert text color back to white when not hovering
        link.style.color = 'white';
    });
});

    </script>
</body>
</html>
