<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.3-web/css/all.css"><!-- Compressed CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">

<!-- Compressed JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js" integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
	</head>
	
<body class="dashboard-container">
<?php
		require_once 'navbar.php';
	?>
	<style>
		.card-container{
			width: 30rem ; 
			position: fixed;
			top: 35%;
			left: 40%;
			right: 30%;
			display:none;
			color:white;
		}
		
.upload-button {
  position: relative;
  left:50%;
  top: 46%;
  background-color: transparent;
}
.upload-button:hover {
  background-color: transparent;
  cursor: pointer;
}

.upload-button i {
  font-size: 30px;
  color: white;
}
#profile-upload-input{
	opacity:0
}
.icon-photo{
position:absolute
}
	</style>
<script>
	function onClickProfile(){
		document.getElementById('history').style.display="none"
		document.getElementById('profile').style.display="block"

	}
	function onClickHistory(){
		document.getElementById('profile').style.display="none"
		document.getElementById('history').style.display="block"

	}
	</script>
    
<div class='profile-container'>
	
<div class="left-profile-container">  
	
	<div class="profile-photo">
		<img src="profile-admin.png"/>
		<div><button class="upload-button" ><i class="fas fa-upload icon-photo">
			
		</i>
		<input id="profile-upload-input"type="file" /></button></div>

		<div class='buttons'>
			<button class="button Profile-show" onClick='onClickProfile()'>My Profile</button>
			<button class="button history"onClick='onClickHistory()'>History</button>
</div>

</div>

</div>
<div class="right-profile-container">
	<div class="card-container" id="profile">
		<div class="row">
			<div class="col-6 col-md-4">First name</div>
			<div class="col-12 col-md-8">Abhi</div>
		</div>
		<div class="row">
			<div class="col-6 col-md-4">Last name</div>
			<div class="col-12 col-md-8">Ful</div>
		</div>
		<div class="row">
			<div class="col-6 col-md-4">Username</div>
			<div class="col-12 col-md-8">Abhishek_f</div>
		</div>
	</div>
	<div class="card-container" id="history">
		<div>
Number of questions solved: 3
		</div>
		<div>
			<p>Highest Score: 300</p>
			<p>Previous Score: 280</p>
		</div>
	</div>
</div>
</div>

   
</body>
<footer class="text-muted">All Rights Reserved 2021</footer>
</html>