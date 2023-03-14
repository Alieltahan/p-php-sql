<?php
/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

// Connect to our MySql DB
class Database
{
    public PDO $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * @param string $query
     * @param array $params
     * @return Database
     */
    public function query(string $query, array $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAll () {
        return $this->statement->fetchAll();
    }

    /**
     * @return mixed
     */
    public function find()
    {
        return $this->statement->fetch();
    }

    /**
     * @return mixed
     */
    public function fetchOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
}
