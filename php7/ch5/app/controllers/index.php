<?php

/**
 * Show Posts (GET)
 *
 * @param int $page
 */
function index($page = 0)
{
    return view('index', [
        'posts' => getPosts(filter_var($page, FILTER_VALIDATE_INT), 3)
    ]);
}
