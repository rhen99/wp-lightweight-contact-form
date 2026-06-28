<?php

function lcf_validate_form($name, $email, $message) {
    $errors = [];
    if(empty($name) || empty($email) || empty($message)) {
        $errors[] = "Fill in all required fields.";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    return $errors;
}