<?php
	include('php/databases/connection.php');

	if( isset( $_POST["post_submit"] ) ){

		//fxn which validates the data
		function validateFormData( $formData ){

			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;

		}

		//check to see if inputs are empty
		//create variables with form data
		//wrap data with our fxn

		$rsvp = $attend = $name = $email = $guest = $extras = "";

		if( !$_POST["formrsvp"] ){
			$formrsvpErr = "Please select yes or no <br>";
		}else{
			$rsvp = validateFormData( $_POST["formrsvp"] );
		}

		if( !$_POST["formattend"] ){
			$formattendErr = "Please select yes or no <br>";
		}else{
			$attend = validateFormData( $_POST["formattend"] );
		}

		if( !$_POST["formfullname"] ){
			$formnameErr = "Please enter your full name <br>";
		}else{
			$name = validateFormData( $_POST["formfullname"] );
		}

		if( !$_POST["formemail"] ){
			$formemailErr = "Please enter your email address <br>";
		}else{
			$email = validateFormData( $_POST["formemail"] );
		}

		if( !$_POST["formguestnames"] ){
			$formguestErr = "Please enter the name of all guests in your party as per invitation <br>";
		}else{
			$guest = validateFormData( $_POST["formguestnames"] );
		}

		if( !$_POST["formextras"] ){
			$formextrasErr = "Please specify if you have any specific requests or not <br>";
		}else{
			$extras = validateFormData( $_POST["formextras"] );
		}

		//check if any of the above fields are empty, then insert query
		if( $rsvp && $attend && $name && $email && $guest ){

			//when above verified enter data into database
			$query = "INSERT INTO users (id, formrsvp, formattend, formfullname, formemail, formguestnames, formextras, submit_date) VALUES (NULL, '$rsvp', '$attend', '$name', '$email', '$guest', '$extras', CURRENT_TIMESTAMP)";
			//errors and message output
			if( mysqli_query( $conn, $query ) ){

				echo 	"<div style='margin:0;font-size:2em;' class='text-center alert alert-warning alert-dismissible fade in' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span style='font-size:2em;' aria-hidden='true'>x</span>
							</button>
							Thank you for your RSVP. We look forward to breaking it down with you on the dance floor!
						</div>";

			}else{
				echo "Error: ". $query . "<br>" . mysqli_error($conn);
			}

		}

	}
	mysqli_close($conn);
?>
