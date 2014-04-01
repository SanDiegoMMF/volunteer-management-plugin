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
// NOTE: does not currently process data.
function mmf_show_form($args, $content = null) {
    $form_url = $args['form_url'];

    return <<<END
<form method="POST" action="$form_url">
First name: <input type="text" name="mmf_first_name" /><br/>
Last name: <input type="text" name="mmf_last_name" /><br/>
Email: <input type="email" name="mmf_email" /><br/>
<input type="submit" />
</form>
END;
}

add_shortcode('mmf_form', 'mmf_show_form');
?>
