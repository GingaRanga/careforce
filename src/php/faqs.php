<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact@elysianwebdesign.com";
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
				<a class="nav-item nav-link" href="team.php">Our Caregivers</a>
        <a class="nav-item nav-link" href="resources.php">Resources</a>
				<a class="nav-item nav-link" href="#contact">Contact Us</a>
				<!--<a class="nav-item nav-link" href="#">Events</a>-->
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
					<a href="#page-top" data-mfb-label="Back to top" class="mfb-component__button--child">
						<i class="mfb-component__child-icon material-icons">keyboard_arrow_up</i>
					</a>
				</li>
			</ul>
		</li>
	</ul>

<!-- HTML5 HERO CAROUSEL /////////////////////////////////////////////////////////////////////////////////////// -->

	<div class="header text-light">
		<div class="header-img-1">
			<div class="hero-text d-flex flex-column justify-content-center align-items-center">
				<img src="../assets/img/brand-logo-trans-2.svg" width="50%" height="40%" alt="company logo">
				<p class="text-dark">helping valley residents live comfortably &amp; safely at home for over 25 years</p>
			</div>
			<div class="apply text-center d-inline-flex p-2 justify-content-center align-items-center">
				<p class="text-muted m-0 pr-2">Call <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a> for a free consultaion</p>
				<!-- <a href="" class="btn btn-info">Apply Here</a> -->
			</div>
		</div>
	</div>

<!-- FAQS SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////// -->

	<section id="faqs" class="text-center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<h1>FAQs</h1>
					<hr class="style15 pb-5">
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<div class="row no-gutters">
				<div class="bg-info team-text-box d-flex">
					<div class="col-lg-6">
						<div class="box-wrap team-text-box bg-white p-2 m-2 text-left">
							<img src="../assets/img/13094357_965683940211742_3756470729012285577_n.jpg" alt="" class="img-fluid mb-3">
							<h5>What area do you cover&#63;</h5>
							<p>Careforce currently provides service in Nova Scotia's Annapolis Valley, from Windsor to Bridgetown. Our office is at 6 Webster Court&#44; Kentville&#44; NS&#44; B4N 1H2.</p>
							<hr>
							<h5>Who pays for my care&#63;</h5>
							<p>Many personal Insurance companies cover personal care. We are a registered provider with Blue Cross, Veterans' Affairs Canada, and the Workers' Compensation Board, and can direct bill for eligible individuals. Many other clients simply pay Careforce directly.</p>
							<hr>
							<h5>What are Careforce's rates/fees&#63;</h5>
							<p>Initial in-home consultations with a Nurse are always offered at no charge. Careforce's rates depend on a number of factors - to see all of our rates or to arrange your free consultation, please call or email us at&#58;<br>
								Regular Phone&#58; <a href="tel:+19023653155">&#40;902&#41; 365&#45;3155</a><br>
								Toll Free &#45; 24/7&#58; <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a><br>Email&#58;<a href="mailto:careforce@careforce.ca"> careforce@careforce.ca</a></p>
							<hr>
							<h5>How will I be billed?</h5>
							<p>You can choose between pre-authorized weekly payments, lump sum payments, or - in some cases - you may be invoiced bi-weekly. Please ask us for details.</p>
							<hr>
							<h5>How can I pay&#63;</h5>
							<p>Careforce currently accepts cash, cheque, and electronic funds transfers. Please contact us to discuss these options.</p>
							<hr>
							<h5>How soon can you be here&#63;</h5>
							<p>Our goal is to meet your care needs whenever they might occur. To ensure your needs are met, an initial nursing assessment is completed by our Nurse. Service can begin shortly thereafter, often the same day that you call.</p>
							<hr>
							<h5>I see that Careforce is a local worker cooperative. What does that mean&#63;</h5>
							<p>Careforce is proud to be a local (Annapolis Valley) business, hiring local caregivers. Being a worker cooperative means that our business is owned by its employees (which means they are more heavily invested in providing first class care for our clients). When you call Careforce, you always get a human on the other end, and you can also count on Careforce to support local events and charities.</p>
							<hr>
							<h5>What is the free in-home consultation like&#63;</h5>
							<p>When you call for a free in-home consultation, we will send our friendly Nurse to your home to meet with you (and any family members you may wish to have attend). To ensure the highest quality of personalized care, she will ask you some questions about your health and care preferences. This process normally takes 1-2 hours. You are under no obligation to choose Careforce during or after your in-home consultation; we will never pressure you.</p>
							<hr>
							<h5>How do you decide which caregiver&#40;s&#41; provide care for me&#63;</h5>
							<p>After meeting you during the in-home consultation, Careforce will review your needs and choose caregivers we believe are best suited to meet your health needs. We will also ensure we choose caregivers who are a good match for your personality and preferred lifestyle.</p>
							<hr>
							<h5>I am a concerned family member. Can I be included in the care process&#63;</h5>
							<p>Absolutely! Our experience has been that the more a client's family is involved in their care, the better. Our care team is always happy to sit down with a client's family members to discuss our approach, and how you can help ensure the best outcomes for your loved one.</p>
							<hr>
						</div><!-- ./box-wrap -->
					</div><!-- ./col-lg-6 -->
					<div class="col-lg-6">
						<div class="box-wrap team-text-box bg-white p-2 m-2 text-left">
							<h5 class="pt-4">What are the hours staff are available&#63;</h5>
							<p>Caregivers are available 24 hours a day, 7 days a week, 365 days a year. Statutory holidays are billed at 1.5 times our regular rate.</p>
							<hr>
							<h5>Do you prepare meals&#63;</h5>
							<p>Yes – we can accommodate specialty diets and personal taste preferences. We can assist with meal planning and advanced meal preparation.</p>
							<hr>
							<h5>Can you run errands for/with me&#63;</h5>
							<p>Yes – We will run errands for you or with you, including but not limited to; doctor, drug store, grocery store, bank, and hair appointments.</p>
							<hr>
							<h5>What about vehicles and mileage&#63;</h5>
							<p>Our staff are able to use your road-worthy vehicle or they may use their own. There is a mileage fee charged for the use of a caregiver's vehicle. There is never, however, any mileage fee charged for our caregivers to come to and from your home.</p>
							<hr>
							<h5>What about pets&#63;</h5>
							<p>We welcome pets that are well behaved.</p>
							<hr>
							<h5>What housekeeping do you do&#63;</h5>
							<p>We manage and maintain general cleanliness of the home.</p>
							<hr>
							<h5>How many caregivers will I see&#63;</h5>
							<p>It is important that you receive service from caregivers that you are familiar and comfortable with. Normally, we encourage a team of 3-7 caregivers depending on the number of care hours you require.</p>
							<hr>
							<h5>Do I have to enter into a long-term contract with Careforce&#63;</h5>
							<p>No. Careforce will never ask you to enter into a long-term contract. You are free to discontinue care whenever you choose without any penalty.</p>
							<hr>
							<h5>What kind of training do your caregivers have&#63;</h5>
							<p>Our caregivers are very carefully screened before they begin work with Careforce. They are fully insured and complete a successful criminal record and vulnerable sector check prior to being hired. All caregivers possess an up-to-date First Aid/CPR certification, and effective January 1, 2015, all caregivers will possess valid WHMIS and Food Handler's certificates. Many of our caregivers possess the CCA designation, and others have comparable experience. Many have completed the Alzheimer's Disease and Other Dementias Care Course and the Palliative Care Frontline Education course. We will always match you with a caregiver who is trained to meet your needs. Our caregivers also receive regular in-service training to continue building their caregiving skills.</p>
							<hr>
							<h5>You say that Careforce is &#39;person-focused&#39; and not &#39;task-focused&#39;. What do you mean by that&#63;</h5>
							<p>When you choose Careforce, you can count on a caregiver who is focused not only on completing tasks (i.e. cleaning, cooking, etc), but who also shows care for you as a person. Our clients love the holistic experience they receive from us.</p>
							<hr>
							<h5>Are you government funded&#63;</h5>
							<p>No. Careforce is a private worker-owned cooperative, and is not funded by any public health agency. However, we do aim to work closely with any other professionals who may be providing care for you, and our ultimate aim is to improve your quality of life. Often Careforce is chosen as a top-up provider for individuals who feel their home care needs are not fully met by publicly funded care services.</p>
							<hr>
							<h5>Tell me about your client confidentiality and privacy policy.</h5>
							<p>We could print our entire policy here, but it would take far too much space. Careforce goes to great lengths to protect the privacy and confidentiality of all our clients. Although we share information between our staff members so that we can provide the best possible care for our clients, we never share any information with people who do not need to know it.</p>
							<img src="../assets/img/arm-shoulder.png" alt="" class="img-fluid pt-5">
						</div><!-- ./box-wrap -->
					</div><!-- ./col-lg-6 -->
				</div><!-- ./bg-info -->
			</div><!-- ./row -->
		</div><!-- ./container -->
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
