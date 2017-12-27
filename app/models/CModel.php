<?php

namespace app\models;
use PDO;

class  CModel{

    /**
     * CModel constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->connection($config);
    }

    private $pdo = null;
    public $tableName = '';
    public $limit = 5;
    public $order = '';

    /**
     * @param int $p
     * @return array
     */
    public function getAll($p=1){

        $p = $p - 1;

        $offset = $p*$this->limit;
        $stmt = $this->pdo->query('SELECT * FROM '.$this->tableName.' ORDER BY '.$this->order.' DESC LIMIT '.$this->limit.' OFFSET '.$offset);


        $res = [];
        while ($row = $stmt->fetch())
        {
            $res[] = $row;
        }

        return $res;
    }

    /**
     * @return int
     */
    public function getCount(){
        $stmt = $this->pdo->query('SELECT COUNT(*) as count FROM '.$this->tableName.' ORDER BY '.$this->order);

        $count = 0;

        if ($row = $stmt->fetch())
        {
            $count = $row['count'];
        }

        return $count;
    }


    /**
     * @param $id
     * @return null
     */
    public function getOne($id){
        $stmt = $this->pdo->prepare('SELECT * FROM '.$this->tableName.' WHERE id=?');
        $stmt->execute(array($id));
        if ($row = $stmt->fetch())
        {
            return $row;
        }
        return null;
    }

    /**
     * @param $config
     */
    private function connection($config){



        $host = $config['BD']['host'];
        $db   = $config['BD']['db'];
        $user = $config['BD']['user'];
        $pass = $config['BD']['pass'];
        $charset = $config['BD']['charset'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo =  new PDO($dsn, $user, $pass, $opt);
    }




}