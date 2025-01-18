<?php
// Task.php

class Task {
    private $title;         // Название задачи
    private $description;   // Описание задачи
    private $status;        // Статус задачи (по умолчанию "Не выполнено")

    // Конструктор класса, принимает название и описание задачи
    public function __construct($title, $description) {
        $this->title = $title;
        $this->description = $description;
        $this->status = "Не выполнено"; // Изначально задача не выполнена
    }

    // Деструктор, выводит сообщение при удалении объекта
    public function __destruct() {
        echo "Задача '{$this->title}' была удалена из памяти.\n";
    }

    // Магический метод для обработки вызова несуществующих методов
    public function __call($method, $arguments) {
        if (strpos($method, 'set') === 0) { // Если метод начинается с 'set'
            $property = lcfirst(substr($method, 3)); // Получаем имя свойства
            if (property_exists($this, $property)) {
                $this->$property = $arguments[0]; // Устанавливаем значение свойства
            }
        } elseif (strpos($method, 'get') === 0) { // Если метод начинается с 'get'
            $property = lcfirst(substr($method, 3)); // Получаем имя свойства
            if (property_exists($this, $property)) {
                return $this->$property; // Возвращаем значение свойства
            }
        }
    }

    // Магический метод для строкового представления объекта
    public function __toString() {
        return "Задача: {$this->title} — {$this->status}";
    }
}
?>
