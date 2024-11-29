<?php

/**
 * Socket Server
 */

$server = stream_socket_server('tcp://127.0.0.1:8000', $errno, $errstr);

/**
 * Listening
 */
while ($sock = stream_socket_accept($server)) {
    /**
     * get Client name
     */
    stream_socket_get_name($sock, true);

    /**
     * Send data to client
     */
    // stream_socket_sendto($sock, "Hello, world from Server");
    fwrite($sock, 'Hello, world from Server', 1024);

    /**
     * get Data from client
     */
    // stream_socket_recvfrom($sock, 1024);
    fread($sock, 1024);

    /**
     * Close Connection
     */
    fclose($sock);
}

/**
 * Close socket server
 */
fclose($server);
