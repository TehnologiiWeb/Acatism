<!DOCTYPE html>
<html>
<!-- href="<?php echo base_url('assets\css\myProfileStudent.less'); ?>" -->

<head>
    <title>Acatism - Profilul meu</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\myProfileStudent.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>" />
</head>

<body>

    <div id="content">
            <script> document.getElementById("content").style.height=screen.height+"px";</script>
            <header>
                <img class="pozaDreaptaSus" src="<?php echo base_url('assets\images\studenti.png'); ?>">
                <img class="pozaDreaptaSus" src="<?php echo base_url('assets\images\colt.png'); ?>">
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
                        <li id="profesori"class="butoane"><a  href="<?php echo base_url('listaProfs'); ?>">Lista profesori</a></li>
                        <li id="teme" class="butoane"><a href="<?php echo base_url('listaTemeStud'); ?>">Lista teme </a></li>
                        <li id="proiect" class="butoane">Proiectul meu</li>
                        <li id="profil" class="butoane"><a href="<?php echo base_url('myProfileStudent'); ?>">Profilul meu</a></li>
                    </ul>
                    <img src="<?php echo base_url('assets\images\colt.png'); ?>" style="width: 100%;">
                </nav>
                <article id="continut">
                    <!-- AICI DIV-UL CENTRAL-->


            <div id="inregistrare">
				<div id="signUp">
					<form name="signUp" action="<?php echo base_url('editProfileStud'); ?>" method="POST">
						<label class="logLabels">Nume </label>
						<input type="text" name="signUpName" id="signUpName" class="logInputs" value="<?php echo $nume; ?>" required>
						<br>
						<label class="logLabels">Email </label>
						<input type="email" name="signUpEmail" id="signUpEmail" class="logInputs" value="<?php echo $email; ?>" required>
						<br>
						<label class="logLabels">Parola </label>
						<input type="password" name="signUpPassword" id="signUpPassword" class="logInputs" required>
						<br>
						<label class="logLabels">Github Name </label>
						<input type="text" name="signUpGithub" id="signUpGithub" class="logInputs" value="<?php echo $git; ?>" required>
						<br>
						<?php
							if ($tipStudii == 'Licenta')
							{
						?>
								<label class="logLabels">Sunt </label>
								<select id="tipUser" name="tipUser" class="selects" required>
							  		<option value=""></option>
							  		<option value="Student" name="signUpStudent" id="signUpStudent" selected="selected">student</option>
							  		<option value="Masterand" name="signUpMasterand" id="signUpMasterand">masterand</option>
								</select>
						<?php
							}
							else
							{
						?>
								<label class="logLabels">Sunt </label>
								<select id="tipUser" name="tipUser" class="selects" required>
							  		<option value=""></option>
							  		<option value="Student" name="signUpStudent" id="signUpStudent">student</option>
							  		<option value="Masterand" name="signUpMasterand" id="signUpMasterand" selected="selected">masterand</option>
								</select>
						<?php
							}
						?>
						<label class="logLabels" id="inAnul">in anul</label>
						<input type="text" name="an" id="an" class="logInputs" value="<?php echo $anStudiu; ?>">
						<label class="logLabels" id="grupa">grupa </label>
						<input type="text" name="signUpGrupa" id="signUpGrupa" class="logInputs" style="width: 20%" value="<?php echo $grupa; ?>">
						<br><br>
						<input type="submit" value="Inregistrare">
					</form>
				</div>
			</div>
</article>
<div id="subSlideMeniu"></div>
<div id="slideMeniu">
<div class="divMeniu">
<a class="slideButton"><b>Editare cont</b></a>
</div>
<div class="divMeniu">
<a class="slideButton" href="<?php echo base_url('delogare'); ?>"><b>Delogare</b></a>
</div>
</div>
</div>
</div>
<!--<script type="text/javascript" src="jquery.js"></script>-->
<!--jquery and javascript-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets\scripts\myProfileStudent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
</body>

</html>