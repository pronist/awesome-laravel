<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

session_unset();
session_destroy();

return header('Location: /');
