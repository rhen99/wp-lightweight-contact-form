<?php

function lcf_validate_form($name, $email, $message) {
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Name is required.';
    }

    if (empty($email)) {
        $errors[] = 'Email is required.';
    } elseif (!is_email($email)) {
        $errors[] = 'Invalid email format.';
    }

    if (empty($message)) {
        $errors[] = 'Message is required.';
    }

    return $errors;
}