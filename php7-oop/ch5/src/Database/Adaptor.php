<?php

namespace Eclair\Database;

class Adaptor
{
    /**
     * @var \PDO $pdo
     */
    private static $pdo;

    /**
     * @var \PDOStatement $sth
     */
    private static $sth;

    /**
     * Create a new PDO Instance
     */
    public static function setup($dsn, $username, $password)
    {
        self::$pdo = new \PDO($dsn, $username, $password);
    }

    /**
     * Just Execute a Query
     *
     * @param string $query
     * @param array $params
     *
     * @return mixed
     */
    public static function exec($query, $params = [])
    {
        if (self::$sth = self::$pdo->prepare($query)) {
            return self::$sth->execute($params);
        }
    }

    /**
     * Get rows
     *
     * @param string $query
     * @param array $params
     *
     * @return mixed
     */
    public static function getAll($query, $params = [], $classname = 'stdClass')
    {
        if (self::exec($query, $params)) {
            return self::$sth->fetchAll(\PDO::FETCH_CLASS, $classname);
        }
    }
}
