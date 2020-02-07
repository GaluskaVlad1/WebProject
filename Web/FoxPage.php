<?php include 'server.php';?>
<?php
$connect = mysqli_connect("localhost", "root", "", "animalshelter");  
?>
<?php 
   if(!isset($_SESSION))
	{
		session_start();
	}


?>
<!DOCTYPE.html>
<html>
<head>
<title>Animal Shelter</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/ce3207a1fc.js" crossorigin="anonymous"></script>
<style>
body{
	margin:0;
	background-image: url('wallpaper.jpg');
	font-family:Arial,Helvetica,sans-serif;
}
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}
img{
	float:left;
}
/* Style the active/current link */
.pagination a.active {
  background-color: dodgerblue;
  color: white;
}
.flag{
	position:fixed;
	top:0px;
	right:0px;
	padding: 10px;
	font-size: 10px;
	width: 10px;
	text-align: center;
	text-decoration: none;
	background:black;
	border-radius:50%;
	color: white;
}
.socialmedia{
  position:fixed;
  bottom:0px;
  right:0px;
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
  background: #3B5998;
  color: white;
}
/* Add a grey background color on mouse-over */
.pagination a:hover:not(.active) {background-color: #ddd;}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
button {
  background-color: #555;
  color: white;
  padding: 15px 15px;
  margin: 2px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color:#000;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 10%;
  border-radius: 10%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.button hover{
 background-color:#000;
}
.pet{
  position: center;
  background-color:white;
  margin-left:300px;
  margin-right:300px;
  height:400px;
  text-align: center;
  font-size: 35px;
  img{
	float:right;
  }
  color: white;
}
.flex-container .pet{
	background-color:#f1f1f1;
	text-align:left;
	line-height:15px;
	font-size:30px;
	img{
		float:right;
	}
}
.navbar{
	width:100%;
	background-color:#555;
	overflow: hidden;
}
.navbar a{
	float:left;
	padding: 16px 18px;
	color:white;
	text-decoration:none;
	font-size:17 px;
}
.navbar a:hover {
  background-color: #000;
}
.active{
	background-color:#4CAF50;
}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 12px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #000;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 6px 18px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
@media screen and (max-width: 500px){
	.navbar a{
	 float:none;
	 display:block;}
}
#map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
</style>

<body>
<div class="navbar">
 <a href="WebPage.php"><i class="fa fa-fw fa-home"></i> Home</a>
 <div class="dropdown">
  <a href="#"><i class="dropbtn">Categories</i>
  <i class="fas fa-align-justify"></i>
  <div class="dropdown-content">
   <a href="DogPage.php"><i class="fas fa-dog"></i>Dogs</a>
   <a href="CatPage.php"><i class="fas fa-cat"></i>Cats</a>
   <a href="OtterPage.php"><i class="fas fa-otter"></i>Otters</a>
   <a class="active" href="FoxPage.php"><i class="fab fa-firefox"></i>Foxes</a>
   </div>
  </div>
 <button onclick="document.getElementById('id00').style.display='block'" style="width:auto;"><i class="fa fa-fw fa-envelope"></i> Contact
 <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id00" class="modal">
	<form class="modal-content animate" action="/action_page.php" method="post">
		<span onclick="document.getElementById('id00').style.display='none'" class="close" title="Close Modal">&times;</span>
		<div class="container">
			<p>Send us an e-mail at petshop@gmail.com or come tell us in person at the below stated location!</p>
		</div>
		<div id="map"></div>
	</form>
</div>

<div id="id01" class="modal">
  <form class="modal-content animate" action="loggedin.php" method="post">
  <?php include('errors.php'); ?>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="https://register.wyfegypt.com/images/form-wizard-login.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
	</br></br></br></br></br></br>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
        
      <button type="submit" name="login_user" >Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
  </form>
</div>
</div>
<section>
<table class="table table-bordered">  
                      
                <?php  
                $query = "SELECT * FROM pets WHERE `type`=4 ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {
                     echo '
                          <tr>
                               <td>
							   <div style="background:white;width:500px;width:700px;float:right;">
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="500" width="400" />
									'.$description=$row['description'].'
									</br>
									<button onclick="document.getElementById(\'id00\').style.display=\'block\'" style="width:auto;">Adopt me</button>
								</div>
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  
                </table> 
</section>
<a href="#" class="socialmedia fab fa-facebook-f"></a>
<a href="RoFoxPage.php" class="flag">RO</a>
</body>
<script>
	var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
	var currentScrollPos = window.pageYOffset;
	if (prevScrollpos > currentScrollPos) {
		document.getElementById("navbar").style.top = "0";
	} else {
		document.getElementById("navbar").style.top = "-50px";
	}
	prevScrollpos = currentScrollPos;
	}
	var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 45.665528, lng: 21.169459};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiR5lRhGdUweuaoHyLsJACr32LKdPI1Sg&callback=initMap">
    </script>
</html>	