<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */

// an email address that will be in the From field of the email.
$from = 'Assessment Request Form <info@careforce.ca>';

// an email address that will receive the email with the output of the form
$sendTo = 'Assessment Request Form <info@careforce.ca>';

// subject of the email
$subject = 'New Assessment Request';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('fName' => 'Client Name', 'fPhone' => 'Client Number', 'fAddress' => 'Client Address', 'fDiagnosis' => 'Client Diagnosis', 'fMobility' => 'Client Mobility Challenges', 'fRadios' => 'Info Package Mailed (Y/N)', 'fAddress2' => 'Mail Info Package to', 'ffRadios' => 'Info Package Emailed (Y/N)', 'fEmail' => 'Email Info Package to', 'fffRadios' => 'Call Regarding Services (Y/N)', 'ffPhone' => 'Number to Call', 'ffName' => 'Inquirer Name', 'fDate' => 'Inquiry Date', 'fffPhone' => 'Inquirer Phone', 'fRelation' => 'Relationship to Client', 'fCheckbox1' => 'Housekeeping', 'fCheckbox2' => 'Meal Preparation', 'fCheckbox3' => 'Personal Care', 'fCheckbox4' => 'Errands/Appointments', 'fCheckbox5' => 'Other', 'fComments' => 'Other Services Required');

// message that will be displayed when everything is OK :)
$okMessage = 'Assessment request successfully submitted. Thank you, Careforce will get back to you soon!'.'<br /><br />'.'<a href="https://www.careforce.ca">'.'Back to Careforce.ca'.'</a>';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');

    $emailText = "You have a new message from the website assessment request form\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // All the neccessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );

    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));
		//mail('contact@elysianwebdesign.com', $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
