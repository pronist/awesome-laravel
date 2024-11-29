<?php

/**
 * Connection.
 */

$conn = mysqli_connect(
    'localhost',
    'root',
    'root',
    'myapp_test'
);

/**
 * Query.
 */

// Case 1. mysqli_query.
$queryString = 'CREATE TABLE tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255)
)';

mysqli_query($conn, $queryString);

/**
 * Case 2. mysqli_prepare.
 */
mysqli_autocommit($conn, false);

$stmt = mysqli_prepare($conn, 'INSERT INTO tests(message) VALUES(?)');

$params = [ 'Hello, world' ];

mysqli_stmt_bind_param($stmt, 's', ...$params);
mysqli_stmt_execute($stmt);

mysqli_rollback($conn);

/**
 * Select.
 */
$stmt = mysqli_prepare($conn, 'SELECT message FROM tests');
mysqli_stmt_execute($stmt);

// Case 1. mysqli_stmt_get_result

// $result = mysqli_stmt_get_result($stmt);
// while ($row = mysqli_fetch_assoc($result)) {
//     var_dump($row);
// }

// Case 2. mysqli_stmt_fetch
mysqli_stmt_bind_result($stmt, $message);
while ($row = mysqli_stmt_fetch($stmt)) {
    var_dump($message);
}

/**
 * Close connection.
 */
mysqli_query($conn, 'DROP TABLE tests');
mysqli_close($conn);
