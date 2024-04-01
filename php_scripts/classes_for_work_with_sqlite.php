<?php

//require ROOTDIR . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'configs.php';

class SqliteConnection
{
    private $pdo;

    public function connect()
    {
        if ($this->pdo == null) {
            // $this->pdo = new \PDO('sqlite:'.Config::PATH_TO_SQLITE_FILE);
            $this->pdo = new \PDO('sqlite:'.PATH_TO_SQLITE_FILE);
        }

        return $this->pdo;
    }
}
class SqliteCreateTable
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTables()
    {
        $this->pdo->exec('CREATE TABLE IF NOT EXISTS recall (
                        ID INTEGER PRIMARY KEY AUTOINCREMENT  NOT NULL,
                        client_name VARCHAR( 50 ) default NULL,
                        phone_number VARCHAR( 20 ) NOT NULL,
                        client_send VARCHAR( 300 ) default NULL,
                        date_time DATETIME NOT NULL,
                        recall INTEGER
                      )');
    }
}

class SqliteInsert
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertCall($phone_number, $client_name, $client_send)
    {
        $dt = date('Y-m-d H:i:s');
        $recall = 0;

        $sql = 'INSERT INTO recall(client_name,phone_number,client_send,date_time,recall) '
                .'VALUES(:client_name,:phone_number,:client_send,:date_time,:recall)';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':client_name' => $client_name,
            ':phone_number' => $phone_number,
            ':client_send' => $client_send,
            ':date_time' => $dt,
            ':recall' => $recall,
        ]);

        return $this->pdo->lastInsertId();
    }
}

class SqliteQuery
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllRecall()
    {
        $stmt = $this->pdo->query('SELECT ID, client_name, phone_number, client_send, date_time, recall FROM recall');
        $recall = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $recall[] = [
                'ID' => $row['id'],
                'client_name' => $row['client_name'],
                'phone_number' => $row['phone_number'],
                'client_send' => $row['client_send'],
                'date_time' => $row['date_time'],
                'recall' => $row['recall'],
            ];
        }

        return $recall;
    }

    public function getNoRecall()
    {
        $stmt = $this->pdo->query('SELECT client_name, phone_number, client_send, date_time FROM `recall` WHERE (recall = "" OR recall = 0 OR recall IS NULL) ORDER BY date_time ASC');
        $recall = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $recall[] = [
                'client_name' => $row['client_name'],
                'phone_number' => $row['phone_number'],
                'client_send' => $row['client_send'],
                'date_time' => $row['date_time'],
            ];
        }

        return $recall;
    }
}
