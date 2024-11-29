<?php

/**
 * Named Params
 */
function sendMessage(string $to, int|string $message = 'Hello, world', int $destination = 1) {}

sendMessage('pronist@naver.com', destination: 3);
sendMessage(to: 'pronist@naver.com', destination: 3);
sendMessage('pronist@naver.com', '', 2);

// sendMessage(destination: 3, 'pronist@naver.com'); // -> ERROR
