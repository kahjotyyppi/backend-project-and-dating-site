<?php
// En funktion som tar bort whitespace med trim,
// backslashes (escape char), och konverterar
// eventuella skadliga html tecken som < eller > till deras html represetantationer
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername ="localhost";
$dbname = "kindstep";
$username = "kindstep";
include "hemlis.php"
?>