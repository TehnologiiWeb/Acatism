<!DOCTYPE html>
<html>
<!-- href="<?php echo base_url('assets\css\myProfileStudent.less'); ?>" -->

<head>
    <title>Acatism - Profilul meu</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\editProfileStud.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>" />
</head>

<body>

    <div id="content">
            <script> document.getElementById("content").style.height=screen.height+"px";</script>
            <header>

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
                         <li id="profil" class="butoane">Profilul meu</li>
                        <li id="proiect" class="butoane">Proiectul meu</li>
                        <li id="profesori"class="butoane">Lista profesori</li>
                        <li id="teme" class="butoane">Lista teme</li>
                  
                    </ul>
                    <img src="<?php echo base_url('assets\images\temp.png'); ?>" id="stil">
                </nav>
                <article id="continut">
                    <!-- AICI DIV-UL CENTRAL-->
                    <img class="smallColt4" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                    <img class="smallColt5" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                    <img class="smallColt6" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
                    <img class="smallColt7" src="<?php echo base_url('assets\images\smallColt.png'); ?>">

            <div id="inregistrare">
				<div id="signUp">
					<form name="signUp" action="<?php echo base_url('editProfileStud'); ?>" method="POST">
						<label class="logLabels">Nume &nbsp</label>
						<input type="text" name="signUpName" id="signUpName" class="logInputs" value="<?php echo $nume; ?>" required>
						<br>
						<label class="logLabels">Email&nbsp; &nbsp;</label>
						<input type="email" name="signUpEmail" id="signUpEmail" class="logInputs" value="<?php echo $email; ?>" required>
						<br>
						<label class="logLabels">Parola&nbsp</label>
						<input type="password" name="signUpPassword" id="signUpPassword" class="logInputs" required>
						<br>
						<label class="logLabels">GitHub </label>
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
						<label style="color: rgb(13,82,119);" id="inAnul"> in anul </label>
						<input type="text" name="an" id="an" style="width: 15px;" value="<?php echo $anStudiu; ?>">
						<label style="color: rgb(13,82,119);" id="grupa"> grupa </label>
						<input type="text" name="signUpGrupa" id="signUpGrupa"  style="width: 8%" value="<?php echo $grupa; ?>">
						<br><br>
						<input type="submit" value="Modificare" id="inreg">
					</form>
				</div>
			</div>
</article>

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