<?php

namespace App\Controllers;

use Eclair\Support\Theme;
use App\Services\IndexService;

class IndexController
{
    /**
     * Show Posts (GET)
     *
     * @param int $page
     */
    public static function index()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 0;

        return Theme::view('index', [
            'posts' => IndexService::getPosts($page, 3)
        ]);
    }
}
