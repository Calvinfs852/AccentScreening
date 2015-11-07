<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>


<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$db = mysqli_connect("localhost", "screeningapp", "8xjhuyYXCdqV", "c2230a01test", "3306");
$query = "INSERT INTO screenings (name, phone, email) VALUES (" . $name . ", " . $phone . ", '" . $email . "');";//Single quotes around email to avoid @ error
if (mysqli_query($db, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
}
?>






</body>
</html>
