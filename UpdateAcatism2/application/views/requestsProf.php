<!DOCTYPE html>
<html>
	<head>
		<title>Acatism</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets\images\title.png'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\listaCereri.css'); ?>"/>
	</head>
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
						<li id="proiect" class="butoane"><a href="<?php echo base_url('myProfileProfesor'); ?>">Proiectele mele</a></li>
						<li id="profil" class="butoane"><a href="<?php echo base_url('myProfileProfesor/listRequests'); ?>">Lista cereri</a></li>
					</ul>
					<!--<img src="<?php echo base_url('assets\images\colt.png'); ?>" style="width: 100%;">-->
				</nav>
				<article id="continut">
				<br><label style="color: rgb(13,82,119);"><b>&#187 Urmatorii studenti doresc sa se inscrie pentru sustinerea lucrarii de licenta: </b></label>
				<br><br>
				<?php
					if($rows != FALSE)
					{
						$i=1;
						foreach($rows as $r)
						{
							echo "<div class='mare'>";
							echo "<div class='cereri'>";
							//  $r['id'] 
							echo "<label class='studenti'>" . $r['numeStud'] ." - anul ".$r['anStud'] .", grupa ".$r['grupaStud'] . " &#187 ". $r['titlu'] ."</label>";
							echo "<button type='button' class='raspuns1' value='".$r['id']."'>Resping</button>";
							echo "<button type='button' class='raspuns'>Accept</button>";
							echo "</div><div class='popup'>";
							echo "<div class='inPopup'>";
							echo "<form method='post' action='". "<?php echo base_url('myProfileProfesor/requestsProfAcc'); ?>" ."
								<div class= 'box'> <label>1. Cercetare</label><textarea name='text1' class='desc' ></textarea><input class='data' type='date' name='deadline1'><img class='imag' src='" . base_url('assets\images\deadline.png') . "'></div>
								<div class= 'box'> <label>2. Proiectare</label><textarea name='text2' class='desc'></textarea><input class='data' type='date' name='deadline2'><img class='imag' src='" . base_url('assets\images\deadline.png') . "'></div>
								<div class= 'box'> <label>3. Implementare</label><textarea name='text3' class='desc'></textarea><input class='data' type='date' name='deadline3'><img class='imag' src='" . base_url('assets\images\deadline.png') . "'></div>
								<div class= 'box'> <label>4. Testare</label><textarea name='text4' class='desc' ></textarea><input class='data' type='date' name='deadline4'><img class='imag' src='" . base_url('assets\images\deadline.png') . "'></div>
								<div class= 'box'> <label>5. Documentatie</label><textarea name='text5' class='desc' ></textarea><input class='data' type='date' name='deadline5'><img class='imag' src='" . base_url('assets\images\deadline.png') . "'></div>
								<div class= 'box'> <label>6. Sustinerea lucrarii</label><textarea name='text6' class='desc' ></textarea><input class='data' type='date' name='deadline6'><img class='imag' src='" . base_url('assets\images\deadline.png') . "'></div>";
							echo "</div><div class='box2'><p> Fiecare camp va contine descrierea si termenul limita pana la care etapa trebuie finalizata</p>
								<button class= 'final' type='button' name='".$r['idTema']."' value='".$r['id']."'>Finalizare</button></div>	
								</div></form></div>";
						}
					}
					else
					{

					}
				?>
				</article>
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
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\listaCereri.js'); ?>"></script>
	</body>
</html>