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
						<li id="profesori"class="butoane"><a href="<?php echo base_url('myProfileProfesor/myStudents'); ?>">Lista studenti</a></li>
						<li id="proiect" class="butoane">Proiectele mele</li>
						<li id="profil" class="butoane">Profilul meu</li>
					</ul>
					<img src="<?php echo base_url('assets\images\colt.png'); ?>" style="width: 100%;">
				</nav>
				<article id="continut">
			<div id="inregistrare">
				<div id="signUp">
					<form name="signUp" action="<?php echo base_url('myProfileProfesor\editProfile'); ?>" method="POST">
						<label class="logLabels">Nume </label>
						<input type="text" name="name" id="signUpName" class="logInputs" 
								value="<?php echo $rows['numeProf']; ?>" required>
						<br>
						<label class="logLabels">Email </label>
						<input type="email" name="email" id="signUpEmail" class="logInputs"
						 value="<?php echo $rows['emailProf']; ?>" required>
						<br>
						<label class="logLabels">Parola </label>
						<input type="password" name="password" id="signUpPassword" class="logInputs" required>
						<br>
						<label class="logLabels">Github Name </label>
						<input type="text" name="github" id="signUpGithub" class="logInputs" 
						value="<?php echo $rows['gitProf']; ?>" required>
						<br><br>
						<input type="submit" value="Editare">
						
					</form>
				</div>
			</div>
				</article>
				<aside>
					<form name="addTema" action="<?php echo base_url('myProfileProfesor'); ?>" method="POST">
						<input type="text" name="nume" id="nume" placeholder=" Numele temei" required>
						<input type="submit" id="adauga" value="Adauga">
						<input type="radio" id="licenta" class="radio" value="licenta" name="tip"><label class="radio">Licenta</label>
						<br>
						<input type="radio" id="master" class="radio" value="master" name="tip"><label class="radio">Master</label>
						<textarea  name="descriere" id="descriere" placeholder=" Descrierea temei.."></textarea>
					</form>
					<label id="labell"><b>Adaugare tema noua</b></label>
				</aside>

				<img id="sageata" src="<?php echo base_url('assets\images\sageata.jpg'); ?>"/>
				<div id="subSlideMeniu"></div> 
				<div id="slideMeniu">
					<div class="divMeniu">
					<a class="slideButton" href="<?php echo base_url('myProfileProfesor/editProfile'); ?>"><b>Editare cont</b></a>
					</div>
					<div class="divMeniu">
					<a class="slideButton" href="<?php echo base_url('delogare'); ?>"><b>Delogare</b></a>
					</div>
				</div>
			</div>
		</div>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\jquery.js'); ?>"></script>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
	</body>
</html>