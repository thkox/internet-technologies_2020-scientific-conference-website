<?php
//έλεγχος ότι ο χρήστης δεν βρέθηκε σε αυτή την σελίδα καταλάθος, ελέγχοντας ότι η προηγούμενη σελίδα είχε το 'submit'
if (isset($_POST["submit"])){
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
	
	
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$telephone = $_POST["telephone"];
	$username = $_POST["username"];
	$userpassword = $_POST["userpassword"];
	$newsletter = $_POST["newsletter"];
	$userpasswordrepeat = $_POST["userpasswordrepeat"];
	
	
	//σε περίπτωση που στείλει άδειο πεδίο
	function emptyInputSignup($firstname, $lastname, $address, $email, $telephone, $username, $userpassword, $newsletter) {
		$result;
		if(empty($firstname) || empty($lastname) || empty($address) || empty($email) || empty($telephone) || empty($username) || empty($userpassword)){
			$result = true;
		}else {
			$result = false;
		}
		return $result;
	}
	//ελέγχει ότι τα password είναι ίδια
	function matchPassword($userpassword, $userpasswordrepeat) {
		$result;
		if($userpassword !== $userpasswordrepeat){
			$result = true;
		}
		else {
			$result = false;
		}
		return $result;
	}
	//1ος έλεγχος
	if(emptyInputSignup($firstname, $lastname, $address, $email, $telephone, $username, $userpassword, $newsletter) !== false) {
		header('location: 7_signup.html?error=emptyinput');
		exit();
	}
	//2ος έλεγχος
	if(matchPassword($userpassword, $userpasswordrepeat) !==false) {
		header('location: 7_signup.html?error=passworddoesntmatch');
		exit();
	}
	
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
	
	//αν δεν θέλει email τότε τοποθετούμε το no
		if(empty($newsletter)){
			//Δημιουργία ερωτήματος
			$sql = "INSERT INTO `users`(`firstname`, `lastname`, `address`, `email`, `telephone`, `username`, `userpassword`, `newsletter`) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['address']."','".$_POST['email']."','".$_POST['telephone']."','".$_POST['username']."','".$_POST['userpassword']."','Νο'); ";//εκτέλεση ερωτήματος στη βάση
		}else{
			//Δημιουργία ερωτήματος
			$sql = "INSERT INTO `users`(`firstname`, `lastname`, `address`, `email`, `telephone`, `username`, `userpassword`, `newsletter`) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['address']."','".$_POST['email']."','".$_POST['telephone']."','".$_POST['username']."','".$_POST['userpassword']."','".$_POST['newsletter']."'); ";//εκτέλεση ερωτήματος στη βάση

		}

	$result = mysqli_query($conn, $sql);
	//έλεγχος αποτελεσμάτων
	if ($result) {
		header('location: 3_calendar.html');
		mysqli_close($conn); //τερματισμός σύνδεσης με τον server
		die();
	}else {
		header('location: 7_signup.html');
		mysqli_close($conn); //τερματισμός σύνδεσης με τον server
		die();
}}?>