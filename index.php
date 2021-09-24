<?php
if(isset($_POST['log'])) 
{
	include("db.php");
	$uname=$_POST['Uname'];
	$pass=$_POST['Pass'];
	
	$str="select * from login where uname='$uname' and password='$pass'";
	$res=$c->query($str);
	$type="";
    if ($res->num_rows > 0){
        while($res1 = $res->fetch_assoc()){
            session_start();
            $_SESSION['uname']=$res1['uname'];
            $type=$res1['type'];
        }
    } 
	
	
	if($type=="admin")
	{
		header("location:indexadmin.php");
	}
	else if($type=="user")
	{
		header("location:view.php");
	}
	
	else
	{
		?>
        <script>
		alert("Invalid UserName or Password");
		</script>
        <?php
	}
}
?>
<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>    
	<body> 
		<div class="container">
			<div class="main_box">
				<div class="leftpart">
				<center>       
					<caption><h2>Login</h2></caption><br>
    
						<a href="https://www.facebook.com/"><i class="fa fa-facebook" id="fb-icon"></i></a>&nbsp;
						<a href="https://twitter.com/LOGIN"><i class="fa fa-twitter" id="twitter-icon"></i></a>
						<p>or use your account</p>
						<form id="login" method="get" action="#">     
							<input type="text" name="Uname" id="uname" placeholder="Email">    
							<br><br>        
							<input type="password" name="Pass" id="pass" placeholder="Password">
								<div id="errors">
								</div><br>          
							<label>New User?</label>
							<a href="register.html" id="reg-link">Register</a> <br><br>
							<input type="button" name="log" id="log" value="Log in"> 
						</form>
				</center>
				</div>
				<div class="rightpart">

				</div>
			</div>
		</div>
	<script type="text/javascript" src="script.js"></script>            
	</body>    
</html>     
