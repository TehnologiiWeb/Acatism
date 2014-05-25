<!DOCTYPE html>
<html>
	<head>
		<title>Acatism</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets\images\title.png'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\proiecteleMeleProf.css'); ?>"/>
	<body>
		<div id="content">
			<script> document.getElementById("content").style.height=screen.height+"px";</script>
			<header>
				<img class="pozaDreaptaSus" src="<?php echo base_url('assets\images\uaic.jpg'); ?>">
				<img  class="pozaDreaptaSus" src="<?php echo base_url('assets\images\colt.png'); ?>">
			</header>
			<div id="bara">	
				<div id="username">
				<img class="line" src="<?php echo base_url('assets\images\line.png'); ?>" style="margin-right: 11%;" id="linie">
					<label class="user"><b>Profilul meu</b></label>
					<img src="<?php echo base_url('assets\images\profile.png'); ?>" id="profile">
				</div>
				<img class="line" src="<?php echo base_url('assets\images\line.png'); ?>">
			</div>
			<div id="cadru">		
				<nav id="meniu">
					<ul id="butoanee">
						<li id="profesori"class="butoane">Lista studenti</li>
						<li id="proiect" class="butoane">Proiectele mele</li>
						<li id="profil" class="butoane">Profilul meu</li>
					</ul>
					<img src="<?php echo base_url('assets\images\colt.png'); ?>" style="width: 100%;">
				</nav>
				<article id="continut">
					
				</article>
				<aside>
					<form name="addTema" action="" method="POST">
						<input type="text" name="nume" id="nume" placeholder=" Numele temei" required>
						<input type="submit" id="adauga" value="Adauga">
						<input type="radio" id="licenta" class="radio" value="licenta" name="tip"><label class="radio">Licenta</label>
						<br>
						<input type="radio" id="master" class="radio" value="master" name="tip"><label class="radio">Master</label>
					</form>
					<textarea  name="descriere" id="descriere" form="addTema" placeholder=" Descrierea temei.."></textarea>

					<label id="labell"><b>Adaugare tema noua</b></label>
				</aside>
				<img id="sageata" src="<?php echo base_url('assets\images\sageata.jpg'); ?>"/>
				<div id="subSlideMeniu"></div> 
				<div id="slideMeniu">
					<div class="divMeniu">
					<a class="slideButton"><b>Editare cont</b></a>
					</div>
					<div class="divMeniu">
					<a class="slideButton"><b>Delogare</b></a>
					</div>
				</div>
			</div>
		</div>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\jquery.js'); ?>"></script>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
	</body>
</html>