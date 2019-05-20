<?php
	
	if(isset($_POST['submt'])){
		
		$name=$_POST['name'];
		$email=$_POST['email'];
		
		$q1=$_POST['q1'];
		$q2=$_POST['q2'];
		$q3=$_POST['q3'];
		$q4=$_POST['q4'];
		$q5=$_POST['q5'];
		$q6=$_POST['q6'];
		$q7=$_POST['q7'];
		$q8=$_POST['q8'];
		$q9=$_POST['q9'];
		$q10=$_POST['q10'];
		$q11=$_POST['q11'];
		$q12=$_POST['q12'];
		
		$today=date("Y/m/d");
		

		$message="<table cellpadding='5' cellspacing='0' width='600' border='1'>
			<tr align='center'>
				<td colspan='6'><img src='https://kodipoint.com/survey/images/emailbanner.png' width='200px'/></td>
			<tr>
			<tr align='center'>
				<td colspan='6'><h2>Online Landlord Survey by ". $name ." on ". $today ."</h2></td>
			<tr>
			<tr>
				<td>Name:</td>
				<td><b>".$name."</b></td>
				<td>Email:</td>
				<td><b>".$email."</b></td>
			</tr>
			<tr>
				<td colspan='4'>Section 1: Problems faced during rent collection:</td>
			</tr>
			<tr>
				<td>1.	How do you currently collect rent?</td>
				<td colspan='2'><b>".$q1."</b></td>
			</tr>
			<tr>
				<td>2.	Why that method?</td>
				<td colspan='2'><b>".$q2."</b></td>
			</tr>
			<tr>
				<td>3.	What is the biggest challenge in that process?</td>
				<td colspan='2'><b>".$q3."</b></td>
			</tr>
			<tr>
				<td>4.	How would you like it to be addressed?</td>
				<td colspan='2'><b>".$q4."</b></td>
			</tr>
			
			<tr>
				<td colspan='4'>Section 2: Problems faced in assessing worthwhile tenants:</td>
			</tr>
			<tr>
				<td>1.	How do you find tenants to occupy your house?</td>
				<td colspan='2'><b>".$q5."</b></td>
			</tr>
			<tr>
				<td>2.	Why that channel?</td>
				<td colspan='2'><b>".$q6."</b></td>
			</tr>
			<tr>
				<td>3.	Which is the biggest challenge you face in that process?</td>
				<td colspan='2'><b>".$q7."</b></td>
			</tr>
			<tr>
				<td>4.	Which suggestion can you give to help solve it?</td>
				<td colspan='2'><b>".$q8."</b></td>
			</tr>
			
			<tr>
				<td colspan='4'>Section 3: Problems faced while accessing development loans:</td>
			</tr>
			<tr>
				<td>1.	Where do you mostly get loans for your development?</td>
				<td colspan='2'><b>".$q9."</b></td>
			</tr>
			<tr>
				<td>2.	Why?</td>
				<td colspan='2'><b>".$q10."</b></td>
			</tr>
			<tr>
				<td>3.	What is the most pressing challenge do you face while seeking the loans?</td>
				<td colspan='2'><b>".$q11."</b></td>
			</tr>
			<tr>
				<td>4.	What solution would you propose to address the problem?</td>
				<td colspan='2'><b>".$q12."</b></td>
			</tr>
			
			</table>";
			
		echo $message;
		
		$subject= "Online Landlord Survey by ". $name ." on ". $today;	
		$to = "survey@kodipoint.com";
		$headers = "From: Kodi Point <survey@kodipoint.com>\r\n". 
		   "MIME-Version: 1.0" . "\r\n" . 
		   "Content-type: text/html; charset=UTF-8" . "\r\n";
		mail($to,$subject,$message,$headers);
		header("location:thankyou.php");
		
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kodi Point - Online Survey">
    <meta name="author" content="Kodi Point">
    <title>Kodi Point - Survey</title>
    
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,600" rel="stylesheet">
	<link rel="icon" type="../image/png" href="images/ico.png"/>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="bodycont">
  <header>
	<article>
	  <div class="logo"><img src="images/logo.png" /></div>
	</article>
  </header>
  <div class="container12"><h2 class="aligncenter">Online Landlord Survey</h2></div>
	<div class="container12">
	  <form class="contactForm" method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
		<article>
			<div class="row">
				<div class="col-md-12"><h3>Personal Information</h3></div>
			</div>
			<div class="row marginbottom">
				<div class="col-md-6">
					<input type="input" name="name" placeholder="Enter your name" />
				</div>
				<div class="col-md-6">
					<input type="email" name="email" placeholder="Enter your email" />
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12"><h4>Section 1: Problems faced during rent collection:</h4></div>
			</div>
			<div class="row">
				<div class="col-md-12">1.	How do you currently collect rent?</div>
				<div class="col-md-12"><textarea name="q1"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">2.	Why that method?</div>
				<div class="col-md-12"><textarea name="q2"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">3.	What is the biggest challenge in that process?</div>
				<div class="col-md-12"><textarea name="q3"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">4.	How would you like it to be addressed?</div>
				<div class="col-md-12"><textarea name="q4"></textarea></div>
			</div>
			
			<div class="row">
				<div class="col-md-12"><h4>Section 2: Problems faced in assessing worthwhile tenants:</h4></div>
			</div>
			<div class="row">
				<div class="col-md-12">1.	How do you find tenants to occupy your house?</div>
				<div class="col-md-12"><textarea name="q5"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">2.	Why that channel?</div>
				<div class="col-md-12"><textarea name="q6"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">3.	Which is the biggest challenge you face in that process?</div>
				<div class="col-md-12"><textarea name="q7"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">4.	Which suggestion can you give to help solve it?</div>
				<div class="col-md-12"><textarea name="q8"></textarea></div>
			</div>
			
			<div class="row">
				<div class="col-md-12"><h4>Section 3: Problems faced while accessing development loans:</h4></div>
			</div>
			<div class="row">
				<div class="col-md-12">1.	Where do you mostly get loans for your development?</div>
				<div class="col-md-12"><textarea name="q9"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">2.	Why?</div>
				<div class="col-md-12"><textarea name="q10"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">3.	What is the most pressing challenge do you face while seeking the loans?</div>
				<div class="col-md-12"><textarea name="q11"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12">4.	What solution would you propose to address the problem?</div>
				<div class="col-md-12"><textarea name="q12"></textarea></div>
			</div>
			
			
			<div class="row marginbottom">
				<div class="col-md-12">
					<input class="submit" type="submit" name="submt" value="Submit Answers">
				</div>
			</div>
		</article>
	</div>
	</form>
	<footer>
		<div class="copy">
			<article>
				<p>&copy;2018 Kodi Point | <a href="">Privacy Policy</a> | <a href="">Terms and conditions</a></p>
			</article>
		</div>
	  </footer>
	 <div style="clear:both;"></div>
</div>
</body>
</html>