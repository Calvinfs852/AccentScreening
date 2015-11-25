<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in to take your speech assessment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet/less" href="css/feedback.less" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>

</head>
<body class="page_background">

<div class="container-fluid full-page" id="signin-box" align="center">
  <div class="vertical-center">
    <div class="login-box jumbotron">
        <div class="screening" >
          <table class="table-striped table-bordered" width="100%">
            <thead>Below are several short prompts. One at a time, please click the button next to each
            prompt and
            record yourself reading it.</thead>
            <?php

            $prompts_list = array("number", "more", "sing", "three", "change", "although", "develop", "family", "ground", "laugh", "measure", 'stretch', 'voice', 'climb', 'shape', 'stairs', "walk", "human", "bathtub", "root");
            $imprint = $_GET['imprint'];

            foreach ($prompts_list as $prompt) {
              echo '
<tr>
                                <td class="prompt" width="75%">' . $prompt . '</td>
                               <td>
                               <audio controls>
                               <source src="js/vendor/Recordmp3js-master/recordings/'.$imprint.'_'.$prompt.'.mp3" type="audio/mpeg">
                               Use a compatible browser to hear the recordings
                               </audio>
                               </td>
                        </tr>
                            ';
            }

            ?>
          </table>
          <!--TODO Add back button-->
        </div>
    </div>
  </div>
</div>

</body>
</html>
