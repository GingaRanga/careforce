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
        <a class="nav-item nav-link" href="veterans.php">Veterans</a>
				<a class="nav-item nav-link" href="team.php">Our Caregivers</a>
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
    <p class="text-muted m-0 pr-2">Call <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a> for a free consultaion OR </p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assessmentModal">Request an Assessment</button>
  </div>
</div>

	<!-- SERVICES SECTION ///////////////////////////////////////////////////////////////////////////////////// -->

	<section class="bg-light" id="services">
		<div class="container pb-5">
			<div class="text-center title">
				<h1>Our Services</h1>
				<hr class="style15">
				<p>We provide flexibility in all that we do. Our hours and services are designed around your lifestyle. We will adapt our home care services to meet your requirements whether for a change in your health or your schedule. From assistance in caring for someone with Alzheimers to providing a helping hand while recovering from a hospital stay, a visit from Careforce is always a visit you can look forward to.</p>
			</div>
		</div>
    <div class="container-fluid">
		    <div class="bg-info p-3 team-text-box mb-5">
		        <div class="box-wrap team-text-box bg-white p-3 text-center">
              <div class="row">
                  <div class="col-lg-6">
                    <div class="p-4">
                      <i class="fa fa-fast-forward fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Immediate Response</h5>
                      <p class="text-secondary">Peace of mind - days, evenings and weekends with staffed phone service and short notice availability.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-handshake-o fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Joyful Companionship</h5>
                      <p class="text-secondary">A bright spot in your day - conversation, walks, social outings and more.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-shopping-cart fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Outings, Errands and Appointments</h5>
                      <p class="text-secondary">Getting where you want with ease - groceries, pharmacy, visiting friends, classes and more.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-user-md fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Alzheimer &amp; Dementia Care</h5>
                      <p class="text-secondary">Expect patience and compassion - creative and knowledgeable support when you need it.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-suitcase fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Workers Compensation care provider</h5>
                      <p class="text-secondary">Careforce is an approved provider for the Workers Compensation Board of Nova Scotia, providing care for you when you're unable to return to work.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-bath fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Personal Care</h5>
                      <p class="text-secondary">Nurture your health and personal style - dignified and respectful care to suit your needs.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-bed fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Drop-ins and Check-ins</h5>
                      <p class="text-secondary">Comfort and well-being when a short visit is all you need.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-cutlery fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Housekeeping, Laundry, Meal Planning and Preparation</h5>
                      <p class="text-secondary">Your home kept the way you like it and your favourite meals prepared the way you expect they should be.</p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="p-4">
                      <i class="fa fa-refresh fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Respite Care</h5>
                      <p class="text-secondary">Take some time to rejuvenate, relax or regroup - support for those taking care of others.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-heart fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Palliative Care</h5>
                      <p class="text-secondary">Tenderness and dignity - gracious, end-of-life support for you and your family.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-anchor fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Veterans Affairs and Insurance Provider</h5>
                      <p class="text-secondary">Easily access the benefits you need - we are an approved provider for V.A.C. or insurance coverage.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-pie-chart fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Liaison Services</h5>
                      <p class="text-secondary">Help with the paperwork and navigating the health system.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-car fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Transportation</h5>
                      <p class="text-secondary">Getting you to appointments, social outings, and other important events.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-medkit fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Hospital and Nursing Home Visits</h5>
                      <p class="text-secondary">A friend by your side when you need extra support.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-moon-o fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Overnight, Weekend, and Holiday Care</h5>
                      <p class="text-secondary">Whenever you need us, we will be there; 24 hours a day, 365 days a year.</p>
                    </div>
                    <div class="p-4">
                      <i class="fa fa-phone fa-3x icon rounded-circle" aria-hidden="true"></i>
                      <h5 class="title pt-2">Nurse On Call</h5>
                      <p class="text-secondary">A knowledgeable resource - personal and professional advice when you need it 24 hours a day, seven days a week.</p>
                    </div>
                  </div>
                </div>
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

<!-- ASSESSMENT MODAL ////////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="modal fade" id="assessmentModal" tabindex="-1" role="dialog" aria-labelledby="assessmentModal" aria-hidden="true" aria-describedby="request form for family or client assessment">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-dark" id="assessmentModal">Assessment Request Form</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div><!-- ./modal-header -->
        <div class="modal-body">
          <!-- FORM START ////////////////////////////////////////////////////////////////////////////////////// -->
          <form id="needs-validation" name="assessForm" method="post" role="form" action="forms/contact.php" novalidate>
            <div class="messages"></div>
            <fieldset>
              <legend><h6 class="text-primary">*Please fill out all applicable fields below to the best of your ability.</h6></legend>
              <hr>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label class="text-primary" for="fName">Full Name</label>
                  <input type="name" class="form-control" id="fName" placeholder="Jane Doe" aria-describedby="fNameHelp" name="fName" required>
                  <small id="fNameHelp" class="form-text text-muted">Please enter the name of client if you are inquiring for someone else.</small>
                  <div class="invalid-feedback">Please provide full name.</div>
                </div><!-- ./form-group -->
                <div class="form-group col-lg-6">
                  <label class="text-primary" for="fPhone">Phone Number</label>
                  <input name="fPhone" type="tel" class="form-control" id="fPhone" aria-describedby="fPhoneHelp" placeholder="(902) 111-1111" required>
                  <small id="fPhoneHelp" class="form-text text-muted">Please enter client phone number with area code.</small>
                  <div class="invalid-feedback">Please provide a valid phone number.</div>
                </div><!-- ./form-group -->
              </div><!-- ./form-row -->
              <div class="form-group">
                <label class="text-primary" for="fAddress">Address</label>
                <input type="text" name="fAddress" class="form-control" id="fAddress" aria-describedby="fAddressHelp" placeholder="1 Example Street, Kentville, NS, B1B1B1" required>
                <small id="fAddressHelp" class="form-text text-muted">Please enter full address of client with postal code.</small>
                <div class="invalid-feedback">Please provide a valid address.</div>
              </div>
              <div class="form-group">
                <label class="text-primary" for="fDiagnosis">Diagnosis</label>
                <input type="text" name="fDiagnosis" class="form-control" id="fDiagnosis" aria-describedby="fDiagnosisHelp" placeholder="i.e. Diabetes.">
                <small id="fDiagnosisHelp" class="form-text text-muted">Please enter any diagnosis the client has.</small>
              </div>
              <div class="form-group">
                <label class="text-primary" for="fMobility">Mobility Challenges</label>
                <input type="text" name="fMobility" class="form-control" id="fMobility" aria-describedby="fMobilityHelp" placeholder="i.e. Client uses wheelchair.">
                <small id="fMobilityHelp" class="form-text text-muted">Please enter any mobility challenges the client has.</small>
              </div>
              <hr>
              <hr>
              <label class="text-primary">Would you like an information package mailed to you?</label>
              <div class="form-row">
                <div class="form-group col-lg-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="fRadios" id="fRadios1" value="Yes" checked>Yes
                    </label>
                  </div><!-- ./form-check -->
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="fRadios" id="fRadios2" value="No">No
                    </label>
                  </div><!-- form-check -->
                </div><!-- ./form-group -->
                <div class="form-group col-lg-10">
                  <label for="fAddress2">Address</label>
                  <input type="text" name="fAddress2" class="form-control" id="fAddress2" aria-describedby="fAddressHelp2" placeholder="1 Example Street, Kentville, NS, B1B1B1">
                  <small id="fAddressHelp2" class="form-text text-muted">Please enter full address with postal code for your info package</small>
                </div>
              </div><!-- ./form-row -->
              <label class="text-primary">Would you like an information package emailed to you?</label>
              <div class="form-row">
                <div class="form-group col-lg-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="ffRadios" id="ffRadios1" value="Yes" checked>Yes
                    </label>
                  </div><!-- ./form-check -->
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="ffRadios" id="ffRadios2" value="No">No
                    </label>
                  </div><!-- form-check -->
                </div><!-- ./form-group -->
                <div class="form-group col-lg-10">
                  <label for="fEmail">Email</label>
                  <input type="email" class="form-control" id="fEmail" placeholder="janedoe@exampleemail.ca" aria-describedby="fEmailHelp" name="fEmail">
                  <small id="fEmailHelp" class="form-text text-muted">Please enter your email for your info package.</small>
                </div><!-- ./form-group -->
              </div><!-- ./form-row -->
              <label class="text-primary">Would you like a phone call regarding services and free in-home needs assessment?</label>
              <div class="form-row">
                <div class="form-group col-lg-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="fffRadios" id="fffRadios1" value="Yes" checked>Yes
                    </label>
                  </div><!-- ./form-check -->
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="fffRadios" id="fffRadios2" value="No">No
                    </label>
                  </div><!-- form-check -->
                </div><!-- ./form-group -->
                <div class="form-group col-lg-10">
                  <label for="ffPhone">Phone Number</label>
                  <input name="ffPhone" type="tel" class="form-control" id="ffPhone" aria-describedby="ffPhoneHelp" placeholder="(902) 111-1111">
                  <small id="ffPhoneHelp" class="form-text text-muted">Please enter phone number with area code.</small>
                </div><!-- ./form-group -->
              </div><!-- ./form-row -->
              <hr>
              <hr>
              <h4 class="text-dark">Inquiry Made By</h4>
              <hr>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label class="text-primary" for="ffName">Full Name</label>
                  <input type="name" class="form-control" id="ffName" placeholder="Jane Doe" aria-describedby="ffNameHelp" name="ffName">
                  <small id="ffNameHelp" class="form-text text-muted">Please enter your full name. Leave blank if same as above.</small>
                </div><!-- ./form-group -->
                <div class="form-group col-lg-6">
                  <label class="text-primary" for="fDate">Date</label>
                  <input type="text" class="form-control" id="fDate" placeholder="DD/MM/YYYY" aria-describedby="fDateHelp" name="fDate">
                  <small id="fDateHelp" class="form-text text-muted">Please enter today's date (DD/MM/YYYY).</small>
                </div><!-- ./form-group -->
              </div><!-- ./form-row -->
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label class="text-primary" for="fffPhone">Phone Number</label>
                  <input name="fffPhone" type="tel" class="form-control" id="fffPhone" aria-describedby="fffPhoneHelp" placeholder="(902) 111-1111">
                  <small id="fffPhoneHelp" class="form-text text-muted">Please enter your phone number with area code. Leave blank if same as above.</small>
                </div><!-- ./form-group -->
                <div class="form-group col-lg-6">
                  <label class="text-primary" for="fRelation">Relationship to Client</label>
                  <input name="fRelation" type="text" class="form-control" id="fRelation" aria-describedby="fRelationHelp" placeholder="i.e. Son">
                  <small id="fRelationHelp" class="form-text text-muted">Please enter your relationship to the client. Leave blank if you are the client.</small>
                </div><!-- ./form-group -->
              </div><!-- ./form-row -->
              <hr>
              <hr>
              <h4 class="text-dark">Service Inquiries:</h4>
              <small class="text-muted">What type(s) of services does the client require/want?</small>
              <hr>
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" name="fCheckbox1" id="fCheckbox1">Housekeeping
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" name="fCheckbox2" id="fCheckbox2">Meal Preparation
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" name="fCheckbox3" id="fCheckbox3">Personal Care
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" name="fCheckbox4" id="fCheckbox4">Errands/Appointments
                    <small>(accompany to)</small>
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" name="fCheckbox5" id="fCheckbox5">Other
                  </label>
                </div>
              </div><!-- ./form-group -->
              <div class="form-group">
                <textarea name="fComments" class="form-control" id="fComments" rows="3" placeholder="Please enter other service requirements here."></textarea>
              </div><!-- ./form-group -->
              <button name="fSubmit" type="submit" class="btn btn-info btn-block" value="Submit">Submit</button>
            </fieldset>
          </form>

          <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';

              window.addEventListener('load', function() {
                var form = document.getElementById('needs-validation');
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              }, false);
            })();
            </script>

        </div><!-- ./modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div><!-- ./modal-footer -->
      </div><!-- ./modal-content -->
    </div><!-- ./modal-dialog -->
  </div><!-- ./modal -->

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
