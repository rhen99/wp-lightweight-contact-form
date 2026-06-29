<?php
function lcf_render_form() {
    ob_start();
    ?>
    
   
    <form class="lightweight-contact-form">
        <div class="form-message"></div>
    <div class="form-group">
        <label>Name<span class="required">*</span></label>
        <input type="text" name="name">
        <small class="error-message" data-field="name"></small>
    </div>

    <div class="form-group">
        <label>Email<span class="required">*</span></label>
        <input type="email" name="email">
        <small class="error-message" data-field="email"></small>  
    </div>

    <div class="form-group">
        <label>Message<span class="required">*</span></label>
        <textarea name="message"></textarea>
        <small class="error-message" data-field="message"></small>   
    </div>
     <?php wp_nonce_field('lcf_form_action', 'lcf_nonce'); ?>

    <button name="lcf_submit" type="submit">Send Message</button>
</form>

    <?php return ob_get_clean();
}

add_shortcode('lightweight_contact_form', 'lcf_render_form');