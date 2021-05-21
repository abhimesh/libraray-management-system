<?php
session_start(); // to obtain username in $_SESSION["librarian_user"] variable at time of login for other pages. We obtain username in this case of librarian and store in the global session variable thru which it is accessed
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Librarian Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Librarian Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit1" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

           <!-- <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.html"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div> -->
        </form>
    </section>
<?php

if(isset($_POST["submit1"]))
{
	$count=0;
	$name;
	$sql="SELECT * FROM librarian_registration WHERE username='$_POST[username]' AND password='$_POST[password]'";           // select details from database
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	while($row=mysqli_fetch_array($res))
		{
			$name=$row["firstname"]." ".$row["lastname"];
		}
	if($count==0)
	{
		?>
		<div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>

<?php
	}
	
	else
	{
		
		$_SESSION["librarian_user"]=$_POST["username"];   // username in session variable for global use in other pages as well
		
	$_SESSION["librarian_name"]=$name; 
		
	 ?>
	 <script type="text/javascript">
	  window.location="display_student_info.php";              // leads to page with details of students registered
	 </script>
<?php
	}
}
	?>
</div>




</body>
</html>
