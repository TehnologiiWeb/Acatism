<html>
	<head>
		<title></title>
	</head>
	<body>
		<div id="container">
			
			<p>My view has been loaded</p>
			
		<?php foreach($rows as $r) : ?>

		<h1><?php echo $r->title; ?></h1>
		<div><?php echo $r->contents; ?></div>

		<?php endforeach; ?>
	</body>

</html>