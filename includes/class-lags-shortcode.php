<?php

class LAGS_Shortcode
{

    public function __construct()
    {
        add_shortcode('lags_contact_lite', [$this, 'render']);
    }

    public function render()
    {
        ob_start(); ?>

        <form id="lightweight-contact-form" class="lightweight-contact-form">
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
            <?php wp_nonce_field('lags_form_action', 'lags_nonce'); ?>

            <button name="lags_submit" type="submit">Send Message</button>
        </form>

<?php
        return ob_get_clean();
    }
}
