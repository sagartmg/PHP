<?php
	include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	<style type="text/css">
		
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			border: 1px solid teal;

		}
		.signup_form{
			/*background: orange;*/
			min-height: 50vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		.signup_form input{
			height: 2em;
			/*padding: 2em;*/
			padding: 0 2em;
			/*width: fit-content;*/
			margin-bottom: 1.5em;

		}
		#signup_btn{
			width: fit-content;
		}

		::placeholder{
			text-transform: uppercase;
		}
		.signup_whole{
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		.signup_form_container{
			flex-grow: 1;
			display: flex;
			align-items: center;
			justify-content: center;

		}

	</style>
</head>
<body>

		<div class="signup_whole">


		<?php
			include 'navigation.php';
			

		?>


		<div class="signup_form_container">
			<form class="signup_form" method="post">
				<input type="text" name="username" placeholder="username"/>
				<input type="password" name="password" placeholder="password"/>
				<input type="submit" value="signin" name="signup" id="signup_btn"/>

			</form>
		</div>
		<?php
			if(isset($_POST['signup'])){

				// preventing(s) sql injection using escape(s) converting query to string. 

				// $sql = "INSERT INTO users (username, password)
				// VALUES ('".$_POST['username']."','".$_POST['password']."')";


				// if (mysqli_query($conn, $sql)) {
				//   echo "New record created successfully";
				// } else {
				// 	// echo "there is new <br>";
				//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				// }

				// mysqli_close($conn);




                  // sql injection using prepared statements
				      	$sql = "SELECT username from users WHERE username=? ";
				      	$stmt = mysqli_stmt_init($conn);
				      	// Initialize a statement and return an object to use with stmt_prepare():
				      	if(!mysqli_stmt_prepare($stmt,$sql)){
				      		header("Location:./signup.php?error=sqlerror");
				      		exit();
				      	}else{
				      		mysqli_stmt_bind_param($stmt,"s",$_POST['username']);
				      		mysqli_stmt_execute($stmt);
				      		mysqli_stmt_store_result($stmt);
				      		$rowcount = mysqli_stmt_num_rows($stmt);


				      		if($rowcount>0){
				      		// if(1<0){
				      			header("Location:./signup.php?error=username aleready taken");
				      			exit();
				      		}else{
				      			$username=$_POST['username'];
				      			$password=$_POST['password'];

								$sql = "INSERT INTO users (username,password)VALUES(?,?)";
								$stmt = mysqli_stmt_init($conn);

				      			if(!mysqli_stmt_prepare($stmt,$sql)){
				      				header("Location:./signup.php?error=sqlerror in prepareing");
				      			    exit();
				      			}else{
				      				mysqli_stmt_bind_param($stmt,"ss",$username,$password);
				      				mysqli_stmt_execute($stmt);
				      				mysqli_stmt_store_result($stmt);
						      		$rowcount = mysqli_stmt_num_rows($stmt);
						      		echo "user registered";

				      			}


				      		}



				      	}
				        mysqli_close($conn);





			}



			



		?>
	</div>

		
</body>
</html>