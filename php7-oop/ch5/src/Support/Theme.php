<?php

namespace Eclair\Support;

class Theme
{
    /**
     * @var string $layout
     */
    private static $layout;

    /**
     * Set a layout
     *
     * @param string $layout
     *
     * @return void
     */
    public static function setLayout($layout)
    {
        self::$layout = $layout;
    }

    /**
     * View
     *
     * @param string $view
     * @param array $vars
     *
     * @return mixed
     */
    public static function view($view, $vars = [])
    {
        foreach ($vars as $name => $value) {
            $$name = $value;
        }
        return require_once self::$layout;
    }
}
