<?php include_once("includes/sessions.php");
include_once("includes/database_read.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/normalise.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <title>Kimberleys Nails</title>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <?php if (isset($_SESSION['user_id'])) { ?>
                <button type="button" class="navbar-toggle collapsed">
                    <a href="https://www.kimberleysnails.com/kimslogin/">Admin</a>
                </button> <?php } ?>
                <button type="button" class="navbar-toggle collapsed">
                    <a href="tel:<?php if (defined('FORMATTED_TEL') && !empty(FORMATTED_TEL)) echo(FORMATTED_TEL);?>">Call <span class="glyphicon glyphicon-earphone"></span></a>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="navbar_float_right">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                    <button type="button" class="navbar_button">
                        <a href="https://www.kimberleysnails.com/kimslogin/">Admin</a>
                    </button> <?php } ?>
                    <button type="button" class="navbar_button">
                        <a href="tel:<?php if (defined('FORMATTED_TEL') && !empty(FORMATTED_TEL)) echo(FORMATTED_TEL);?>">Call <span class="glyphicon glyphicon-earphone"></span></a>
                    </button>
                    <button type="button" class="navbar_button">
                        <a href="mailto:<?php if (defined('EMAIL') && !empty(EMAIL)) echo(EMAIL);?>?Subject=Contact%20me" target="_top">Email <span class="glyphicon glyphicon-envelope"></span></a>
                    </button>
                </div>
            </div><!--/.nav-collapse -->
        </nav>
        <main>
            <section class="header">
                <div class="container">
                    <div>
                        <img class="logo_image" src="images/default_image.png" alt="Kims Nails">
                        <div class="header_text">
                            <div>
                                <?php if (defined('HEADER_TITLE') && !empty(HEADER_TITLE) && !(HEADER_TITLE === "nothing")) echo("<h1>".HEADER_TITLE."</h1>");?>
                                <?php if (defined('HEADER_SECOND_LINE') && !empty(HEADER_SECOND_LINE) && !(HEADER_SECOND_LINE === "nothing")) echo("<br/><h2>".HEADER_SECOND_LINE."</h2>");?>
                            </div>
                        </div>
                        <div class="scroll_arrow">
                            <img id="scroll_down" src="images/arrow-down-white.png" alt="Down Arrow">
                        </div>
                    </div>
                </div>
            </section>
            <section class="introduction">
                <div class="container">
                    <div class="row">
                        <?php if (defined('INTRODUCTION_SECTION_TITLE') && !empty(INTRODUCTION_SECTION_TITLE) && !(INTRODUCTION_SECTION_TITLE === "nothing")) echo("<h2>".INTRODUCTION_SECTION_TITLE."</h2>");?>
                        <?php if (defined('INTRODUCTION_CONTENT_BR') && !empty(INTRODUCTION_CONTENT_BR) && !(INTRODUCTION_CONTENT_BR === "nothing")) echo('<p class="spacing">'.INTRODUCTION_CONTENT_BR."</p>");?>
                        <button class="prices">Show Prices</button>
                        <button class="contact_me">Contact Me</button>
                    </div>
                </div>
            </section>
            <section class="clients">
                <div class="container">
                    <?php if (defined('GALLERY_SECTION_TITLE') && !empty(GALLERY_SECTION_TITLE) && !(GALLERY_SECTION_TITLE === "nothing")) echo('<div class="clients_title"><h2>'.GALLERY_SECTION_TITLE."</h2></div>");?>
                    <div class="clients_logo">
                        <ul class="clients_list">
                            <!-- this needs to link with PHP for the variables for the images -->
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 1 .']'));?>" alt="Nails 1"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 2 .']'));?>" alt="Nails 2"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 3 .']'));?>" alt="Nails 3"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 4 .']'));?>" alt="Nails 4"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 5 .']'));?>" alt="Nails 5"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 6 .']'));?>" alt="Nails 6"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 7 .']'));?>" alt="Nails 7"></div></li>
                            <li><div class="bg"><img src="<?php echo(constant('IMAGE['. 8 .']'));?>" alt="Nails 8"></div></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="section_contact">
                <div class="container">
                    <div class="col-md-4">
                        <?php if (defined('CONTACT_SECTION_TITLE') && !empty(CONTACT_SECTION_TITLE) && !(CONTACT_SECTION_TITLE === "nothing")) echo("<h2>".CONTACT_SECTION_TITLE."</h2>");?>
                        <div id="success"></div>
                        <input id="email" class="text_box" type="text" placeholder="Email"><br/>
                        <div id="email_error"></div>
                        <input id="name" class="text_box" type="text" placeholder="Name"><br/>
                        <div id="name_error"></div>
                        <textarea id="message" class="text_area" placeholder="Request" cols="50" rows="6"></textarea><br/>
                        <div id="message_error"></div>
                        <button id="submit" class="submit">Send</button>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            <?php if (defined('CONTACT_CONTENT_BR') && !empty(CONTACT_CONTENT_BR) && !(CONTACT_CONTENT_BR === "nothing")) echo(CONTACT_CONTENT_BR);?>
                            <li><strong>Mobile:</strong> <a href="tel:<?php if (defined('FORMATTED_TEL') && !empty(FORMATTED_TEL)) echo(FORMATTED_TEL);?>"><?php if (defined('FORMATTED_TEL') && !empty(FORMATTED_TEL)) echo(FORMATTED_TEL);?></a></li>
                            <li><strong>Email:</strong> <a href="mailto:<?php if (defined('EMAIL') && !empty(EMAIL)) echo(EMAIL);?>?Subject=Contact%20me" target="_top"><?php if (defined('EMAIL') && !empty(EMAIL)) echo(EMAIL);?></a></li>
                            <li><?php if (defined('FACEBOOK') && !empty(FACEBOOK) && !(FACEBOOK === "nothing")) echo('<div class="facebook"><a href="'.FACEBOOK.'" target="_blank"><img src="images/facebook.png" alt="Facebook"></a></div>');?><?php if (defined('INSTAGRAM') && !empty(INSTAGRAM) && !(INSTAGRAM === "nothing")) echo('<div class="instagram"><a href="'.INSTAGRAM.'" target="_blank"><img src="images/instagram.png" alt="Instagram"></a></div>');?><?php if (defined('TWITTER') && !empty(TWITTER) && !(TWITTER === "nothing")) echo('<div class="twitter"><a href="'.TWITTER.'" target="_blank"><img src="images/twitter.png" alt="Twitter"></a></div>');?></li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container">
                <p>Site developed by <a href="https://www.gfaiers.com" target="_top">gfaiers.com</a></p>
            </div>
        </footer>
        
        <div class="modal fade" id="modal_prices" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h2 class="modal_h2"><?php if (defined('TITLE') && !empty(TITLE)) echo(TITLE);?></h2>
                        <table class="horizontal">
                            <tr class="table_row">
                                <th class="table_header"></th>
                                <th class="table_header">Tidy + Polish</th>
                                <th class="table_header">Shellac</th>
                                <th class="table_header">Acrylic</th>
                                <th class="table_header">Nail Art</th>
                            </tr>
                            <tr class="table_row">
                                <th>Hands</th>
                                <td><?php if (defined('HAND_TP') && !empty(HAND_TP) && !(HAND_TP === "N/A")) {echo("£".HAND_TP);} else {echo("N/A");}?></td>
                                <td><?php if (defined('HAND_SHEL') && !empty(HAND_SHEL) && !(HAND_SHEL === "N/A")) {echo("£".HAND_SHEL);} else {echo("N/A");}?></td>
                                <td><?php if (defined('HAND_AC') && !empty(HAND_AC) && !(HAND_AC === "N/A")) {echo("£".HAND_AC);} else {echo("N/A");}?></td>
                                <td><?php if (defined('HAND_ART') && !empty(HAND_ART) && !(HAND_ART === "N/A")) {echo("+£".HAND_ART);} else {echo("N/A");}?></td>
                            </tr>
                            <tr class="table_row">
                                <th>Feet</th>
                                <td><?php if (defined('FEET_TP') && !empty(FEET_TP) && !(FEET_TP === "N/A")) {echo("£".FEET_TP);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_SHEL') && !empty(FEET_SHEL) && !(FEET_SHEL === "N/A")) {echo("£".FEET_SHEL);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_AC') && !empty(FEET_AC) && !(FEET_AC === "N/A")) {echo("£".FEET_AC);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_ART') && !empty(FEET_ART) && !(FEET_ART === "N/A")) {echo("+£".FEET_ART);} else {echo("N/A");}?></td>
                            </tr>
                        </table>
                        <table class="vertical">
                            <tr class="table_row">
                                <th class="table_header"></th>
                                <th class="table_header">Hands</th>
                                <th class="table_header">Feet</th>
                            </tr>
                            <tr class="table_row">
                                <th>Tidy + Polish</th>
                                <td><?php if (defined('HAND_TP') && !empty(HAND_TP) && !(HAND_TP === "N/A")) {echo("£".HAND_TP);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_TP') && !empty(FEET_TP) && !(FEET_TP === "N/A")) {echo("£".FEET_TP);} else {echo("N/A");}?></td>
                            </tr>
                            <tr class="table_row">
                                <th>Shellac</th>
                                <td><?php if (defined('HAND_SHEL') && !empty(HAND_SHEL) && !(HAND_SHEL === "N/A")) {echo("£".HAND_SHEL);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_SHEL') && !empty(FEET_SHEL) && !(FEET_SHEL === "N/A")) {echo("£".FEET_SHEL);} else {echo("N/A");}?></td>
                            </tr>
                            <tr class="table_row">
                                <th>Acrylic</th>
                                <td><?php if (defined('HAND_AC') && !empty(HAND_AC) && !(HAND_AC === "N/A")) {echo("£".HAND_AC);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_AC') && !empty(FEET_AC) && !(FEET_AC === "N/A")) {echo("£".FEET_AC);} else {echo("N/A");}?></td>
                            </tr>
                            <tr class="table_row">
                                <th>Nail Art</th>
                                <td><?php if (defined('HAND_ART') && !empty(HAND_ART) && !(HAND_ART === "N/A")) {echo("+£".HAND_ART);} else {echo("N/A");}?></td>
                                <td><?php if (defined('FEET_ART') && !empty(FEET_ART) && !(FEET_ART === "N/A")) {echo("+£".FEET_ART);} else {echo("N/A");}?></td>
                            </tr>
                        </table>
                        <div class="table_line">
                            <small class="modal_message"><?php if (defined('MESSAGE_BR') && !empty(MESSAGE_BR)) echo(MESSAGE_BR);?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/remunit.js"></script> <!-- for the css remunit calcuations -->
        <script src="js/jquery.js"></script> <!-- jQuery functions -->
        <script src="js/bootstrap.min.js"></script> <!-- required for bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>