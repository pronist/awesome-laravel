<?php

/**
 * Upload a Image (POST)
 */
function store()
{
    $file = $_FILES['upload'];
    echo uploadImage(
        $file,
        config('image.accepts'),
        $_SESSION['user']['id'] . "_" . time() . "_" . hash('md5', $file['name'])
    );
}

/**
 * Get a Image (GET)
 *
 * @param string $path
 */
function show($path)
{
    echo getImage(realpath(config('image.path') . basename($path)));
}
