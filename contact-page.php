
<?php
 
    session_start();
    if (!isset($_SESSION["visits"]))
        $_SESSION["visits"] = 0;
   

 
?>
<?php get_header(); ?>



<div class="content-column"><?php debug_location("Contact-Page"); ?>

<noscript>
    <meta http-equiv="refresh" content="0;URL='/'" />  
</noscript>

    <article class="post image-container has-thumbnail">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <?php
        $agr_options = get_option("agr_options");
        $site_key = $agr_options["site_key"];
        $secret_key = $agr_options["secret_key"];

        $data_token = md5( uniqid( rand(), true ) );

        // Process the form upon submission
        if (isset($_POST["contact_submit"])) {
            // Get the form data
            $name = sanitize_text_field($_POST["contact_name"]);
            $email = sanitize_email($_POST["contact_email"]);
            $message = sanitize_textarea_field($_POST["contact_message"]);

            // Validate the form data
            $errors = [];

            if (empty($name)) {
                $errors[] = "Please enter your name.";
            }

            if (!is_email($email)) {
                $errors[] = "Please enter a valid email address.";
            }

            if (empty($message)) {
                $errors[] = "Please enter a message.";
            }

            // If there are no errors, send the email
            if (empty($errors)) {

                // echo "Visits: ";
                // echo $_SESSION["visits"];     

                if ($_SESSION["visits"] > 1){?>
                    <p class="contact-success align-center">Your message was already sent!</p><?php
                } else {
                    // Send the email
                    $_SESSION["visits"] = 100;

                    if (null !== get_bloginfo("name")){
                        $site_title = get_bloginfo("name");
                        }
        
                    $mail_options = get_option("wp_mail_smtp");
                    if (isset($mail_options["from_name"])) {
                        $mail_from_name = $mail_options["from_name"];
                    } else {
                        $mail_from_name = "";
                    }
                    
                    if (isset($mail_options["from_email"])) {
                        $mail_from_email = $mail_options["from_email"];
                    } else {
                        $mail_from_email = "not_set@mail-from-email.com";
                    }
    
                    // Set the email headers
                    $headers = [
                        "From: " . $mail_from_name . " <" . $mail_from_email . ">",
                        "Reply-To: " . $name . " <" . $email . ">",
                    ];
    
                    $body = "Name: " . $name . "\n";
                    $body .= "eMail: " . $email . "\n";
                    $body .= "Message: " . $message;

                    
                    wp_mail(
                        get_option("admin_email"),
                        $site_title . " - Contact info",
                        $body,
                        $headers
                    );?>
                    <!-- // Show a success message -->
                    <p class="contact-success align-center">Your message has been sent. Thank you!</p><?php
                }
            } else {
                $_SESSION["visits"] = 0;
                echo '<p class="contact-success align-center">All fields required (Not sent).</p>';

                // Show the form with the error messages
                echo '<div class="contact-form align-center">';
                echo '<form id="form-contact" class="wpforms-validate wpforms-form wpforms-ajax-form" data-formid="86" method="post" enctype="multipart/form-data" action="/contact-me/" data-token="' . $data_token .'">';
                echo '<p><label for="contact_name">Name:</label></br><input type="text" id="contact_name" name="contact_name" value="' . esc_attr($name) . '"></p>';
                echo '<p><label for="contact_email">Email:</label></br><input type="email" id="contact_email" name="contact_email" value="' . esc_attr($email) . '"></p>';
                echo '<p><label for="contact_message">Message:</label></br><textarea id="contact_message" name="contact_message">' . esc_textarea($message) . "</textarea></p>";
                ?>
                <form action="?" method="POST">
                    <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
                    <input type="submit" value="Send Message" name="contact_submit" >
                </form><?php
                echo "</form>";
                echo "</div>";
            }
        } else {
            $_SESSION["visits"] = 0;
            if (have_posts()) {
                the_content();
            }
            // Show the form
            echo '<div class="contact-form align-center">';
            echo '<form id="form-contact" class="wpforms-validate wpforms-form wpforms-ajax-form" data-formid="86" method="post" enctype="multipart/form-data" action="/contact-me/" data-token="' . $data_token .'">';
            echo '<p><label for="contact_name">Name:</label></br><input type="text" id="contact_name" name="contact_name"></p>';
            echo '<p><label for="contact_email">Email:</label></br><input type="email" id="contact_email" name="contact_email"></p>';
            echo '<p><label for="contact_message">Message:</label></br><textarea id="contact_message" name="contact_message"></textarea></p>';
            ?>
            <form action="?" method="POST">
                <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
                <input type="submit" value="Send Message" name="contact_submit">
            </form><?php
            echo "</form>";
            echo "</div>";
            ?>
            <script>
            var form = document.getElementById("form-contact");
            form.onsubmit = function() {
              var response = grecaptcha.getResponse();
              if(response.length == 0) {
                alert("Please complete the reCAPTCHA");
                return false;
              } else {
                // Add the reCAPTCHA response to the form data
                var formData = new FormData(form);
                formData.append("g-recaptcha-response", response);
                // Submit the form
                var xhr = new XMLHttpRequest();
                xhr.open("POST", form.action);
                xhr.send(formData);
              }
            };
          </script><?php

        }   
        ?>
    </article>
</div>

<?php
get_sidebar();

get_footer();
?>
