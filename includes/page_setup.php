<?php include_once("sessions.php");
if (isset($_SESSION['user_id'])) { 
    include_once("database_read.php");?>
        <section class="logged_in">
            <div class="container">
                <h1>KimberleysNails.com</h1>
                <h2>Website Update Portal</h2>
                <span>All the elements allow HTML formatting for futher alteration.</span><br />
                <span>Select what part of the site you want to make changes to below:</span>
                <ul class="nav nav-pills">
                    <li id="change_text_li" role="presentation" class="active"><a id="change_text">Change Text</a></li>
                    <li id="upload_images_li" role="presentation"><a id="upload_images">Upload Images</a></li>
                    <li id="update_prices_li" role="presentation"><a id="update_prices">Update Prices</a></li>
                    <li id="contact_details_li" role="presentation"><a id="contact_details">Contact Details</a></li>
                </ul>
            </div>
        </section>
        <section class="change_text">
            <div class="container">
                <div id="green_text" class="alert alert-success" role="alert"></div>
                <div id="amber_text" class="alert alert-info" role="alert"></div>
                <div id="error_text" class="alert alert-danger" role="alert"></div>
                <p>Header title</p>
                <input class="input_text" id="header_title" type="text" value="<?php if (defined('HEADER_TITLE') && !empty(HEADER_TITLE)) echo(HEADER_TITLE);?>"/>
                <p>Header second line</p>
                <input class="input_text" id="header_second" type="text" value="<?php if (defined('HEADER_SECOND_LINE') && !empty(HEADER_SECOND_LINE))  echo(HEADER_SECOND_LINE);?>"/>
                <p>Introduction section title</p>
                <input class="input_text" id="introduction_title" type="text" value="<?php if (defined('INTRODUCTION_SECTION_TITLE') && !empty(INTRODUCTION_SECTION_TITLE)) echo(INTRODUCTION_SECTION_TITLE) ?>"/>
                <p>Gallery section title</p>
                <input class="input_text" id="gallery_title" type="text" value="<?php if (defined('GALLERY_SECTION_TITLE') && !empty(GALLERY_SECTION_TITLE)) echo(GALLERY_SECTION_TITLE);?>"/>
                <p>Contact section title</p>
                <input class="input_text" id="contact_title" type="text" value="<?php if (defined('CONTACT_SECTION_TITLE') && !empty(CONTACT_SECTION_TITLE)) echo(CONTACT_SECTION_TITLE);?>"/>
                <p>Content for introduction section</p>
                <textarea id="introduction_content" class="textarea"><?php if (defined('INTRODUCTION_CONTENT_NL') && !empty(INTRODUCTION_CONTENT_NL)) echo(INTRODUCTION_CONTENT_NL);?></textarea>
                <p>Content for contact section</p>
                <textarea id="contact_content" class="textarea"><?php if (defined('CONTACT_CONTENT_NL') && !empty(CONTACT_CONTENT_NL)) echo(CONTACT_CONTENT_NL);?></textarea>
                <br/>
                <button class="button" id="change_text_button">Save Changes</button>
            </div>
        </section>
        <section class="upload_images">
            <div class="container">
                <div id="green_upload" class="alert alert-success" role="alert"></div>
                <div id="amber_upload" class="alert alert-info" role="alert"></div>
                <div id="error_upload" class="alert alert-danger" role="alert"></div>
                <div class="col-md-4">
                    <div class="cover">
                        <p>Upload new header background</p>
                        <div class="image_holder">
                            <img id="img_header_bg" src="../images/default_image.png" alt="...">
                            <div id="text_header_bg"></div>
                        </div>
                        <button id="button_header_bg" class="button">Search</button>
                        <button id="button_header_bg_upload" class="button">Upload</button>
                        <input type="file" id="file_header_bg" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cover">
                        <p>Upload new clients background</p>
                        <div class="image_holder">
                            <img id="img_clients_bg" src="../images/default_image.png" alt="...">
                            <div id="text_clients_bg"></div>
                        </div>
                        <button id="button_clients_bg" class="button">Search</button>
                        <button id="button_clients_bg_upload" class="button">Upload</button>
                        <input type="file" id="file_clients_bg" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cover">
                        <p>Upload new client work</p>
                        <div class="image_holder">
                            <img id="img_work_done" src="../images/default_image.png" alt="...">
                            <div id="text_work_done"></div>
                        </div>
                        <button id="button_work_done" class="button">Search</button>
                        <button id="button_work_done_upload" class="button">Upload</button>
                        <input type="file" id="file_work_done" accept="image/png, image/jpeg">
                    </div>
                </div>
            </div>
        </section>
        <section class="prices">
            <div class="container">
                <div id="green_prices" class="alert alert-success" role="alert"></div>
                <div id="amber_prices" class="alert alert-info" role="alert"></div>
                <div id="error_prices" class="alert alert-danger" role="alert"></div>
                <p>Price list title</p>
                <input class="input_text" id="price_list_title" type="text" value="<?php if (defined('TITLE') && !empty(TITLE)) echo(TITLE);?>"/>
                <p>Price list message</p>
                <textarea class="textarea" id="price_list_message"><?php if (defined('MESSAGE_NL') && !empty(MESSAGE_NL)) echo(MESSAGE_NL);?></textarea>
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
                        <td><input class="input_text prices_table" id="hand_tp" type="text" value="<?php if (defined('HAND_TP') && !empty(HAND_TP)) echo(HAND_TP);?>"/></td>
                        <td><input class="input_text prices_table" id="hand_shel" type="text" value="<?php if (defined('HAND_SHEL') && !empty(HAND_SHEL)) echo(HAND_SHEL);?>"/></td>
                        <td><input class="input_text prices_table" id="hand_ac" type="text" value="<?php if (defined('HAND_AC') && !empty(HAND_AC)) echo(HAND_AC);?>"/></td>
                        <td><input class="input_text prices_table" id="hand_art" type="text" value="<?php if (defined('HAND_ART') && !empty(HAND_ART)) echo(HAND_ART);?>"/></td>
                    </tr>
                    <tr class="table_row">
                        <th>Feet</th>
                        <td><input class="input_text prices_table" id="feet_tp" type="text" value="<?php if (defined('FEET_TP') && !empty(FEET_TP)) echo(FEET_TP);?>"/></td>
                        <td><input class="input_text prices_table" id="feet_shel" type="text" value="<?php if (defined('FEET_SHEL') && !empty(FEET_SHEL)) echo(FEET_SHEL);?>"/></td>
                        <td><input class="input_text prices_table" id="feet_ac" type="text" value="<?php if (defined('FEET_AC') && !empty(FEET_AC)) echo(FEET_AC);?>"/></td>
                        <td><input class="input_text prices_table" id="feet_art" type="text" value="<?php if (defined('FEET_ART') && !empty(FEET_ART)) echo(FEET_ART);?>"/></td>
                    </tr>
                </table>
                <br/>
                <button class="button" id="prices_button">Save Changes</button>
            </div>
        </section>
        <section class="contact_details">
            <div class="container">
                <div id="green_contact" class="alert alert-success" role="alert"></div>
                <div id="amber_contact" class="alert alert-info" role="alert"></div>
                <div id="error_contact" class="alert alert-danger" role="alert"></div>
                <p>Mobile number</p>
                <input class="input_text" id="mobile_number" type="text" value="<?php if (defined('TEL') && !empty(TEL)) echo(TEL);?>"/>
                <p>Email address</p>
                <input class="input_text" id="email" type="text" value="<?php if (defined('EMAIL') && !empty(EMAIL)) echo(EMAIL);?>"/>
                <p>Facebook link</p>
                <input class="input_text" id="facebook" type="text" value="<?php if (defined('FACEBOOK') && !empty(FACEBOOK)) echo(FACEBOOK);?>"/>
                <p>Twitter link</p>
                <input class="input_text" id="twitter" type="text" value="<?php if (defined('TWITTER') && !empty(TWITTER)) echo(TWITTER);?>"/>
                <p>Instagram link</p>
                <input class="input_text" id="instagram" type="text" value="<?php if (defined('INSTAGRAM') && !empty(INSTAGRAM)) echo(INSTAGRAM);?>"/>
                <br/>
                <button class="button" id="contact_details_button">Save Changes</button>
            </div>
        </section>
        <div class="container">
            <button id="logout" class="button" type="button" class="navbar_button">Logout</button>
        </div>
        <script src="/js/kimslogin_control.js"></script>
<?php } else { ?>
        <section class="logged_out">
            <div class="container">
                <h1>KimberleysNails.com</h1>
                <h2>Login</h2>
                <div id="amber_login" class="alert alert-info" role="alert"></div>
                <div id="error_login" class="alert alert-danger" role="alert"></div>
                <input id="email" class="input_text" type="text" placeholder="Email"/>
                <input id="password" class="input_text" type="password" placeholder="Password"/>
                <button id="login" class="button" type="button" class="navbar_button">Login</button>
            </div>
        </section>
        <script src="/js/zxcvbn.js"></script>
        <script src="/js/kimslogin.js"></script>
<?php } ?>