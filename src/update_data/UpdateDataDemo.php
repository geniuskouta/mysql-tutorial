<?php

/**
 * PHP MySQL Update data demo
 */
class UpdateDataDemo {

    const DB_HOST = '192.168.99.100';
    const DB_NAME = 'sample';
    const DB_USER = 'root';
    const DB_PASSWORD = 'root';

    /**
     * PDO instance
     * @var PDO
     */
    private $pdo = null;

    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $connStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($connStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Update an existing task in the tasks table
     * @param string $subject
     * @param string $description
     * @param string $startDate
     * @param string $endDate
     * @return bool return true on success or false on failure
     */
    public function update($id, $subject, $description, $startDate, $endDate) {
        $task = [
            ':taskid' => $id,
            ':subject' => $subject,
            ':description' => $description,
            ':start_date' => $startDate,
            ':end_date' => $endDate];


        $sql = 'UPDATE tasks
                    SET subject      = :subject,
                         start_date  = :start_date,
                         end_date    = :end_date,
                         description = :description
                  WHERE task_id = :taskid';

        $q = $this->pdo->prepare($sql);

        return $q->execute($task);
    }

    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }

}
