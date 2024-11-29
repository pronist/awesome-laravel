<?php

/**
 * Socket Client
 */

$sock = stream_socket_client('tcp://127.0.0.1:8000', $errno, $errstr);

// Send data to Server

// stream_socket_sendto($sock, "Hello, world");
fwrite($sock, 'Hello, world', 1024);

/**
 * Get data from Server
 */
// stream_socket_recvfrom($sock, 1024);
fread($sock, 1024);

/**
 * Close a client
 */
fclose($sock);
