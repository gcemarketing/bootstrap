<?php
require_once 'mandrill-api-php/src/Mandrill.php';


// Connect to database
$con = mysqli_connect("localhost","root","root","webleads");

// Get all email addresses that don't have an email address and a have only been submitted once.
$selectQry = "SELECT * FROM webtoleads"; 

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

echo "<pre>";

print_r($dataArray);

echo "</pre>";

$to = array();

foreach ($dataArray as $i) {
	$to[] = array(
		'email' =>  $i["email"],
		'name' => $i["name"],
		'type' => 'to'
		);
}

echo "<pre>";

print_r($to);

echo "</pre>";

// Need to loop through each row in the $dataArray and use it in the mandrill 'to' array

// try {
//     $mandrill = new Mandrill('insertAPIkey');
//     $message = array(
//         'html' => '<p>Example HTML content</p>',
//         'text' => 'Example text content',
//         'subject' => 'example subject',
//         'from_email' => 'test@test.com',
//         'from_name' => 'Example Name',
//         'to' => array(
//             array(
//                 'email' => 'test@test.com',
//                 'name' => 'Gary',
//                 'type' => 'to'
//             )
//         ),
//         'headers' => array('Reply-To' => 'test@test.com'),
//         'important' => false
//         );
//     $result = $mandrill->messages->send($message);

//     print_r($result);

//     } catch(Mandrill_Error $e) {
//     // Mandrill errors are thrown as exceptions
//     echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
//     // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
//     throw $e;
// }

?>