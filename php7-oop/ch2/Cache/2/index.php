<?php

/* CREATE TABLE cache(
    `key` VARCHAR(255) PRIMARY KEY,
    `value` TEXT NOT NULL,
    `expiration` INT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); */

/**
 * MySQL Backend Cache
 */
interface CacheHandlerInterface
{
    public function put(string $key, string $value, int $expiration = null): bool;
    public function get(string $key, Closure $callback = null);
    public function forget(string $Key): bool;
    public function refresh(): bool;
}

class DatabaseCacheHandler implements CacheHandlerInterface
{
    /**
     * @var PDO $pdo
     */
    private PDO $pdo;

    /**
     * Create a Cache Instance
     *
     * @param PDO $driver
     *
     * @return DatabaseCacheHandler
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Store Cache value with key
     *
     * @param string $key
     * @param string $value
     * @param int $expiration
     *
     * @return bool
     */
    public function put(string $key, string $value, int $expiration = null): bool
    {
        return $this->pdo->prepare('INSERT INTO cache(`key`, `value`, `expiration`) VALUES(?, ?, ?)')->execute([ $key, $value, $expiration ]);
    }

    /**
     * Cache value by key
     *
     * @param string $key
     * @param Closure $callback
     */
    public function get(string $key, Closure $callback = null)
    {
        $sth = $this->pdo->prepare('SELECT * FROM cache WHERE `key` = ?');

        if ($sth->execute([ $key ]) && $row = $sth->fetchObject()) {
            return $row->value;
        }
        return $callback ? call_user_func($callback) : null;
    }

    /**
     * Remove Cache value by key
     *
     * @param string $key
     *
     * @return bool
     */
    public function forget(string $key): bool
    {
        return $this->pdo->prepare('DELETE FROM cache WHERE `key` = ?')->execute([ $key ]);
    }

    /**
     * Refresh
     */
    public function refresh(): bool
    {
        $sth = $this->pdo->prepare('SELECT * FROM cache');

        if ($sth->execute()) {
            while ($row = $sth->fetchObject()) {
                $timestamp = strtotime($row->created_at);
                if ($row->expiration) {
                    if (time() - $timestamp > $row->expiration) {
                        $this->forget($row->key);
                    }
                }
            }
            return true;
        }
        return false;
    }
}

class Cache
{
    /**
     * @var CacheHandlerInterface $handler
     */
    private CacheHandlerInterface $handler;

    /**
     * Create a new Cache Instance
     *
     * @param CacheHandlerInterface $handler
     */
    public function __construct(CacheHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param string $name
     * @param array $args
     */
    public function __call($name, $args)
    {
        return $this->handler->$name(...$args);
    }
}

$databaseCacheHandler = new DatabaseCacheHandler(new PDO('mysql:dbname=myapp_test;host=127.0.0.1;', 'root', 'root'));
$cache = new Cache($databaseCacheHandler);

$cache->put('message', 'Hello, world');
$cache->put('foo', serialize(new stdClass()), 10);

$cache->refresh();

var_dump($cache->get('message'));
