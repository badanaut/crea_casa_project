<?php

include 'db.php';
$lastname = test_input($_POST[lastname]);
$firstname = test_input($_POST[firstname]);
$email = test_input($_POST[email]);
$message = test_input($_POST[message]);
$nota = test_input($_POST[nota]);



$sql = "INSERT INTO reviews_table (Nume, Prenume, Email, Mesaj, Nota) 

VALUES ('".mysqli_real_escape_string($conn, $lastname)."',
		'".mysqli_real_escape_string($conn, $firstname)."',
		'".mysqli_real_escape_string($conn, $email)."',
		'".mysqli_real_escape_string($conn, $message)."',
		'".mysqli_real_escape_string($conn, $nota)."')"; 

if (!mysqli_query($conn, $sql))
  {

  die('Error: '. mysql_error());



  }
mysqli_close($conn);



header('Location: http://localhost/crea_casa_project/reviews.php');

exit;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>