<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KodiPoints - Ease of rent payment">
    <meta name="author" content="Danne Consult">
    <title>KodiPoint</title>
    
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,600" rel="stylesheet">
	<link rel="icon" type="image/png" href="../ico.png"/>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="js/jquery.min.js"></script>

  </head>
  <body>
	<header>
		<article>
			<div class="topnav">
				<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
			</div>
			<div class="logo"><img src="assets/images/logo.png" /></div>
			<?php include 'controllers/navigation/homenav.php' ?>
		</article>
	</header>
	<div class="container12 banner">
		<img src="assets/images/banner1.jpg" />
		<div class="bannerdesc">
			<p class="aligncenter"><span>Ready for an upgrade?</span><br /> You are just a step away from a satisfying, stress free, rent-payment lifestyle...<br />"Oh yes, that's exactly what I need!" </p><br />
			<p class="aligncenter">I am a:</p>
			<p class="aligncenter"><a class="btn" href="register_landlord.php">Landlord</a>&nbsp;&nbsp;&nbsp;<a class="btn" href="register_tenant.php">Tenant</a></p>
		</div>
	</div>
	<div class="container12 intro">
		<article>
			<div class="col-md-6">
				<img class="aboutimg" src="assets/images/img1.jpg" />
			</div>
			<div class="col-md-6 aboutdesc">
				<h2><span>About</span><br />KodiPoint</h2>
				<p>Kodipoint opens you up to a world of rent-paying speed, simplicity and class. 
				<ul>
					<li>No more paperwork: Say goodbye to bank pay-in slips, invoices, receipts, rent statements</li>
					<li>Instant reconciliation: Still struggling with trying to trace specific payments in your statements? Relax! Your struggle ends here.</li>
					<li>More time, faster money: The time it takes for landlords/agents to send out invoices then wait for tenants to pay followed by payment verification and eventual receipting is too precious to spend on such trivialities. Kodipoint instantly eliminates that delay. Tenant pays and forgets about it. Landlord/agent realizes payment instantly.</li>
				</ul>
				</p>
				<p>What more do you need?</p>
			</div>
		</article>
	</div>
	<div class="container12">
		<article>
			<div class="break"></div>
				<div class="row">
					<div class="col-md-12 howitworks">
						<h2>How it works</h2>
						<p>Maecenas non nisl diam. Phasellus in justo viverra, consequat ante non, convallis mauris. Aliquam cursus sem id tristique porta. Morbi sagittis at eros at tristique. Pellentesque gravida ornare cursus. Vestibulum iaculis, nulla vitae hendrerit ullamcorper, magna lorem lacinia ipsum, a maximus risus nisl nec quam. In ut elit eu justo sodales elementum. Nam sem tortor, cursus eu volutpat vitae, tincidunt at arcu. Praesent imperdiet erat at tortor rutrum porttitor at vel elit. Maecenas rhoncus, purus eu mollis fermentum, enim tellus interdum est, vel tristique dui diam quis lacus. Morbi hendrerit vitae mauris vel commodo.</p>
					</div>
				</div>
				<div class="break"></div>
			</article>
	</div>
	<div class="container12 services">
		<article>
		<h2><span>Our</span> Services</h2>
			<div class="col-md-4 aligncenter">
				<div class="serviceimg" style="background:url(assets/images/residential.jpg) no-repeat center"></div>
				<h3>Residential</h3>
				<p>Proin eget augue a nisl sodales facilisis. Suspendisse eu nunc viverra, tempor leo nec, finibus odio. Maecenas velit purus, faucibus id interdum sit amet, congue sed ipsum. </p>
				<br />
				<p><a class="more_btn" href="">Read More</a></p>
			</div>
			<div class="col-md-4 aligncenter">
				<div class="serviceimg" style="background:url(assets/images/commercial.jpg) no-repeat center"></div>
				<h3>Commercial</h3>
				<p>Proin eget augue a nisl sodales facilisis. Suspendisse eu nunc viverra, tempor leo nec, finibus odio. Maecenas velit purus, faucibus id interdum sit amet, congue sed ipsum. </p>
				<br />
				<p><a class="more_btn" href="">Read More</a></p>
			</div>
			<div class="col-md-4 aligncenter">
				<div class="serviceimg"  style="background:url(assets/images/land.jpg) no-repeat center"></div>
				<h3>Land/Plots</h3>
				<p>Proin eget augue a nisl sodales facilisis. Suspendisse eu nunc viverra, tempor leo nec, finibus odio. Maecenas velit purus, faucibus id interdum sit amet, congue sed ipsum. </p>
				<br />
				<p><a class="more_btn" href="">Read More</a></p>
				
			</div>
		</article>
	</div>
	<?php include 'controllers/base/footer.php' ?>
  </body>
</html>