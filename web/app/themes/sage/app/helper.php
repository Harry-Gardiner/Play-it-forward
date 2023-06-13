<?php

namespace App;

/**
 * Retrieves a JSON file and converts the JSON data into a PHP array of color values
 */
function getColoursFromJson($jsonFile) {
    // Read the JSON file
    $jsonString = file_get_contents($jsonFile);

    // Convert the JSON string to a PHP array
    $data = json_decode($jsonString, true);

    // Initialize an empty array for color values
    $colours = [];

    // Iterate over each item in the data array
    foreach ($data as $colour => $hex) {
        // Add the colour value to the colours array
        $colours[$colour] = $hex;
    }
    // Return the array of colour values
    return $colours;
}