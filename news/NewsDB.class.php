<?php
require_once "INewsDB.class.php";

/**
 * Class NewsDB
 * Реализует интерфейс INewsDB для работы с новостной лентой
 * Хранит новости в базе данных SQLite
 */
class NewsDB implements INewsDB {
    
    // Константа с именем базы данных
    const DB_NAME = __DIR__ . '/news.db';
    
    // Закрытое свойство для хранения экземпляра класса SQLite3
    private $_db;
    
    /**
     * Геттер для свойства $_db
     * 
     * @return SQLite3
     */
    protected function getDb() {
        return $this->_db;
    }
    
    /**
     * Конструктор класса
     * Устанавливает соединение с базой данных
     */
    function __construct() {
        // Проверяем, существует ли файл базы данных
        $isNew = !file_exists(self::DB_NAME);
        
        // Устанавливаем соединение или создаем новую БД
        $this->_db = new SQLite3(self::DB_NAME);
        
        // Если база данных новая, создаем таблицы
        if ($isNew) {
            // Чтение файла SQL-запросов
            $sqlContent = file_get_contents(__DIR__ . '/news.txt');
            
            // SQL-запрос для создания таблицы msgs
            $createMsgsTable = "CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
            )";
            
            // SQL-запрос для создания таблицы category
            $createCategoryTable = "CREATE TABLE category(
                id INTEGER,
                name TEXT
            )";
            
            // SQL-запрос для заполнения таблицы category
            $fillCategoryTable = "INSERT INTO category(id, name)
            SELECT 1 as id, 'Политика' as name
            UNION SELECT 2 as id, 'Культура' as name
            UNION SELECT 3 as id, 'Спорт' as name";
            
            // Выполняем запросы
            $this->_db->exec($createMsgsTable);
            $this->_db->exec($createCategoryTable);
            $this->_db->exec($fillCategoryTable);
        }
    }
    
    /**
     * Деструктор класса
     * Закрывает соединение с базой данных
     */
    function __destruct() {
        if ($this->_db)
            $this->_db->close();
    }
    
    /**
     * Добавление новой записи в новостную ленту
     * 
     * @param string $title - заголовок новости
     * @param string $category - категория новости
     * @param string $description - текст новости
     * @param string $source - источник новости
     * 
     * @return boolean - результат успех/ошибка
     */
    function saveNews($title, $category, $description, $source) {
        $dt = time(); // Текущее время в формате UNIX TIMESTAMP
        
        // Подготавливаем запрос на вставку данных
        $stmt = $this->_db->prepare("INSERT INTO msgs (title, category, description, source, datetime) 
                                   VALUES (:title, :category, :description, :source, :datetime)");
        
        // Привязываем параметры
        $stmt->bindParam(':title', $title, SQLITE3_TEXT);
        $stmt->bindParam(':category', $category, SQLITE3_INTEGER);
        $stmt->bindParam(':description', $description, SQLITE3_TEXT);
        $stmt->bindParam(':source', $source, SQLITE3_TEXT);
        $stmt->bindParam(':datetime', $dt, SQLITE3_INTEGER);
        
        // Выполняем запрос
        $result = $stmt->execute();
        
        // Возвращаем результат операции
        return $result !== false;
    }
    
    /**
     * Выборка всех записей из новостной ленты
     * 
     * @return array - результат выборки в виде массива
     */
    function getNews() {
        // Запрос на выборку всех новостей с информацией о категории
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime 
                FROM msgs, category 
                WHERE category.id = msgs.category 
                ORDER BY msgs.id DESC";
        
        $result = $this->_db->query($sql);
        
        // Проверяем успешность выполнения запроса
        if (!$result) 
            return false;
        
        // Формируем массив с результатами
        $items = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $items[] = $row;
        }
        
        return $items;
    }
    
    /**
     * Удаление записи из новостной ленты
     * 
     * @param integer $id - идентификатор удаляемой записи
     * 
     * @return boolean - результат успех/ошибка
     */
    function deleteNews($id) {
        // Подготавливаем запрос на удаление
        $stmt = $this->_db->prepare("DELETE FROM msgs WHERE id = :id");
        
        // Привязываем параметр
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        
        // Выполняем запрос
        $result = $stmt->execute();
        
        // Возвращаем результат операции
        return $result !== false;
    }
}
?>
