<?php

require_once 'Settings.php';

// Get Settings instance
$settings = Settings::getInstance();

// Save numeric, string and boolean values
$settings->set('maxUsers', 100);  // numeric value
$settings->set('appName', 'My Application');  // string value
$settings->set('debugMode', true);  // boolean value

// Display the saved values
echo "Numeric value (maxUsers): " . $settings->get('maxUsers') . "\n";
echo "String value (appName): " . $settings->get('appName') . "\n";
echo "Boolean value (debugMode): " . ($settings->get('debugMode') ? 'true' : 'false') . "\n";

// Demonstrate that we get the same instance
$settings2 = Settings::getInstance();
echo "\nChecking if we get the same instance:\n";
echo "Settings 2 appName: " . $settings2->get('appName') . "\n";

// If we change a value in the second instance, it affects the first one too
$settings2->set('appName', 'Updated App Name');
echo "Updated appName in settings2, now in settings1: " . $settings->get('appName') . "\n"; 