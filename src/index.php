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
	<link rel="icon" type="image/png" sizes="17x16" href="assets/img/favicon-17x16.png">
	<link rel="icon" type="image/png" sizes="34x32" href="assets/img/favicon-34x32.png">
	<link rel="icon" type="image/png" sizes="102x96" href="assets/img/favicon-102x96.png">

	<!-- GOOGLE+ & SCHEMA.ORG META -->
	<meta itemprop="name" content="Careforce">
	<meta itemprop="description" content="Careforce is a home health care agency, serving clients and their families from Windsor to Bridgetown, Nova Scotia.">
	<meta itemprop="image" content="https://careforce.ca/assets/img/carousel-1.jpg">

	<!-- BOOTSTRAP 4 STYLESHEETS & CUSTOM - before all other stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.min.css">
	<!-- Google Material Icons & MFB & MODERNIZR-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/mfb.min.css">
	<script src="js/modernizr.touch.js"></script>
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- Slick carousel -->
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" integrity="sha256-j+P6EZJVrbXgwSR5Mx+eCS6FvP9Wq27MBRC/ogVriY0=" crossorigin="anonymous" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target="#scroller">

<!-- NAVIGATION //////////////////////////////////////////////////////////////////////////////////////////////// -->

	<nav class="navbar navbar-expand-md main-nav navbar-light bg-light fixed-top" id="scroller">
		<a href="#page-top" class="navbar-brand">
			<img src="assets/img/brand-logo-trans-2.svg" alt="company logo" width="150" height="50">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="mainNav">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="#about">About Careforce</a>
				<a class="nav-item nav-link" href="php/services.php">Our Services</a>
				<a class="nav-item nav-link" href="php/veterans.php">Veterans</a>
				<a class="nav-item nav-link" href="php/team.php">Our Caregivers</a>
				<a class="nav-item nav-link" href="#contact">Contact Us</a>
				<a class="nav-item nav-link" href="php/resources.php">Resources</a>
				<!--<a class="nav-item nav-link" href="#">Events</a>-->
				<a class="nav-item nav-link" href="php/faqs.php">FAQs</a>
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

  <div class="header text-light hero-img-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
          <div class="text-center" style="padding-top:150px;">
            <img src="../assets/img/brand-logo-trans-2.svg" width="90%" height="40%" alt="company logo">
            <p class="text-dark">helping valley residents live comfortably &amp; safely at home for over 25 years</p>
          </div>
        </div>
        <div class="col-lg-2">
        </div>
      </div>
    </div>
		<div class="apply text-center d-inline-flex p-2 justify-content-center align-items-center">
			<p class="text-muted m-0 pr-2">Call <a href="tel:+18669661466">1&#45;866&#45;966&#45;1466</a> for a free consultation OR </p>
      <!-- Button trigger modal -->
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#assessmentModal">Request an Assessment</button>
		</div>
	</div>

<!-- ABOUT SECTION ///////////////////////////////////////////////////////////////////////////////////////////// -->

	<section id="about">
		<div class="container">
			<div class="text-center title">
				<h1>About Us</h1>
				<hr class="style15">
				<p>Careforce is a home health care agency, serving clients and their families from Windsor to Bridgetown, Nova Scotia. We are an approved provider for Veterans Affairs Canada, the Workers' Compensation Board, and most insurance companies.</p>
			</div>
		</div>
		<div class="container">
			<ul class="nav nav-pills mb-3 text nav-justified" id="pills-tab" role="tablist">
				<li class="nav-item">
  				<a class="nav-link active" id="pills-story-tab" data-toggle="pill" href="#pills-story" role="tab" aria-controls="pills-story" aria-expanded="true">Our Story</a>
				</li>
				<li class="nav-item">
  				<a class="nav-link" id="pills-vision-tab" data-toggle="pill" href="#pills-vision" role="tab" aria-controls="pills-vision" aria-expanded="true">Our Vision &amp; Our Mission</a>
				</li>
				<li class="nav-item">
  				<a class="nav-link" id="pills-values-tab" data-toggle="pill" href="#pills-values" role="tab" aria-controls="pills-values" aria-expanded="true">Our Values &amp; Beliefs</a>
				</li>
				<li class="nav-item">
  				<a class="nav-link" id="pills-coop-tab" data-toggle="pill" href="#pills-coop" role="tab" aria-controls="pills-coop" aria-expanded="true">The 7 Co&#45;Op Principles</a>
				</li>
				<li class="nav-item">
  				<a class="nav-link" id="pills-why-tab" data-toggle="pill" href="#pills-why" role="tab" aria-controls="pills-why" aria-expanded="true">Why Choose Careforce</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-story" role="tabpanel" aria-labelledby="pills-story-tab">
					<p>Careforce has been operating in the Annapolis Valley since 1990, and has grown from a small private company into the thriving worker cooperative our clients know today. In 2006, Careforce's owner/operator decided it was time to move on from the business. Although there were many possibilities, a group of motivated employees (including caregivers, administrative, and nursing staff) banded together, pooled their resources and decided to try and buy the business. Nearly two years later, with assistance from the Canadian Worker Cooperative Federation and iNova Credit Union, the Careforce Home Care Worker Cooperative was born.</p>
					<p>What does that mean? It means that Careforce isn't owned by a single person, or even a small partnership of people. Instead, it is owned and operated by a large (and growing) group of employees. In fact, many of the caregivers our clients see in their homes every day are not just employees, but also owners of the business. They help make key management decisions, share in the profit of the business, and ensure we enjoy success together. The quality of service our clients have come to appreciate happens - in large part - because our employees have a direct stake in our success. Pretty cool story, huh?</p>
					<p>Since becoming a worker cooperative, Careforce has continued to be recognized and has played a growing role in the community. We are proud to have received the Eastern Kings Chamber of Commerce Outstanding New Business Award in 2010, and the Annapolis Valley Chamber of Commerce's 'Best in Kings' award in 2014. We are proud to be members in good standing with the Better Business Bureau, and we now have an office in Kentville.</p>
				</div>
				<div class="tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="pills-vision-tab">
					<h5>Our Vision&#58;</h5>
					<p>A community where every person has the opportunity, means, and support to live comfortably and safely for as long as possible.</p>
					<h5>Our Mission&#58;</h5>
					<p>To empower people to live comfortably and safely through our team of compassionate and skillful caregivers. These caregivers will provide physical, social, emotional, and spiritual support to both clients and their families, and will continuously strive to enhance the client's quality of life.</p>
				</div>
				<div class="tab-pane fade" id="pills-values" role="tabpanel" aria-labelledby="pills-values">
					<ul>
						<li>We value - above all else - the safety of our clients and caregivers. A safety-first mentality is a must at all times.</li>
						<li>We value personalized care because we know every person has unique needs. Every single care plan is different.</li>
						<li>We value the role that family caregivers and other health practitioners play in a client's care, and consistently try to include them in the care process.</li>
						<li>We value every individual's right to full privacy and confidentiality at all times.</li>
						<li>We believe everyone - no matter where they reside - deserves the opportunity to live with dignity and respect for as long as possible.</li>
						<li>We believe in person-centered care, not task-centered care; completing tasks is important but caring for the whole person is paramount.</li>
						<li>We believe that seniors are an asset to our community and to our economy; not a liability.</li>
						<li>We believe people are at their happiest and healthiest at home (and research agrees).</li>
						<li>We believe that people of all ages and abilities can benefit from compassionate care.</li>
					</ul>
				</div>
				<div class="tab-pane fade" id="pills-coop" role="tabpanel" aria-labelledby="pills-coop">
					<h5>As a Cooperative, we also strive to live by the 7 Cooperative Principles&#58;</h5>
					<ol>
						<li>Voluntary and Open Membership</li>
						<li>Democratic Member Control</li>
						<li>Members' Economic Participation</li>
						<li>Autonomy and Independence</li>
						<li>Education, Training, and Information</li>
						<li>Cooperation Among Cooperatives</li>
						<li>Concern for Community</li>
					</ol>
				</div>
				<div class="tab-pane fade show" id="pills-why" role="tabpanel" aria-labelledby="pills-why-tab">
					<h5>At Careforce, we work hard to earn your business. Here are just a few of the many reasons to choose Careforce.</h5>
					<ol>
						<li><span class="font-weight-bold">We are person focused&#44; not task focused.</span> Our caregivers aren&#39;t just concerned about getting tasks done &#40;although they're great at that too&#41;&#59; they care about making you feel special.</li>
						<li><span class="font-weight-bold">All of our caregivers are supervised by a Nurse.</span> You can be sure you are in good hands with Careforce's caregivers, who are also carefully screened and well trained. Having a Nurse on your side gives you extra confidence and peace of mind.</li>
						<li><span class="font-weight-bold">A small, consistent team of caregivers focused on your needs.</span> while some home care agencies send a different caregiver to their clients each day, Careforce understands that you want consistency. You can expect to work with a small, devoted team of caregivers that will get to know your needs and deliver consistent results.</li>
						<li><span class="font-weight-bold">We are responsive.</span> If you choose Careforce, you will have a caregiver who is right for you in your home quickly (usually within 48 hours or sooner).</li>
						<li><span class="font-weight-bold">No long-term contracts, ever.</span> Careforce believes you should never have to pay for care you don't need. If you ever wish to cancel or postpone service, all you have to do is say so.</li>
						<li><span class="font-weight-bold">We are local.</span> We care about our community because we all live here. You can always speak with somebody local - 24 hours a day, 7 days a week - when you call Careforce. No automated phone commands! We have an office in Kentville to serve you.</li>
						<li><span class="font-weight-bold">Our workers are also owners.</span> Because many of our caregivers also own the company, they are more heavily invested in providing you with a perfect experience.</li>
						<li><span class="font-weight-bold">We offer the most flexible shifts in the Annapolis Valley.</span> You need care when YOU need it, not when it's convenient for your caregiver.</li>
					</ol>
					<p>We've helped hundreds of Valley residents with our expertise, compassion and personalized care and we'd be pleased to help you.</p>
					<a href="assets/docs/Resource-Careforce-How to Choose a Homecare Agency.pdf" role="button" class="btn btn-info btn-block" target="_blank">Click here to learn how to choose the right care provider</a>
				</div>
			</div>
		</div>
	</section>

<!-- TESTIMONIALS SECTION ////////////////////////////////////////////////////////////////////////////////////// -->

	<section id="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<blockquote class="blockquote">
						<p>Thank you for your excellent care &amp; kindness for our dad over the last few months.</p>
						<footer class="blockquote-footer">Carefore client&#39;s family &#45; <cite title="Source Title">The M Family</cite></footer>
					</blockquote>
				</div>
				<div class="col-lg-3 lg-only">
					<blockquote class="blockquote">
						<p>My mom seems to be doing well &amp; I think the staff&#39;s daily presence is making a big difference. Thanks.</p>
						<footer class="blockquote-footer">Carefore client&#39;s family member &#45; <cite title="Source Title">M.L.</cite></footer>
					</blockquote>
				</div>
				<div class="col-lg-3 lg-only">
					<blockquote class="blockquote">
						<p>All the staff care so much for my mother. They are a great team. we couldn&#39;t have managed without them.</p>
						<footer class="blockquote-footer">Carefore client&#39;s family member &#45; <cite title="Source Title">B.S.</cite></footer>
					</blockquote>
				</div>
				<div class="col-lg-3 lg-only">
					<blockquote class="blockquote">
						<p>Beth is courteous and very knowledgeable... I like someone who is pleasant to have around. I couldn&#39;t do without her.</p>
						<footer class="blockquote-footer">Careforce client &#45; <cite title="Source Title">E.J.L.</cite></footer>
					</blockquote>
				</div>
			</div>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#testimonialModal">A Written Letter to Careforce</button>
		</div>
	</section>

<!-- FOOTER //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

	<section id="contact" class="footer">
		<footer>
			<div>
  				<iframe width="100%" height="250" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=6%20webster%20court&key=AIzaSyAqCUj4KiU7VyBtMSaQibCMsaweePqYpKU" allowfullscreen></iframe>
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
						<a href="https://www.elysianwebdesign.com" target="_blank"><img class="align-self-center" src="assets/img/logo-wh.svg" alt="Elysian Web Design Logo" width="25"></a>
					</div>
					<div class="col-lg-12 d-flex align-items-center justify-content-center">
						<img src="assets/img/BROCHURE - BBB logo.png" alt="" class="img-fluid p-2" width="10%">
						<img src="assets/img/image002.png" alt="" class="img-fluid p-2" width="10%">
						<img src="assets/img/Careforce button RGB full colour png.png" alt="" class="img-fluid p-2" width="10%">
						<img src="assets/img/HCCFC-logo.jpg" alt="" class="img-fluid p-2" width="10%">
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
          <form id="needs-validation" name="assessForm" method="post" role="form" action="php/forms/contact.php" novalidate>
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

<!-- TESTIMONIAL MODAL ///////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModal" aria-hidden="true" aria-describedby="a testimonial by a careforce client's family">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testimonialModal">The following is a letter Careforce received from one of our many satisfied clients</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  				<p>Dear Careforce Staff,</p>
  				<p>You definitely chose the correct company name. The entire staff truly cares very deeply about the client’s overall health and happiness. The team goes to great lengths to provide stress-free, thoughtful and compassionate care. Your team (and you truly do work as such), is a real force for other care providers to use as a role model.</p>
  				<p>As of July 2014 we’ll be clients of Careforce for one year. All has been perfect in every way in dealing with the staff of Careforce. The gals who come to our home to help out are truly fantastic. We’ve grown very accustomed to “our gals” and they are very much like old friends. It’s a complete pleasure to talk to and spend time with all the Careforce Team.</p>
  				<p>Everyone from Careforce arrives at least 10 minutes prior to a scheduled shift without a hitch. They all come through the door with a sincerely cheery greeting and a happy face. They are ready to do whatever we need done, including taking us out in our car for a drive or shopping etc. Careforce staff are fantastic at keeping the number of gals who come to a clients home to a minimum. That is great as it creates a more personal feeling for the client and promotes continuity of care. </p>
  				<p>The detailed charting and oral communication among Careforce staff is excellent. It reminds me of nursing of years ago, in a very good way. The staff always has current information on a client’s health, medication and results of doctors appointments, etc. That enables the staff to give the correct care always. </p>
  				<p>“Our gal” Theresa has been with us twice a week for nearly one year. What a great all around caregiver, she’s always observant, anticipates when assistance is required, is so pleasant and knowledgeable of health care etc. Theresa quickly made us feel like she is family. Last summer she even brought us treats from her garden! We are totally pleased Theresa is in our life.</p>
  				<p>To relate all the wonderful things the gals from Careforce do for us would cause writer’s cramp. It’s always a pleasure to talk with Tracey in scheduling about any request we’ve had. Tracey’s reply is always, “no problem, give me a little while and I’ll get right back to you with a solution.” That’s exactly what she does, usually in a few minutes she phones with a perfect solution. I feel Tracey’s not happy until the clients are totally happy! To do a challenging scheduling job with such grace, and so very pleasantly takes a very special lady. Bravo Tracey</p>
  				<p>Gerry and I consider Careforce a huge blessing and a fantastic support system in our life. Keep up the fantastic work Careforce team. In the years ahead continue to bring peace of mind and excellent care to your clients.</p>
  				<p>Our very best wishes and sincere thanks to all the Careforce team.</p>
  				<p>Sincerely,</p>
  				<p>G. and L. Gallant</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- BOOTSTRAP 4 JS & JQUERY - jquery and popper first ///////////////////////////////////////////////////////////////// -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
<!-- SLICK CAROUSEL //////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<script src="js/slick.js"></script>
<!-- MFB JS //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<script src="js/mfb.min.js"></script>
<!-- GSAP JS /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenLite.min.js" integrity="sha256-urKHuZ772q9CZZjbN5geWh0ObNvIL4INeQTSQkZC2/M=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TimelineLite.min.js" integrity="sha256-C4E1OAB7XxX0S7evnj9fNvU/+C2L2hzXwq861HQTVAA=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/plugins/CSSPlugin.min.js" integrity="sha256-DVfSynPZfzB2Mca3EebIt2UJmcQfeWPtUe0+Tghv4cc=" crossorigin="anonymous"></script>
<!-- CUSTOM JS ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<script src="js/custom.js"></script>

</body>
</html>
