<?php
// Project.php

class Project {
    private $name;   // Название проекта
    private $tasks;  // Массив задач в проекте

    // Конструктор класса, принимает название проекта
    public function __construct($name) {
        $this->name = $name;
        $this->tasks = []; // Изначально массив задач пустой
    }

    // Деструктор, выводит сообщение при завершении проекта
    public function __destruct() {
        echo "Проект '{$this->name}' был завершен.\n";
    }

    // Метод для добавления задачи в проект
    public function addTask(Task $task) {
        $this->tasks[] = $task; // Добавляем задачу в массив задач
    }

    // Магический метод для строкового представления объекта
    public function __toString() {
        return "Проект: {$this->name}, Количество задач: " . count($this->tasks);
    }
}
?>
