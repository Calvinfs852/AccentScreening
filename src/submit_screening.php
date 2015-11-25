<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in to take your speech assessment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet/less" href="css/submit_screening.less" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <script src="js/vendor/Recordmp3js-master/recordmp3.js"></script>


</head>
<body class = "page_background">
<div class="container-fluid " align="center" style="width: 40%;">
    <div class="jumbotron vertical-center centered_box">
        Welcome <?php echo $_POST["name"]; ?><br>
        Your email address is: <?php echo $_POST["email"]; ?>


        <?php
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $imprint = $_POST['imprint'];

        $db = mysqli_connect("localhost", "screeningapp", "8xjhuyYXCdqV", "c2230a01test", "3306"); //for development
        //$db = mysqli_connect("localhost", "c2230a01", "c2230a01", "c2230a01test"); //for ps11. assume port 3306
        $query = "INSERT INTO screenings (name, phone, email, imprint) VALUES ('".$name."', '".$phone."','".$email."','".$imprint."');";
        if (mysqli_query($db, $query)) {
            echo "New record created successfully";

            mail("cfscott@elearn.pstcc.edu", "New Screening", $name . " has completed the screening. You can review it here. \nContact information:\n" . $email . "\n". $phone, "From: <automaticscreening@example.com>" /* TODO insert link to screening feedback page*/);
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }
        ?>
    </div>

</div>





</body>
</html>
