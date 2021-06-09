<?php

abstract class DatabaseConnection
{
    protected $database;

    private $host = 'localhost';
    private $dbName = 'businesscase';
    private $username = 'root';
    private $password = '';

    public function __construct()
    {
        try {
            $this->database = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->username,
                $this->password);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            die('Erreur ' . $e->getMessage());
        }
    }


}