<?php

/**
 * File Uploads.
 *
 * php.ini
 *
 * file_uploads
 */
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo <<<'HTML'
<form action="/" method='POST' enctype="multipart/form-data">
    <input type="file" name="uploads">
    <input type="submit">
</form>
HTML;
        break;
    case 'POST':
        $file = $_FILES['uploads'];
        $pathinfo = pathinfo($file['name']);
        $accepts = [
            'png', 'jpg'
        ];
        if (in_array(strtolower($pathinfo['extension']), $accepts) && is_uploaded_file($file['tmp_name'])) {
            move_uploaded_file($file['tmp_name'], dirname(__FILE__) . '/uploads/' . $file['name']);
        }
        break;
    default:
        http_response_code(404);
}
