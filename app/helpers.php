<?php 

function sluggify($string) {
    // Convert the string to lowercase
    $string = strtolower($string);

    // Replace spaces with hyphens
    $string = str_replace(' ', '-', $string);

    // Remove any characters that are not alphanumeric or hyphens
    $string = preg_replace('/[^a-z0-9\-]/', '', $string);

    // Remove any consecutive hyphens
    $string = preg_replace('/\-+/', '-', $string);

    // Return the slugified string
    return $string;
}