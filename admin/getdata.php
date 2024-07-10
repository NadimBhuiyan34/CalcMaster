<?php


$queryString = $_SERVER['QUERY_STRING']; // Get the query string from the URL

// Decode the URL-encoded value
$decodedValue = urldecode($queryString);

// Now you can use the $decodedValue variable, which contains the decoded value
echo "Decoded Value: $decodedValue";




?>