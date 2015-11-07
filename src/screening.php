<!-- example from W3Schools Tutorial on Bootstrap -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in to take your speech assessment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet/less" href="css/screening.less" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <script src="js/screening.js"></script>
    <script src="js/vendor/RecordMp3Js/recordmp3.js"></script>


</head>
<body class="page_background">

<div class="container-fluid full-page" id="signin-box" align="center">
    <div class="kill-me vertical-center">
        <div class="login-box jumbotron">
            <form role="form" action="submit_screening.php" method="post">
                <div class="registration">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <button type="button" onclick="recordFormData(window)" class="btn btn-default">Next</button>
                </div>
                <div class="screening">
                    <p>Below are several short prompts. One at a time, please click the button next to each prompt and
                        record yourself reading it.</p>
                    <?php

                    $prompts_list = array("number", "more", "sing", "three", "change", "although", "develop", "family", "ground", "laugh", "measure", 'stretch', 'voice', 'climb', 'shape', 'stairs', "walk", "human", "bathtub", "root");
                    foreach ($prompts_list as $prompt) {
                        echo '

                        <div class="row prompt">
                        <div class="col-md-8">
                                <p> ' . $prompt . ' </p>
                        </div>
                        <div class="col-md-4">
                                                        <div class="record-button" onclick="record(/*TODO: parameterized recording*/)" >
                                </div>
                        </div>
                        </div>
                        ';
                    }

                    ?>

                    <div class="row">
                        <button type="submit" class="btn-primary" onclick="submit()">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
