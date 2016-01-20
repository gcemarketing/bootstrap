<?php
require_once 'mandrill-api-php/src/Mandrill.php';


// Connect to database
$con = mysqli_connect("localhost","root","root","webleads");

// Get all email addresses that don't have an email address and a have only been submitted once.
$selectQry = "SELECT * FROM webtoleads WHERE submitted >= 5"; 

$data = mysqli_query($con, $selectQry);

$dataArray = array();

while($row = mysqli_fetch_assoc($data)) {
 
 	$dataArray[] = array(
 		'id' => $row['id'],
 		'email' => $row['email'],
 		'name' => $row['name'],
 		'submitted' => $row['submitted']
 	 );

}


$to = array();
$mergevars = array();

foreach ($dataArray as $i) {
	$to[] = array(
		'email' =>  $i["email"],
		'name' => $i["name"],
		'type' => 'to'
		);
	$mergevars[] = array(
                'rcpt' => $i["email"],
                'vars' => array(
                    array(
                        'name' => 'NAME',
                        'content' => $i["name"]
                    ),
                    array(
                        'name' => 'SUBMITTED',
                        'content' => $i["submitted"]
                    )
                )
            );
}

$mandrillHTML = '<p>Dear *|HTML:NAME|*</p>
				 <p>Your number of submitted is *|HTML:SUBMITTED|*</p>';

try {
    $mandrill = new Mandrill('api key');
    $message = array(
        'html' => $mandrillHTML,
        'text' => 'Example text content',
        'subject' => 'Message from Mandrill',
        'from_email' => 'email address',
        'from_name' => 'from name',
        'to' => $to,
        'headers' => array('Reply-To' => 'reply address'),
        'important' => false,
        'merge_vars' => $mergevars
        );
    $result = $mandrill->messages->send($message);

    print_r($result);

    } catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}

?>