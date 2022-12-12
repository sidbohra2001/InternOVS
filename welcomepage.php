<?php
include('./includes/header.php');
?>
<head>
    <link rel="stylesheet" href="css/main.css">
</head>
<body style="font-family:Verdana, Geneva, Tahoma, sans-serif; background-image: linear-gradient(to bottom right,rgba(70, 102, 219, 0.5),rgba(242, 148, 48, 0.62), rgb(240, 54, 239,0.2));">
    <div id="carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 350px;">
                    <img src="assets/images/caraousel1.jpg" class="d-block w-100" alt="..." style="height: 350px;">
                </div>
                <div class="carousel-item" style="height: 350px;">
                    <img src="assets/images/caraousel2.jpg" class="d-block w-100" alt="..." style="height: 350px;">
                </div>
                <div class="carousel-item" style="height: 350px;">
                    <img src="assets/images/caraousel3.jpg" class="d-block w-100" alt="..." style="height: 350px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-5">
            <h4><b>Other Government Services</b></h4>
            <div class="card mb-3" style="max-width: 600px;border: 0.5px solid darkgray">
                <div class="row m-2" style="color: aliceblue; border: 1px solid darkgray; background-image:url('assets/images/calc.png'); background-position:bottom">
                    <a href="https://www.irctc.co.in/nget/" target="_blank"><h3 class="mt-4 ml-2" style="color:aliceblue;">Train Ticket Booking</h3></a>
                </div>
                <div class="row m-2" style="color: aliceblue; border: 1px solid darkgray; background-image:url('assets/images/calci.png'); background-position:bottom">
                    <a href="https://utconline.uk.gov.in/" target="_blank"><h3 class="mt-4 ml-2" style="color:aliceblue;">Bus Ticket Booking</h3></a>
                </div>
                <div class="row m-2" style="color: aliceblue; border: 1px solid darkgray; background-image:url('assets/images/calc.png'); background-position:bottom">
                    <a href="https://appointments.uidai.gov.in/bookappointment.aspx?AspxAutoDetectCookieSupport=1" target="_blank"><h3 class="mt-4 ml-2" style="color:aliceblue;">Aadhar Apply</h3></a>
                </div>
                <div class="row m-2" style="color: aliceblue; border: 1px solid darkgray; background-image:url('assets/images/calci.png'); background-position:bottom">
                    <a href="https://voterportal.eci.gov.in/" target="_blank"><h3 class="mt-4 ml-2" style="color:aliceblue;">Voter Card Apply</h3></a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h4><b>What does Voting System means?</b></h4>
            <div class="card" style="width: 18rem;border: 0.5px solid darkgray">
                <div class="card-body" style="background-image: url('assets/images/cal.jpg');">
                    <p class="card-text">A voting system or electoral system is a method by which voters make a choice between options, often in an election or on a policy referendum. A voting system enforces rules to ensure valid voting, and how votes are counted and aggregated to yield a final result.</p>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-md-7 mr-4" style="background-color: white; border: 0.5px solid darkgray">
            <div class="row">
                    <a  href="https://eci.gov.in/" style="color: black;" target="_blank"><h3 class="m-2">ELECTION COMMISSION OF INDIA</h3></a>
                    <p class="m-2">The Election Commission of India (ECI) is a constitutional body under the ownership of Ministry of Law and Justice, Government of India. It was established by the Constitution of India to conduct and regulate elections in the country. Article 324 of the Constitution provides that the power of superintendence, direction, and control of elections to parliament, state legislatures, the office of the president of India, and the office of vice-president of India shall be vested in the election commission. Thus, the Election Commission is an all-India body in the sense that it is common to both the Central government and the state governments.</p>
                    <h3 class="m-2" style="font-family: 'Signika', sans-serif; color:rgb(26, 4, 105)">YOU MAKE US WHAT WE ARE!</h3>
            </div>
        </div>
        <div class="col-md-3 ml-4" style="background-color: white; border: 0.5px solid darkgray">
            <h4 class="mb-2 mt-2 justify-content-center">Need Help? | Contact Us</h4>
            <a href="">
                <marquee>Voting is your Birth Right</marquee>
            </a>
            <hr>
            <a href="https://voterportal.eci.gov.in/" style="color: black;" target="_blank"><h5>Apply for Voter Card</h5></a>
            <hr>
            <a href="https://appointments.uidai.gov.in/bookappointment.aspx?AspxAutoDetectCookieSupport=1" style="color: black;" target="_blank"><h5>Apply for Aadhar Card</h5></a>
            <hr>
            <a href="https://www.passportindia.gov.in/AppOnlineProject/online/procFormSubOnl" style="color: black;" target="_blank"><h5>Apply for Passport</h5></a>
            <hr>
            <a href="https://www.govloans.gov/" target="_blank" style="color: black;"><h5>Apply for Government Loan</h5></a>
            <hr>
        </div>
    </div>
    <br>
    <h2 style="text-align: center;"><b>Documents Required For Voting<b></h2>
    <div class="row row-cols-1 row-cols-md-3 m-5">
        <div class="col mb-4">
            <div class="card h-100">
                <img src="assets/images/voterids.jpg" class="card-img-top" alt="..." style="height: 310px;">
                <div class="card-body">
                    <h5 class="card-title">Voter Card</h5>
                    <p class="card-text">Voter Card is required to fetch the Voter ID of the user who is going to login to the Online Voting System server.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="assets/images/aadhar.jpg" class="card-img-top" alt="..." style="height: 310px;">
                <div class="card-body">
                    <h5 class="card-title">Aadhar Card</h5>
                    <p class="card-text">Aadhar Card is required to fetch the Aadhar Number of the user who is going to login to the Online Voting System server.</p>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="assets/images/phone.jpg" class="card-img-top" alt="..." style="height: 310px;">
                <div class="card-body">
                    <h5 class="card-title">Mobile Phone</h5>
                    <p class="card-text">Mobile Phone is required to fetch the OTP from the user who is going to login to the Online Voting System server.</p>
                </div>
            </div>
        </div>

    </div>
</body>
<?php
include('./includes/footer.php');
?>