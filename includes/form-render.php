<?php
function lcf_render_form() {
    ob_start();
    ?>
    
   
    <form class="lightweight-contact-form">
        <div class="lcf-message"></div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Message</label>
        <textarea name="message" required></textarea>
    </div>
     <?php wp_nonce_field('lcf_form_action', 'lcf_nonce'); ?>

    <button name="lcf_submit" type="submit">Send Message</button>
</form>

    <?php return ob_get_clean();
}

add_shortcode('lightweight_contact_form', 'lcf_render_form');