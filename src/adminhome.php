<!-- example from W3Schools Tutorial on Bootstrap -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet/less" href="css/adminhome.less" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>

</head>
<body class="page_background">
<div class="container-fluid " align="center" style="width: 40%;">
    <div class="jumbotron vertical-center centered_box">
        <?php
        $connection = mysqli_connect("localhost", "screeningapp", "8xjhuyYXCdqV", "c2230a01test", "3306");
        $query = "SELECT id_screening, name, date, imprint FROM screenings WHERE reviewed=0";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo '<div class="table-responsive"><table class = "table">';
            while ($row = mysqli_fetch_array($result)) {
                $name = $row["name"];
                $date = $row["date"];
                $id = $row["id_screening"];
                $imprint = $row["imprint"];

                include "screening_alert.php";
            }
            echo '</table></div>';
        }
        ?>
        <div class="row">
            <div class="jumbotron table-responsive">
                <p>Reviewed screenings:</p>
                <table class="table">
                    <?php
                    $connection = mysqli_connect("localhost", "screeningapp", "8xjhuyYXCdqV", "c2230a01test", "3306");
                    $query = "SELECT id_screening, name, date, imprint FROM screenings WHERE reviewed=1";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row["name"];
                            $date = $row["date"];
                            $imprint = $row["imprint"];
                            include "screening_alert.php";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
