<?php
// Подключаем класс для работы с новостями
require_once "NewsDB.class.php";

// Создаем объект для работы с новостями
$news = new NewsDB();

// Переменная для хранения сообщений об ошибках
$errMsg = "";

// Проверяем запрос на удаление новости
if (isset($_GET['del'])) {
    require "delete_news.inc.php";
}

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "save_news.inc.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8">
  <style>
    :root {
      --primary-color: #4a6da7;
      --secondary-color: #5d93bb;
      --accent-color: #f0ad4e;
      --text-color: #333;
      --light-bg: #f8f9fa;
      --border-color: #ddd;
      --shadow-color: rgba(0, 0, 0, 0.1);
      --success-color: #28a745;
      --error-color: #dc3545;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f5f5f5;
      color: var(--text-color);
      line-height: 1.6;
    }
    
    h1, h2 {
      color: var(--primary-color);
      border-bottom: 2px solid var(--border-color);
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    
    /* Стили для формы */
    form {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px var(--shadow-color);
      margin-bottom: 30px;
    }
    
    input[type="text"], textarea, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid var(--border-color);
      border-radius: 4px;
      font-family: inherit;
      font-size: 1rem;
    }
    
    input[type="submit"] {
      background-color: var(--accent-color);
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }
    
    input[type="submit"]:hover {
      background-color: #e09a3c;
    }
    
    /* Стили для новостей */
    .news-container {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    
    .news-item {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px var(--shadow-color);
    }
    
    .news-item h3 {
      color: var(--primary-color);
      margin-top: 0;
      margin-bottom: 10px;
    }
    
    .news-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 10px;
      font-size: 0.9rem;
      color: #666;
    }
    
    .news-text {
      margin-bottom: 15px;
    }
    
    .news-actions {
      text-align: right;
    }
    
    .delete-button {
      background-color: var(--error-color);
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 4px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
    
    .delete-button:hover {
      background-color: #bd2130;
    }
    
    /* Стили для сообщений */
    .error-message {
      background-color: var(--error-color);
      color: white;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h1>Последние новости</h1>
  
  <?php
  // Выводим сообщение об ошибке, если оно есть
  if (!empty($errMsg)) {
      echo "<div class='error-message'>{$errMsg}</div>";
  }
  
  // Выводим новости
  require "get_news.inc.php";
  ?>
  
  <h2>Добавить новость</h2>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    Заголовок новости:<br>
    <input type="text" name="title"><br>
    Выберите категорию:<br>
    <select name="category">
    <?php
    // Iterate over the NewsDB object (using its IteratorAggregate implementation)
    // $news is already instantiated at the top of the file
    foreach ($news as $id => $name) {
        echo "<option value=\"{$id}\">{$name}</option>\n";
    }
    ?>
    </select>
    <br />
    Текст новости:<br>
    <textarea name="description" cols="50" rows="5"></textarea><br>
    Источник:<br>
    <input type="text" name="source"><br>
    <br>
    <input type="submit" value="Добавить!">
  </form>
</body>
</html>