<?php
function day_type($day) {
    // Convert the input day to lowercase to make the function case-insensitive
    $day = strtolower($day);

    // Using switch-case to determine if the day is a weekday or weekend
    switch ($day) {
        case 'monday':
        case 'tuesday':
        case 'wednesday':
        case 'thursday':
        case 'friday':
            return "It is a weekday.";
        case 'saturday':
        case 'sunday':
            return "It is a weekend.";
        default:
            return "Invalid day of the week.";
    }
}

// Example usage
$day = 'Wednesday';
echo day_type($day);  // Output: It is a weekday.

$day = 'Sunday';
echo "\n" . day_type($day);  // Output: It is a weekend.
?>
