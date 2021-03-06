<!-- example from W3Schools Tutorial on Bootstrap -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Please log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet/less" href="css/register.less" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <link rel="stylesheet/less" href="/src/css/register.less" type="text/css">
    <script src="js/login.js"></script>


</head>
<body class="page_background">

<div class="container-fluid full-page" align="center">
    <div class="kill-me vertical-center">
        <div class="login-box jumbotron">
            <form role="form" action="verify.php" method="post">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
