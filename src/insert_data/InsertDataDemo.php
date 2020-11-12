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

    /**
     * Insert a new task into the tasks table
     * @param string $subject
     * @param string $description
     * @param string $startDate
     * @param string $endDate
     * @return mixed returns false on failure 
     */

    public function insertSingleRow($subject, $description, $startDate, $endDate)
    {
        $task = array(
            ':subject' => $subject,
            ':description' => $description,
            ':start_date' => $startDate,
            ':end_date' => $endDate
        );

        $sql = 'INSERT INTO tasks (
                subject,
                description,
                start_date,
                end_date
            )
            VALUES (
                :subject,
                :description,
                :start_date,
                :end_date
            );';
    /*
        prevents sql injection
        https://www.php.net/manual/en/pdo.prepare.php#:~:text=PDO%3A%3Aprepare%20%E2%80%94%20Prepares%20a,and%20returns%20a%20statement%20object
    */
        $q = $this->pdo->prepare($sql);

        return $q->execute($task);
    }
}
