<!DOCTYPE html>
<html>
	<head>
		<title>Acatism</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets\images\title.png'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\login.css'); ?>">
	<body>
		<div id="content">
			<header>

			</header>
			<div id="banner">
				<div id="signIn">
					<form name="signIn" action="<?php echo base_url('login'); ?>" method="POST">
						<input type="email" name="signInEmail" class="loginInputs" id="signInEmail" placeholder="Email" required>
						<br>
						<input type="password" name="signInPassword" class="loginInputs" id="signInPassword" placeholder="Parola" required>
						<br><br>
						<input type="submit" value="Logare">
					</form>
				</div>
			</div>
			<div id="inregistrare">
				<div id="signUp">
					<form name="signUp" action="<?php echo base_url('signUp'); ?>" method="POST">
						<label class="logLabels">Nume </label>
						<input type="text" name="signUpName" id="signUpName" class="logInputs" required>
						<br>
						<label class="logLabels">Email </label>
						<input type="email" name="signUpEmail" id="signUpEmail" class="logInputs" required>
						<br>
						<label class="logLabels">Parola </label>
						<input type="password" name="signUpPassword" id="signUpPassword" class="logInputs" required>
						<br>
						<label class="logLabels">Sunt </label>
						<select id="tipUser" name="tipUser" class="selects" required>
							  <option value=""></option>
							  <option value="Student" name="signUpStudent" id="signUpStudent">student</option>
							  <option value="Masterand" name="signUpMasterand" id="signUpMasterand">masterand</option>
							  <option value="Profesor" name="signUpProfesor" id="signUpProfesor">profesor</option>
						</select> 
						<label class="logLabels" id="inAnul">in </label>
						<select id="anStudent" name="anStudent" class="selects">
							  <option value=""></option>
							  <option value="1" name="studentAnul1" id="studentAnul1">Anul I</option>
							  <option value="2" name="studentAnul2" id="studentAnul2">Anul II</option>
							  <option value="3" name="studentAnul3" id="studentAnul3">Anul III</option>
						</select> 
						<select id="anMasterand" name="anMasterand" class="selects">
							  <option value=""></option>
							  <option value="1" name="masterAnul1" id="masterAnul1">Anul I</option>
							  <option value="2" name="masterAnul2" id="masterAnul2">Anul II</option>
						</select> 
						<label class="logLabels" id="grupa">grupa </label>
						<input type="text" name="signUpGrupa" id="signUpGrupa" class="logInputs" style="width: 20%" >
						<br>
						<label class="logLabels" id="nrMatricol">Nr. matricol </label>
						<input type="text" name="signUpCod" id="signUpCod" class="logInputs">
						<br><br>
						<input type="submit" value="Inregistrare">
					</form>
				</div>
			</div>
		</div>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\jquery.js'); ?>"></script>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\scripts.js'); ?>"></script>
	</body>
</html>