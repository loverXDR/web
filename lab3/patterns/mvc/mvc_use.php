<?php

require_once 'Controller.php';

// Create a user controller
$controller = new UserController();

// Display user data using different views
echo "Displaying User Data in Different Formats\n";
echo "========================================\n\n";

echo "HTML VIEW:\n";
echo "----------\n";
echo $controller->displayHtml();
echo "\n\n";

echo "JSON VIEW:\n";
echo "----------\n";
echo $controller->displayJson();
echo "\n\n";

echo "TEXT VIEW:\n";
echo "----------\n";
echo $controller->displayText();
echo "\n\n";

echo "MARKDOWN VIEW (New Implementation):\n";
echo "--------------------------------\n";
echo $controller->displayMarkdown();
echo "\n\n";

// You could also save the markdown output to a file if needed
$markdownOutput = $controller->displayMarkdown();
file_put_contents(__DIR__ . '/users.md', $markdownOutput); 