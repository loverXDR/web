<?php

require_once 'Model.php';
require_once 'View.php';

class Controller {
    private $model;
    private $view;
    
    public function __construct($model) {
        $this->model = $model;
    }
    
    public function setView($view) {
        $this->view = $view;
    }
    
    public function getView() {
        return $this->view;
    }
    
    public function getModel() {
        return $this->model;
    }
    
    public function displayOutput() {
        if ($this->view) {
            return $this->view->render();
        }
        return "No view has been set.";
    }
}

class UserController extends Controller {
    public function __construct() {
        parent::__construct(new UserModel());
    }
    
    public function displayHtml() {
        $this->setView(new HtmlView($this->getModel()));
        return $this->displayOutput();
    }
    
    public function displayJson() {
        $this->setView(new JsonView($this->getModel()));
        return $this->displayOutput();
    }
    
    public function displayText() {
        $this->setView(new TextView($this->getModel()));
        return $this->displayOutput();
    }
    
    public function displayMarkdown() {
        $this->setView(new MarkdownView($this->getModel()));
        return $this->displayOutput();
    }
} 