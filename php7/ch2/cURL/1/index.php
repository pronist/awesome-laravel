<?php

/**
 * Classify Http methods
 */
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo filter_input(INPUT_GET, 'message');
        break;
    case 'POST':
        print_r($_POST);
        break;
    default:
        http_response_code(404);
}
