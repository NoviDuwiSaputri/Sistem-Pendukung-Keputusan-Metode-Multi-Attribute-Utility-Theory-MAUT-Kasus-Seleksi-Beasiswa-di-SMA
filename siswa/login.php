<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPK | Login Admin</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href = "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel = "stylesheet ">

</head>
<body id="bg-login">
	<div class="box-login">
		<h2>LOGIN</h2>
		<form action="" method="POST"> 
			<input type="text" name="username" placeholder="Username" class="input-control">
			<input type="password" name="password" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn">
		</form>
		<?php
		if (isset($_POST['submit'])){
			session_start();
			include "config.php";

			$user = mysqli_real_escape_string($conn, $_POST['username']);
			$pass = mysqli_real_escape_string($conn, $_POST['password']);
			
			$cek = mysqli_query($conn,"SELECT * FROM admin WHERE username = '".$user."' AND password = '".$pass."'");		
			if (mysqli_num_rows ($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true ;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;
					echo '<script>window.location="index.php"</script>';
			}else{
					echo '<script>alert("Username atau Password salah")</script>';
			}
		}
		?>
	</div>
</body>
</html>
