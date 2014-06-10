<!DOCTYPE html>
<html>
	<head>
		<title>Acatism</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets\images\title.png'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\myStudents.css'); ?>"/>
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
						<li id="profesori"class="butoane"><a href="<?php echo base_url('myProfileProfesor/myStudents'); ?>">Lista studenti</a></li>
						<li id="proiect" class="butoane"><a href="<?php echo base_url('myProfileProfesor'); ?>">Proiectele mele</a></li>
						<li id="profil" class="butoane"><a href="<?php echo base_url('myProfileProfesor/listRequests') ?>">Lista cereri</a></li>
					</ul>
					<img src="<?php echo base_url('assets\images\temp.png'); ?>" id="stil">
				</nav>
				<article id="continut">

				<img class="smallColt1" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
				<img class="smallColt2" src="<?php echo base_url('assets\images\smallColt.png'); ?>">
				<img class="smallColt3" src="<?php echo base_url('assets\images\smallColt.png'); ?>">

				<?php
					foreach($rows as $r) 
					{ 
						 $i=1;
						echo "<div class='proiecte'>"; 
						echo "<p class='titlul'><b>" . $r['numeStudent'] . " &#187 ".$r['numeTema']."</b>
						<button class='editare' name='".$i."' value='". $r['idTema']."'>Modificare</button>
						<button style='margin-right: 3px; width: 17%;' class='editare1' name='".$i."' value='". $r['idTema']."'>Eliminare din lista</button></p>";   
	                                foreach($r['etape'] as  $r2)
									{
										echo  '<p class="text">'.$i.". ".$r2['numeEtapa'].":<input class='iData' type='date' name= 'deadline' value='". $r2['deadline']."'>";
										if ($r2['stare']==1) echo '<label> </label>'.'<img class= "check" src="' . base_url('assets\images\checked.png') . '">';
										else echo "<button class='final' name='".$i."' value='". $r['idTema']."'>Finalizat</button>";
										echo "<input class='iDesc' type='text' name='descriere' value='". $r2['descriere'] ."'>" ;
										echo "</p>";
										$i++;
									}
						echo "<br>";
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
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\myStudents.js'); ?>"></script>
	</body>
</html>