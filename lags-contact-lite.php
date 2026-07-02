<?php

/*
Plugin Name: LAGS Contact Lite
Description: Lightweight AJAX contact form plugin.
Version: 1.0.0
Author: LAGS
Text Domain: lags-contact-lite
*/

if (!defined('ABSPATH')) exit;

// Load all classes
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-db.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-validation.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-mailer.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-ajax.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-enqueue.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-lags-shortcode.php';

// Init everything
function lags_init()
{
    new LAGS_DB();
    register_activation_hook(__FILE__, ['LAGS_DB', 'create_table']);
    new LAGS_Validation();
    new LAGS_Mailer();
    new LAGS_AJAX();
    new LAGS_Enqueue();
    new LAGS_Shortcode();
    new LAGS_Admin();
}
add_action('plugins_loaded', 'lags_init');
