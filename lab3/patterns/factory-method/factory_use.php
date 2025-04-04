<?php

require_once 'UserFactory.php';

// Load users data
$usersData = require_once 'users.php';

// Create a user factory
$userFactory = new ConcreteUserFactory();

// Display information about all users
echo "User Information:\n";
echo "================\n";

foreach ($usersData as $userData) {
    // Create a user object using the factory
    $user = $userFactory->getUser($userData);
    
    // Display user information
    echo $user->getInfo() . "\n";
}

// Demonstrate using the factory for a specific user type
echo "\nAccessing specific user properties:\n";
echo "================================\n";

$adminData = $usersData[0]; // Getting the first user (admin)
$admin = $userFactory->getUser($adminData);

echo "User ID: " . $admin->getId() . "\n";
echo "User Name: " . $admin->getName() . "\n";
echo "User Email: " . $admin->getEmail() . "\n";
echo "User Type: " . $admin->getType() . "\n"; 