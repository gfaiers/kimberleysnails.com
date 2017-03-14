<?php include_once("includes/sessions.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/normalise.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/kimslogin.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- putting jQuery in head so that the php loaded scripts can access it -->
        <title>Kimberleys Nails</title>
    </head>
    <body>
        <main>
            <?php include_once("includes/page_setup.php");?>
        </main>
        <footer>
            <div class="container">
                <p>Site developed by <a href="https://www.gfaiers.com" target="_top">gfaiers.com</a></p>
            </div>
        </footer>
        <script src="/js/remunit.js"></script> <!-- for the css remunit calcuations -->
        <script src="/js/bootstrap.min.js"></script> <!-- required for bootstrap -->
    </body>
</html>