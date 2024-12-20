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

    <div body-container>
        <div class="content1">
            <div class="body-image1">
                <img style="width: 100%; height: 80vh; display: block;" src="./IMAGES/veterinarianbg.jpg"> 
                <div class="overlay"></div>
                <div text-content1>
                    <div id="text1">WELCOME TO WHO'S PITAL?</div>
                    <div id="text2">Taking care of <br>your pet is our <br>
                         top priority.</div>
                    <div id="text3">Being healthy is more that just not getting sick. It entails, mental, physical <br> and social well-being, It's not just about treatment, its about healing.</div>
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

