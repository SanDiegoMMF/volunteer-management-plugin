<?php
/*
Plugin Name: SDMMF volunteer managment system
Plugin URI: http://cant.go.here/
Description: Volunteer management for organizations
Version: 1.0
Author: SDMMF
Author URI: http://cant.go.here/
License: unknown
*/

// Shows a form to allow people to sign up for the mailing list.
// Usage (in pages): [mmf_form form_url=/form.php]
// Parameters:
//     form_url: URL for form to be posted to (optional).
function mmf_show_form($args, $content = null) {
    $form_url = $args['form_url'];
    $result = <<<END
<form method="POST" action="$form_url">
First name: <input type="text" name="mmf_first_name" /><br/>
Last name: <input type="text" name="mmf_last_name" /><br/>
Email: <input type="email" name="mmf_email" /><br/>
<input type="submit" />
</form>
END;

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (empty($_POST['mmf_first_name']) || empty($_POST['mmf_last_name']) || empty($_POST['mmf_email']))
        {
            $x = <<<END
<p><b>All fields are required.</b></p>
END;
            $result = $x . $result;
        }
        else
        {
            // TODO: send email. Or use MailChimp. Or something.
            $result = "Welcome, " . htmlspecialchars($_POST['mmf_first_name']) . " " . htmlspecialchars($_POST['mmf_last_name']) . ", to the list.";
        }
    }

    return $result;
}

add_shortcode('mmf_form', 'mmf_show_form');
?>
