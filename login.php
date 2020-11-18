<?php
	include 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style type="text/css">

		*{

				margin: 0;
				padding: 0;
				box-sizing: border-box;
				border:1px solid teal;

		}
		
		.login_container{
			display: flex;
			/*flex-direction: column;*/
			/*background: red;*/
			/*padding: 20px;*/
			justify-content: center;
		}
		.login_form{
			display: flex;
			flex-direction: column;
			/*background: orange;*/
			/*justify-content: center;*/
		}
		.login_form input{
			/*height: 50px;*/
			height: 2em;
			width: 200px;
			padding: 0 20px;
		}


		#login_submit{
			/*margin-top: 2em;*/
			
			width: fit-content;

		}
		.login_whole{
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		.login_container{
			flex-grow: 1;
			display: flex;
			align-items: center;
			justify-content: center;

		}

		.login_form{
			/*background: orange;*/
			min-height: 50vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		.login_form input{
			height: 2em;
			/*padding: 2em;*/
			padding: 0 2em;
			/*width: fit-content;*/
			margin-bottom: 1.5em;

		}
		#login_submit{
			width: fit-content;
		}
		::placeholder{
			text-transform: uppercase;
		}

		#dynamic{
			width: 100px;
			height: 50px;
		}


	</style>
</head>
<body>

	<div class="login_whole">
	<?php
	include 'navigation.php';
     ?>
     <!-- todo auto fill up forms -->
      <?php
         
      		if(isset($_COOKIE["username"])){
      			$data = $_COOKIE['username'];
      		      echo "<input id='dynamic' type='text' name='cookie' value=$data>";



      		}


      ?>
     
		
		<div class="login_container">
		<form method="post" class="login_form">
			<input type="text" placeholder="username" name="username"/>
			<input type="password" name="password" placeholder="password"/>
			<input type="submit" name="submit_login" value="login" id="login_submit">
		</form>
	</div>

	     <?php

			     if(isset($_COOKIE["username"])){
			     echo "user " . $_COOKIE["username"];

			     }



			if(isset($_POST['submit_login'])){
				
				 // sql injection using  escape all user supplided input
				 // convertin input to stirng(s)
				$sql = "SELECT * FROM users WHERE username = '".$_POST['username']."' and password = '".$_POST['password']."'";
			      
			      $result = mysqli_query($conn,$sql);// check if the query is correct(s);
			       $count = mysqli_num_rows($result);
				      if($count > 0) {
				      	echo "user exits ";
				      }else {
				         $error = "Your Login Name or Password is invalid";
				         echo $error;
				      }

				      // also...... using prepared statements. 

		        
				      			$username=$_POST['username'];
				      			$password=$_POST['password'];

				      			

				      			$sql = 'Select * from users WHERE username=? and password=?';
				      			$stmt = mysqli_stmt_init($conn);

				      			if(!mysqli_stmt_prepare($stmt,$sql)){
				      				header("Location:./signup.php?error=sqlerror in prepareing");
				      			    exit();
				      			}
				      			else{
				      				mysqli_stmt_bind_param($stmt,"ss",$username,$password);
				      				mysqli_stmt_execute($stmt);
				      				mysqli_stmt_store_result($stmt);
						      		$rowcount = mysqli_stmt_num_rows($stmt);
						      		if($rowcount>0){
						      			echo "success";
										setcookie("username",$username,time()+10000);


						      		}
						      		else{
						      			echo "no user fornd";
						      		}


				      			}
				      			

			}
	?>
</div>
</body>
</html>