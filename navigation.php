<!DOCTYPE html>
<html>
<head>
	<title>header</title>
	<style>
		
		.navigation_container{
			/*background: red;*/
			display: flex;
			justify-content: space-between;
			padding: 0 150px;
		}
		.logo{
			height: 100px;
			width: 100px;
		}
		.authenticators{
			display: flex;
			align-items: center;
			/*background: orange;*/
		}
		.authenticators a{
			margin-right: 20px;
			text-decoration: none;
			color:initial;
			text-transform: capitalize;
		}
		

		@media(max-width: 768px){
			.navigation_container{
				padding:0 10px;
			}
			.logo{
			height: 80px;
			width: 80px;
		}
		}


	</style>
</head>
<body>
	<?php
		$hell = 1212;
		// echo "$hell";
		// echo "$man";
		// echo "$inde";
	?>

		<?php
		echo '<div class="navigation_container">

				<div>
				<img class="logo" src="./Images/logo.png"/>

				</div>

				<div class="authenticators">
					<a href="/signup.php">
					signup
					</a>
					<a href="/login.php">
					login
					</a>
					<a href="#">
						logged user
					</a>
				</div>




		</div>'

		?>
</body>
</html>