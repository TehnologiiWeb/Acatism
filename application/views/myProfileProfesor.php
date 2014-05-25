<html>
	<head>
		<title>Acatism</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets\images\title.png'); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets\css\static.css'); ?>"/>
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
			<?php
			echo "<table><tr><th>RowName</th></tr>";
			foreach($rows as $r)
			{
			echo "<tr>";
			echo "<td>" . $r['titlu'] . "</td>";
			echo "<td>" . $r['descriere'] . "</td>";
			echo "<td>" . $r['nrstud'] . "</td>";
			echo "</tr>";
			}
			echo "</table>"
			?>
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
					<!-- AICI DIV-UL CENTRAL-->
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
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\jquery.js'); ?>"></script>
			<script type="text/javascript" src="<?php echo base_url('assets\scripts\static.js'); ?>"></script>
	</body>
</html>