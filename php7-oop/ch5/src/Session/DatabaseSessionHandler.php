<?php

namespace Eclair\Session;

use Eclair\Database\Adaptor;

/* CREATE TABLE sessions (
    `id` VARCHAR(255) UNIQUE NOT NULL,
    `payload` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); */

class DatabaseSessionHandler implements \SessionHandlerInterface
{
    /**
     * SessionHandlerInterface::open
     *
     * @param string $savePath
     * @param string $sessionName
     *
     * @return bool
     */
    public function open($savePath, $sessionName)
    {
        return true;
    }

    /**
     * SessionHandlerInterface::close
     *
     * @return bool
     */
    public function close()
    {
        return true;
    }

    /**
     * SessionHandlerInterface::read
     *
     * @param string $id
     *
     * @return string
     */
    public function read($id)
    {
        $data = current(Adaptor::getAll('SELECT * FROM sessions WHERE `id` = ?', [ $id ]));

        if ($data) {
            $payload =  $data->payload;
        } else {
            Adaptor::exec('INSERT INTO sessions(`id`) VALUES(?)', [ $id ]);
        }
        return $payload ?? '';
    }

    /**
     * SessionHandlerInterface::write
     *
     * @param string $id
     * @param string $payload
     *
     * @return bool
     */
    public function write($id, $payload)
    {
        return Adaptor::exec('UPDATE sessions SET `payload` = ? WHERE `id` = ?', [ $payload, $id ]);
    }

    /**
     * SessionHandlerInterface::destroy
     *
     * @param string $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        return Adaptor::exec('DELETE FROM sessions WHERE `id` = ?', [ $id ]);
    }

    /**
     * SessionHandlerInterface::gc
     *
     * @param int $maxlifetime
     *
     * @return bool
     */
    public function gc($maxlifetime)
    {
        if ($sessions = Adaptor::getAll('SELECT * FROM sessions')) {
            foreach ($sessions as $session) {
                $timestamp = strtotime($session->created_at);
                if (time() - $timestamp > $maxlifetime) {
                    $this->destroy($session->id);
                }
            }
            return true;
        }
        return false;
    }
}
