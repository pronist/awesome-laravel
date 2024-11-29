<?php

/* CREATE TABLE sessions(
    `id` VARCHAR(255) UNIQUE NOT NULL,
    `payload` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); */

// ini_set('session.gc_maxlifetime', 10);

/**
 * Session Handler Interface
 */
class DatabaseSessionHandler implements SessionHandlerInterface
{
    /**
     * @var PDO $pdo
     */
    private PDO $pdo;

    /**
     * Create a new DatabaseSessionHandler
     *
     * @return DatabaseSessionHandler
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Open Session
     *
     * @param string $save_path
     * @param string $session_name
     *
     * @return bool
     */
    public function open($save_path, $session_name)
    {
        return true;
    }

    /**
     * read session payload
     *
     * @param string $session_id
     *
     * @return string
     */
    public function read($session_id)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions WHERE `id` = :id');
        if ($sth->execute([ ':id' => $session_id ])) {
            if ($sth->rowCount() > 0) {
                $payload = $sth->fetchObject()->payload;
            } else {
                $this->pdo->prepare('INSERT INTO sessions(`id`) VALUES(:id)')->execute([ ':id' => $session_id ]);
            }
        }
        return $payload ?? '';
    }

    /**
     * write session data
     *
     * @param string $session_id
     * @param string $session_data
     *
     * @return bool
     */
    public function write($session_id, $session_data)
    {
        return $this->pdo->prepare('UPDATE sessions SET `payload` = :payload WHERE `id` = :id')->execute([ ':payload' => $session_data, ":id" => $session_id ]);
    }

    /**
     * run Session GC
     *
     * @param int $maxlifetime
     *
     * @return bool
     */
    public function gc($maxlifetime)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions');
        if ($sth->execute()) {
            while ($row = $sth->fetchObject()) {
                $timestamp = strtotime($row->created_at);
                if (time() - $timestamp > $maxlifetime) {
                    $this->destroy($row->id);
                }
            }
            return true;
        }
        return false;
    }

    /**
     * destroy Session
     *
     * @param string $session_id
     *
     * @return bool
     */
    public function destroy($session_id)
    {
        return $this->pdo->prepare('DELETE FROM sessions WHERE `id` = :id')->execute([ ':id' => $session_id ]);
    }

    /**
     * close Session
     *
     * @return bool
     */
    public function close()
    {
        return true;
    }
}

session_set_save_handler(new DatabaseSessionHandler(new PDO('mysql:dbname=myapp_test;host=127.0.0.1;', 'root', 'root')));

session_start();

$_SESSION['message'] = 'Hello, world';
$_SESSION['foo'] = new stdClass();

// session_gc();
