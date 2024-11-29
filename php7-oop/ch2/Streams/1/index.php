<?php

/**
 * Stream Wrapper
 */
class StringStreamWrapper
{
    /**
     * @var array $varname
     */
    private $varname;

    /**
     * @var int $position
     */
    private $position;

    /**
     * streamWrapper::stream_opens
     *
     * @param string $path
     * @param string $mode
     * @param int $options
     * @param string $opened_path
     *
     * @return bool
     */
    public function stream_open($path, $mode, $options, &$opened_path)
    {
        [ 'host' => $varname ] = parse_url($path);
        $this->varname = $varname;
        $this->position = strlen($GLOBALS[$this->varname]);

        return true;
    }

    /**
     * streamWrapper::stream_write
     *
     * @param string $data
     *
     * @return int
     */
    public function stream_write($data)
    {
        $GLOBALS[$this->varname] .= $data;
        $this->position += strlen($data);

        return strlen($data);
    }

    /**
     * streamWrapper::stream_read
     *
     * @param int $count
     *
     * @return string
     */
    public function stream_read($count)
    {
        $res = substr($GLOBALS[$this->varname], $this->position, $count);
        $this->position += strlen($res);

        return $res;
    }

    /**
     * streamWrapper::stream_tell
     *
     * @return int
     */
    public function stream_tell()
    {
        return $this->position;
    }

    /**
     * streamWrapper::stream_eof
     *
     * @return bool
     */
    public function stream_eof()
    {
        return $this->position >= strlen($GLOBALS[$this->varname]);
    }

    /**
     * streamWrapper::stream_seek
     */
    public function stream_seek($offset, $whence)
    {
        switch ($whence) {
            case SEEK_SET:
                $this->position = $offset;
                break;
        }
        return true;
    }
}

stream_wrapper_register('string', 'StringStreamWrapper');

$message = null;
$fp = fopen('string://message', 'r');

fwrite($fp, "Hello, world\n");
fwrite($fp, "Bye\n");

rewind($fp);

while ((! feof($fp)) && ($row = fgets($fp))) {
    echo $row;
}

var_dump($message);
