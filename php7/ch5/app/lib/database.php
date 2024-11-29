<?php

/**
 * Connect to MySQL database
 *
 * @param string $hostname
 * @param string $username
 * @param string $password
 * @param string $database
 *
 * @return object
 */
function connect($hostname, $username, $password, $database)
{
    return $GLOBALS['DB_CONNECTION'] = mysqli_connect($hostname, $username, $password, $database);
}

/**
 * Close MySQL database
 *
 * @return bool
 */
function close()
{
    if (array_key_exists('DB_CONNECTION', $GLOBALS) && $GLOBALS['DB_CONNECTION']) {
        return mysqli_close($GLOBALS['DB_CONNECTION']);
    }
    return false;
}

/**
 * get First
 *
 * @param object $conn
 * @param string $query
 * @param array $params
 *
 * @return mixed
 */
function first($query, ...$params)
{
    return raw($query, $params, function ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            if (is_array($row) && count($row) > 0) {
                return $row;
            }
        }
        return [];
    });
}

/**
 * get Rows
 *
 * @param object $conn
 * @param string $query
 * @param array $params
 *
 * @return array
 */
function rows($query, ...$params)
{
    return raw($query, $params, function ($result) {
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($rows, $row);
        }
        return $rows;
    });
}

/**
 * Execute a query
 *
 * @param object $conn
 * @param string $query
 * @param array $params
 *
 * @return bool
 */
function execute($query, ...$params)
{
    return raw($query, $params);
}

/**
 * Execute query raw
 *
 * @param string $query
 * @param string array
 * @param callback $callback
 *
 * @return mixed
 */
function raw($query, $params = [], $callback = null)
{
    if ($stmt = mysqli_prepare($GLOBALS['DB_CONNECTION'], $query)) {
        if (count($params) > 0) {
            $mappings = [
                'integer'   => 'i',
                'string'    => 's',
                'double'    => 'd'
            ];
            $bs = array_reduce($params, function ($bs, $arg) use ($mappings) {
                return $bs .= $mappings[gettype($arg)];
            });
            mysqli_stmt_bind_param($stmt, $bs, ...array_values($params));
        }
        if ($res = mysqli_stmt_execute($stmt)) {
            if (is_callable($callback)) {
                $res = call_user_func($callback, mysqli_stmt_get_result($stmt));
            }
        }
        mysqli_stmt_close($stmt);
    }
    return $res ?? false;
}
