<?php

// Base view class
abstract class View {
    protected $model;
    
    public function __construct($model) {
        $this->model = $model;
    }
    
    abstract public function render();
}

// HTML View implementation
class HtmlView extends View {
    public function render() {
        $data = $this->model->getData();
        $output = "<h1>User List</h1>\n";
        $output .= "<table border='1'>\n";
        $output .= "<tr><th>ID</th><th>Name</th><th>Email</th><th>Type</th></tr>\n";
        
        foreach ($data as $user) {
            $output .= "<tr>";
            $output .= "<td>" . htmlspecialchars($user['id']) . "</td>";
            $output .= "<td>" . htmlspecialchars($user['name']) . "</td>";
            $output .= "<td>" . htmlspecialchars($user['email']) . "</td>";
            $output .= "<td>" . htmlspecialchars($user['type']) . "</td>";
            $output .= "</tr>\n";
        }
        
        $output .= "</table>";
        return $output;
    }
}

// JSON View implementation
class JsonView extends View {
    public function render() {
        return json_encode($this->model->getData(), JSON_PRETTY_PRINT);
    }
}

// Text View implementation
class TextView extends View {
    public function render() {
        $data = $this->model->getData();
        $output = "USER LIST\n";
        $output .= "=========\n\n";
        
        foreach ($data as $user) {
            $output .= "ID: " . $user['id'] . "\n";
            $output .= "Name: " . $user['name'] . "\n";
            $output .= "Email: " . $user['email'] . "\n";
            $output .= "Type: " . $user['type'] . "\n";
            $output .= "------------------------\n";
        }
        
        return $output;
    }
}

// Markdown View implementation (new for lab assignment)
class MarkdownView extends View {
    public function render() {
        $data = $this->model->getData();
        $output = "# User List\n\n";
        
        // Table header
        $output .= "| ID | Name | Email | Type |\n";
        $output .= "|:---|:-----|:------|:-----|\n";
        
        // Table rows
        foreach ($data as $user) {
            $output .= "| " . $user['id'] . " | ";
            $output .= $user['name'] . " | ";
            $output .= $user['email'] . " | ";
            $output .= $user['type'] . " |\n";
        }
        
        // Additional info in markdown format
        $output .= "\n## Summary\n\n";
        $output .= "Total users: **" . count($data) . "**\n\n";
        
        // Count users by type
        $types = array_count_values(array_column($data, 'type'));
        $output .= "### User Types:\n\n";
        
        foreach ($types as $type => $count) {
            $output .= "* **" . ucfirst($type) . "**: " . $count . "\n";
        }
        
        return $output;
    }
} 