<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who's Pital?</title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
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
        .Contact1 {
            align-self: center;
            display: flex;
            justify-content: space-evenly;
        }
        .Contact2 {
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
        .hospitalname {
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
        .overlay {
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 80vh; 
            background: rgba(7, 4, 67, 0.5); 
            pointer-events: none; 
            opacity: 0.7;
        }
        .body-image1 {
            position: relative;
        }
        #text1 {
            position: absolute; 
            left: 24%;
            top: 20%;
            transform: translate(-50%, -50%); 
            color: white;
            font-size: 18px; 
            text-align: center; 
            pointer-events: none; 
            font-family: Arial;
            font-weight: bolder;
        }
        #text2 {
            position: absolute; 
            left:27.8%;
            top: 43%;
            transform: translate(-50%, -50%); 
            color: white; 
            font-size: 54px;
            text-align: left; 
            pointer-events: none; 
            font-family: Arial;
            font-weight: bolder;
        }
        #text3 {
            position: absolute; 
            left: 34.5%;
            top: 70%;
            transform: translate(-50%, -50%); 
            color: white; 
            font-size: 18px; 
            text-align: left; 
            pointer-events: none; 
            font-family: Arial;
        }
        .card-deck {
        display: flex;
        justify-content: space-evenly;
        margin-top: 50px;
        }
        .card {
        width: 30%;
        border-radius: 10px;
        text-align: center;
        padding: 20px;
        transition: box-shadow 0.3s ease; 
        border: 3px solid lightblue; 
       }
        .card img {
        width: 200px;  
        height: 200px; 
        border-radius: 50%; 
        border: 5px solid lightblue; 
        margin-bottom: 15px;
        display: block;
        margin-left: auto;
        margin-right: auto; 
        transition: box-shadow 0.3s ease; 
        }
        .card:hover {
        box-shadow: 0 4px 20px #003399; 
        }
        .card img:hover {
        box-shadow: 0 4px 20px rgba(173, 216, 230, 0.7), 0 4px 20px rgba(255, 182, 193, 0.7); 
        }

        .ready-to-visit-section {
            margin-top: 50px;
            text-align: center;
            padding: 40px 20px;
            background-color: #f1f1f1;
        }
        .ready-to-visit-section h2 {
            font-size: 40px;
            font-weight: bold;
            color: #3366ff;
            margin-bottom: 20px;
        }
        .ready-to-visit-section p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
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

    <div body-container>
    
    <div class="veterinary-services" style="background-color: #3366ff; padding: 40px 20px;">
        <div style="text-align: center; font-size: 40px; font-weight: bold; color: white;">
            Veterinary Services
        </div>
    </div>

    <div class="card-deck">
        <div class="card">
        <img src="{{ asset('images/wellness.jpg') }}" alt="Wellness">
            <div class="card-body">
                <h5 class="card-title">Pet Wellness Exam</h5>
                <p class="card-text">Our comprehensive pet wellness exams are designed to ensure your pet stays healthy and happy. During the exam, our experienced veterinarians will assess your pet’s overall health, including heart and lung function, skin condition, and weight. We also check for early signs of illness and provide vaccinations and preventative care recommendations tailored to your pet’s age, breed, and lifestyle</p>
            </div>
        </div>
        <div class="card">
        <img src="{{ asset('images/ultrasound.jpg') }}" alt="Ultrasound">
            <div class="card-body">
                <h5 class="card-title">Pet Ultrasound</h5>
                <p class="card-text">Our state-of-the-art pet ultrasound service allows for non-invasive imaging of your pet’s internal organs. This diagnostic tool helps detect issues such as tumors, heart problems, pregnancy, or abnormalities in organs like the liver, kidneys, and bladder. Ultrasound is safe, painless, and an essential part of accurate diagnosis and treatment planning.</p>
            </div>
        </div>
        <div class="card">
        <img src="{{ asset('images/grooming.jpg') }}" alt="Grooming">
            <div class="card-body">
                <h5 class="card-title">Pet Grooming</h5>
                <p class="card-text">Regular grooming is essential to your pet’s health and well-being. Our professional grooming services include bathing, brushing, nail trimming, and ear cleaning. We also offer breed-specific haircuts, ensuring your pet looks their best while maintaining healthy skin and coat. Grooming is an opportunity to identify potential health issues, such as skin infections or parasites, before they become serious.</p>
            </div>
        </div>
    </div>
</div>

    <div class="card-deck">
        <div class="card">
        <img src="{{ asset('images/surgery.jpg') }}" alt="Surgery">
            <div class="card-body">
                <h5 class="card-title">Pet Surgery</h5>
                <p class="card-text">Whether your pet requires routine surgery, such as spaying or neutering, or more specialized procedures, our veterinary team is equipped with the knowledge and experience to provide safe and effective surgical care. We use the latest surgical techniques and offer advanced anesthesia monitoring to ensure your pet’s comfort and safety throughout the process.</p>
            </div>
        </div>
        <div class="card">
        <img src="{{ asset('images/laboratory.png') }}" alt="Laboratory">
            <div class="card-body">
                <h5 class="card-title">Pet Laboratory</h5>
                <p class="card-text">Our on-site pet laboratory allows for quick and accurate diagnostic testing to help diagnose a wide range of conditions. From blood work to urinalysis, fecal exams, and more, our lab provides vital information that helps us create a treatment plan tailored to your pet’s specific needs. We ensure fast results for timely medical intervention when needed.</p>
            </div>
        </div>
        <div class="card">
        <img src="{{ asset('images/anesthesia.jpg') }}" alt="Anesthesia">
            <div class="card-body">
                <h5 class="card-title">Pet Anesthesia</h5>
                <p class="card-text">When your pet requires surgery or diagnostic procedures, we offer safe and reliable anesthesia services. Our veterinary team uses advanced anesthetic agents and carefully monitors your pet’s vital signs throughout the procedure to ensure their safety and comfort. We tailor anesthesia protocols to each pet’s age, breed, and medical condition for the best possible outcome.</p>
            </div>
        </div>
    </div>
</div>

    <div class="ready-to-visit-section">
        <br>
        <br>
        <h2>Ready to Visit?</h2>
        <br>
        <p>At Who's Pital, we are dedicated to providing exceptional care for the pets of Uep Zone 3, Catarman, Northern Samar, and the neighboring communities.</p>
        <p>Our mission is to ensure the health and well-being of your beloved animals through top-quality veterinary services. You can easily schedule an appointment</p>
        <p>using our convenient Who's Pital Website, managing your pet's health has never been simpler—gain quick access to important medical records, request appointments,</p>
        <p>order medication refills, and much more, all at the touch of a button!</p>
        <br>
        <br>
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
