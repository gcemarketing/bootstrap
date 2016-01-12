<?php


$cookievalRaw = $_COOKIE["TestCookie"];
$cookieval = json_decode($_COOKIE["TestCookie"],true);

echo "<strong>Prints TestCookie Array:</strong>";
echo "<br />";
print_r($cookievalRaw);
echo "<br />";
echo "<br />";

echo "<strong>Prints TestCookie Array:</strong>";
echo "<br />";
print_r($cookieval);
echo "<br />";
echo "<br />";

echo "<strong>Echo all key value pairs in TestCookie:</strong>";
echo "<br />";
echo "TestCookie contains:";
echo "<br />";
foreach ($cookieval as $key => $value) {
	echo "Key = " . $key . ", Value = " . $value . ". <br />";
}
echo "<br />";

?>