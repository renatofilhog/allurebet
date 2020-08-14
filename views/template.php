<!DOCTYPE html>
<html>
	<head>
		<title>CHAT</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASEURL;?>/assets/css/template.css">
		<script type="text/javascript" src="<?php echo BASEURL;?>/assets/js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BASEURL;?>/assets/js/script.js"></script>
	</head>
	<body>
		<div class="enviroment" style="background-color:<?php
			if(isset($_SESSION['area']) && $_SESSION['area'] == 'suporte'){
				echo "#ff0000";
			} elseif(isset($_SESSION['area']) && $_SESSION['area'] == 'cliente') { 
				echo "#00ff00";
			} else {
				echo "#000";
			}
		?>"></div>
		<div class="container">
			<?php $this->loadView($viewName, $viewData); ?>
		</div>
	</body>
</html>