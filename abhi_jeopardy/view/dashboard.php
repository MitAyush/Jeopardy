<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<?php
		
		require_once 'navbar.php';
	?>
<!-- 
	<div class="title-bar">
	  <div class="title-bar-left">
	    <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
	    <span class="title-bar-title">Game</span>
	  </div>
	  <div class="title-bar-right">
	    <button class="menu-icon" type="button" data-open="offCanvasRight"></button>
	  </div>
	</div> -->

	<div class="grid-container">
		<h1>welcome <?php echo $_SESSION['name']; ?></h1>
	</div>
<div class="play-button-container">
	<a href="./game"><button class="button play-button">Play game</button></a></div>
</body>
</html>