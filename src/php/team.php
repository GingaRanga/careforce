<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "careforce@careforce.ca";
    $email_subject = "Message to Careforce";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['formName']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $formName = $_POST['formName']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$formName)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Full Name: ".clean_string($formName)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Thank you</strong> for contacting Careforce. We will be in touch with you very soon.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<?php

}
?>

<!doctype html>
<html lang="en">
<head>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-26894530-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-26894530-1');
	</script>

	<!-- FIRST THREE REQUIRED META -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- SEARCH ENGINE META -->
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">

	<!-- SEO & AUTHOR META -->
	<meta name="author" content="Evan Marshall">
	<meta name="description" content="Careforce is a home health care agency, serving clients and their families from Windsor to Bridgetown, Nova Scotia. We are an approved provider for Veterans Affairs Canada, the Workers' Compensation Board, and most insurance companies.">
	<meta name="keywords" content="homecare, healthcare, seniors, health, careforce, care, veterans, nova scotia, annapolis valley, caregiver, dementia, co-op">
	<title>Careforce</title>

	<!-- FAVICON LINKS -->
	<link rel="icon" type="image/png" sizes="17x16" href="../assets/img/favicon-17x16.png">
	<link rel="icon" type="image/png" sizes="34x32" href="../assets/img/favicon-34x32.png">
	<link rel="icon" type="image/png" sizes="102x96" href="../assets/img/favicon-102x96.png">

	<!-- FACEBOOK OPEN GRAPH META -->
	<meta property="fb:app_id" content="123456789">
	<meta property="og:url" content="https://careforce.ca/">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Careforce">
	<meta property="og:image" content="https://careforce.ca/assets/img/carousel-1.jpg">
	<meta property="og:description" content="Careforce is a home health care agency, serving clients and their families from Windsor to Bridgetown, Nova Scotia.">
	<meta property="og:site_name" content="Careforce">
	<meta property="og:locale" content="en_US">

	<!-- GOOGLE+ & SCHEMA.ORG META -->
	<meta itemprop="name" content="Careforce">
	<meta itemprop="description" content="Careforce is a home health care agency, serving clients and their families from Windsor to Bridgetown, Nova Scotia.">
	<meta itemprop="image" content="https://careforce.ca/assets/img/carousel-1.jpg">

	<!-- BOOTSTRAP 4 STYLESHEETS & CUSTOM - before all other stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style.css">
	<!-- Google Material Icons & MFB & MODERNIZR-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../css/mfb.css">
	<script src="../js/modernizr.touch.js"></script>
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha256-j+P6EZJVrbXgwSR5Mx+eCS6FvP9Wq27MBRC/ogVriY0=" crossorigin="anonymous" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body id="page-top">

<!-- NAVIGATION //////////////////////////////////////////////////////////////////////////////////////////////// -->

	<nav class="navbar navbar-expand-md resources-nav navbar-light bg-light fixed-top">
		<a href="../index.php#page-top" class="navbar-brand">
			<img src="../assets/img/brand-logo-trans-2.svg" alt="company logo" width="150" height="50">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#resourcesNav" aria-controls="resourcesNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end" id="resourcesNav">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="../index.php">Home</a>
        <a class="nav-item nav-link" href="../index.php#about">About Careforce</a>
				<a class="nav-item nav-link" href="services.php">Our Services</a>
        <a class="nav-item nav-link" href="veterans.php">Veterans</a>
        <a class="nav-item nav-link" href="resources.php">Resources</a>
				<a class="nav-item nav-link" href="#contact">Contact Us</a>
				<!--<a class="nav-item nav-link" href="#">Events</a>-->
				<a class="nav-item nav-link" href="faqs.php">FAQs</a>
				<a class="nav-item nav-link" href="https://careforcens.sharepoint.com/sites/careforce" target="_blank">Employee Login</a>
			</div>
		</div>
	</nav>

<!-- CONTACT FLOAT ///////////////////////////////////////////////////////////////////////////////////////////// -->

	<ul class="mfb-component--br mfb-slidein" data-mfb-toggle="hover">
		<li class="mfb-component__wrap">
			<!-- the main menu button -->
			<a data-mfb-label="Hover or Click this button" class="mfb-component__button--main">
				<!-- the main button icon visibile by default -->
				<i class="mfb-component__main-icon--resting material-icons">add</i>
				<!-- the main button icon visibile when the user is hovering/interacting with the menu -->
				<i class="mfb-component__main-icon--active material-icons">clear</i>
			</a>
			<ul class="mfb-component__list">
				<li>
					<a href="https://www.facebook.com/careforcehomecare" data-mfb-label="Our Facebook Page" class="mfb-component__button--child" target="_blank">
						<i class="mfb-component__child-icon material-icons fa fa-facebook-square fa-2x" style="line-height: 55px;"></i>
					</a>
				</li>
        <li>
    			<a href="https://careforcens.sharepoint.com/sites/careforce" data-mfb-label="Employee Page" class="mfb-component__button--child" target="_blank">
      			<i class="mfb-component__child-icon material-icons fa fa-windows fa-2x" style="line-height: 55px;"></i>
    			</a>
    		</li>
				<li>
					<a href="#page-top" data-mfb-label="Back to top" class="mfb-component__button--child">
						<i class="mfb-component__child-icon material-icons">keyboard_arrow_up</i>
					</a>
				</li>
			</ul>
		</li>
	</ul>

<!-- HTML5 HERO CAROUSEL /////////////////////////////////////////////////////////////////////////////////////// -->

<div class="header text-light header-img-1">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
      </div>
      <div class="col-lg-8">
        <div class="text-center" style="padding-top:50px;">
          <img src="../assets/img/brand-logo-trans-2.svg" width="50%" height="40%" alt="company logo">
          <p class="text-dark">helping valley residents live comfortably &amp; safely at home for over 25 years</p>
        </div>
      </div>
      <div class="col-lg-2">
      </div>
    </div>
  </div>
  <div class="apply text-center d-inline-flex p-2 justify-content-center align-items-center">
    <p class="text-muted m-0 pr-2">Call <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a> for a free consultaion </p>
    <!-- <a href="" class="btn btn-info">Request an Assessment</a> -->
  </div>
</div>

  <!-- TEAM //////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <section id="team">
		<div class="container pb-5">
			<div class="text-center title">
				<h1>Service with a Smile</h1>
				<hr class="style15">
				<p>Choosing to receive assistance in your home can be a new and stressful experience; that's why the caregiver has to be someone you can trust.</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="../assets/img/caregivers.jpg" alt="" class="img-fluid img-thumbnail">
					<small class="text-muted">The Careforce Team, June 2015</small>
					<p class="pt-3">We screen our staff carefully, making sure they are bonded and insured, and we encourage and provide professional development training.</p>
					<p>But we go further than that–we choose only staff that are friendly, dependable, and who will understand your needs and preferences. Cooking meals, helping clean house, running errands and more–our staff will help you with everyday tasks that you may be finding difficult or challenging.</p>
					<p>Our staff look forward to coming to your home. What's more important, you'll look forward to them coming, too.</p>
				</div>
				<div class="col-lg-6 bg-info team-text-box p-3 text-light">
					<h4>All of our caregivers are&#58;</h4>
					<ul>
						<li>People we would want working in our own homes caring for our loved ones</li>
						<li>Directly supervised and coached by a Nurse</li>
						<li>Carefully screened, bonded and insured</li>
						<li>Fully covered by the Workers' Compensation Board of Nova Scotia</li>
						<li>Paired with you to suit your preferences and lifestyle</li>
						<li>Trained and certified in First Aid and CPR</li>
						<li>Educated with monthly skills training so they are always increasing their knowledge and abilities</li>
						<li>Professional, dependable and reliable</li>
						<li>Friendly and understanding</li>
						<li>Able to access our on call Nurse any time day or night</li>
						<li>Committed to providing, without compromise, the highest quality of care</li>
						<li>Certified in WHMIS and Food Safety</li>
					</ul>
					<h4>Many of our caregivers&#58;</h4>
					<ul>
						<li>Are registered Continuing Care Assistants (CCAs)</li>
						<li>Are certified in the Alzheimer's Disease and Other Dementias Care Course</li>
						<li>Are certified in the Palliative Care Frontline Education Course</li>
						<li>Have completed Mental Health First Aid training</li>
						<li>Owners of our business</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

<!-- FOOTER //////////////////////////////////////////////////////////////////////////////////////////////////// -->

	<section id="contact" class="footer">
		<footer>
			<div>
				<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=careforce&key=AIzaSyBK3CAMRfxezsAwpO80qC1_-gdb-qV0VCc" allowfullscreen></iframe>
			</div>
			<div class="main-footer">
				<hr class="style15 pb-5">
				<div class="container-fluid">
					<div class="row p-2">
						<div class="col-lg-4">
							<div class="pb-3">
								<h5>Address:</h5>
								<p>6 Webster Court&#44; Kentville&#44; NS&#44; B4N 1H2</p>
							</div>
							<div class="pb-3">
								<h5>Phone:</h5>
								<p>Regular Phone&#58; <a href="tel:+19023653155">&#40;902&#41; 365&#45;3155</a></p>
								<p>Toll Free &#45; 24/7&#58; <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a></p>
								<p>Fax&#58; <a href="tel:+19023653125">1&#45;902&#45;365&#45;3125</a></p>
							</div>
							<div class="pb-3">
								<h5>Email:</h5>
								<a href="mailto:careforce@careforce.ca">careforce@careforce.ca</a> <br><br>
							</div>
							<div class="pb-3">
								<h5>Office Hours:</h5>
								<p>Monday &#45; Friday&#58; 9:00am &#45; 4:30pm</p>
								<p>Saturday &#45; Sunday&#58; Closed</p>
							</div>
							<div class="pb-3">
								<h5>After Hours:</h5>
								<p>We can be reached 24/7 by phone</p>
								<p>Toll Free&#58; <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a></p>
							</div>
						</div>
						<hr style="border-top: 1px solid #CDCDCD;"> <!-- CHECK OUT WHY THIS ISNT DISPLAYING -->
						<div class="col-lg-4">
							<h5>Company Contacts</h5>
							<div class="pb-3">
								<p class="font-weight-bold">Director of Care</p>
								<p>Kathie Swindell</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:kathie@careforce.ca">kathie@careforce.ca</a></p>
							</div>
							<div class="pb-3">
								<p class="font-weight-bold">Manager</p>
								<p>Debbie Raine</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:debbie@careforce.ca">debbie@careforce.ca</a></p>
							</div>
							<div class="pb-3">
								<p class="font-weight-bold">Nurse Supervisor</p>
								<p>Nicki Ansems&#44; LPN</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:nurse@careforce.ca">nurse@careforce.ca</a></p>
							</div>
							<div class="pb-3">
								<p class="font-weight-bold">Quality Service Coordinator</p>
								<p>Jane Jones</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:service@careforce.ca">service@careforce.ca</a></p>
							</div>
							<div class="pb-3">
								<p class="font-weight-bold">Scheduler</p>
								<p>Julie MacRae</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:scheduler@careforce.ca">scheduler@careforce.ca</a></p>
							</div>
							<div class="pb-3">
								<p class="font-weight-bold">Payroll and Accounting</p>
								<p>Kim Kelly</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:accounting@careforce.ca">accounting@careforce.ca</a></p>
							</div>
							<div class="pb-3">
								<p class="font-weight-bold">Administrative Assistant</p>
								<p>Alisha Egan</p>
								<p><span class="font-italic">Email&#58;</span> <a href="mailto:alisha@careforce.ca">alisha@careforce.ca</a></p>
							</div>
						</div>
						<div class="col-lg-4">
							<form name="contactForm" method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">
								<fieldset>
									<legend><h5>Leave us a message</h5></legend>
									<div class="form-group">
										<label for="formName">Full name</label>
										<input name="formName" type="name" class="form-control" id="formName" aria-describedby="nameHelp" placeholder="Full Name" required>
										<small id="nameHelp" class="form-text text-muted">Please enter your full name.</small>
									</div>
									<div class="form-group">
										<label for="email">Email address</label>
										<input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
									<div class="form-group">
										<label for="comments">Enter your message here</label>
										<textarea name="comments" class="form-control" id="comments" rows="3"></textarea>
									</div>
									<button name="submit" type="submit" class="btn btn-info btn-block" value="Submit">Submit</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="copyright text-center p-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<small class="p-2">&copy; Careforce Home Healthcare&#44; 2017</small>
						<small class="p-2">Website carefully crafted by &#45; <a href="https://www.elysianwebdesign.com" target="_blank">Elysian Web Design</a></small>
						<a href="https://www.elysianwebdesign.com" target="_blank"><img class="align-self-center" src="../assets/img/logo-wh.svg" alt="Elysian Web Design Logo" width="25"></a>
					</div>
					<div class="col-lg-12 d-flex align-items-center justify-content-center">
						<img src="../assets/img/BROCHURE - BBB logo.png" alt="" class="img-fluid p-2" width="10%">
						<img src="../assets/img/image002.png" alt="" class="img-fluid p-2" width="10%">
						<img src="../assets/img/Careforce button RGB full colour png.png" alt="" class="img-fluid p-2" width="10%">
						<img src="../assets/img/HCCFC-logo.jpg" alt="" class="img-fluid p-2" width="10%">
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- BOOTSTRAP 4 JS & JQUERY - jquery and popper first ///////////////////////////////////////////////////////// -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
<!-- MFB JS //////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<script src="../js/mfb.min.js"></script>
<!-- GSAP JS /////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenLite.min.js" integrity="sha256-urKHuZ772q9CZZjbN5geWh0ObNvIL4INeQTSQkZC2/M=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TimelineLite.min.js" integrity="sha256-C4E1OAB7XxX0S7evnj9fNvU/+C2L2hzXwq861HQTVAA=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js" integrity="sha256-DVfSynPZfzB2Mca3EebIt2UJmcQfeWPtUe0+Tghv4cc=" crossorigin="anonymous"></script>
<!-- CUSTOM JS ///////////////////////////////////////////////////////////////////////////////////////////////// -->
  <script src="../js/custom.js"></script>

</body>
</html>
