<?php
if(isset($_POST["submit"])){
	//γίνεται η σύνδεση στον server
	$servername = "localhost"; //τα στοιχεία του server
	$username = "root";
	$password = "";
	$dbname = "personal";

	// Δημιουργία σύνδεσης
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Έλεγχος σύνδεσης
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//ορισμός charset της σύνδεσης ώστε να παρουσιάζονται τα ελληνικά σωστά
	mysqli_set_charset($conn, "utf8");
	
	
	//παίρνουμε τα δεδομένα από την φόρμα
	$username = $_POST['username'];
	$userpassword = $_POST['userpassword'];
	//ελέγχει αν το Username και το password αντιστοιχεί σε κάποιον χρήστη
	$sql = "SELECT username, userpassword FROM `users` WHERE username = '".$username."' AND userpassword = '".$userpassword."'";
	//$sql λειτουργεί
	$result = mysqli_query($conn, $sql);
	if($result !== false){
		session_start();
		//Δεν πρόλαβα να υλοποιήσω το login μέρος του συνδερίου.
		header ("location: 3_calendar.html?connectionsuccessful");
		exit();
	}else {
		header("location: 6_login.html?error='προσπάθησε ξανά'");
		exit();
	}
}?>