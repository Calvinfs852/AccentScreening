<!--/**-->
<!--* Created by PhpStorm.-->
<!--* User: Calvin Scott-->
<!--* Date: 11/7/2015-->
<!--* Time: 6:36 PM-->
<!--*/-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet/less" href="css/review.less" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <script src="js/review.js"></script>
    <script src="js/vendor/RecordMp3Js/recordmp3.js"></script>


</head>
<body class="page_background">

<div class="container-fluid full-page" id="signin-box" align="center">
    <div class="vertical-center">
        <div class="login-box jumbotron">
            <form role="form" action="submit_screening.php" method="post">
                <div>
                    <table class="table-striped table-bordered" width="100%">

                        <?php
                        $id = $_POST["id"];

                        $prompts_list = array("number", "more", "sing", "three", "change", "although", "develop", "family", "ground", "laugh", "measure", 'stretch', 'voice', 'climb', 'shape', 'stairs', "walk", "human", "bathtub", "root");
                        foreach ($prompts_list as $prompt) {
                            echo '
<tr>

                                <td class="prompt" width="75%">' . $prompt . '</td>
                               <td>
                               <div class="replay-button" onclick="replay(/*TODO: recording*/)" >
                               </div>
                               </td>

                        </tr>
                        ';
                        }

                        ?>
                    </table>

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



<?php

