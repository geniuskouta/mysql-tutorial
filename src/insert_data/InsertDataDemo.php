<?php

class InsertDataDemo
{
    const DB_HOST = '192.168.99.100';
    const DB_NAME = 'sample';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';

    private $pdo = null;

    /**
     * Open the database connection
     */

    public function __construct()
    {
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $pe) {
            die($pe->getMessage());
        }
    }

    /**
     * Insert a row into a table
     * @return
     */

    public function insert()
    {
        $sql = "INSERT INTO tasks (
                      subject,
                      description,
                      start_date,
                      end_date
                  )
                  VALUES (
                      'Learn PHP MySQL Insert Dat',
                      'PHP MySQL Insert data into a table',
                      '2013-01-01',
                      '2013-01-01'
                  )";
        return $this->pdo->exec($sql);
    }
}
