<?php

/**
 * Classes Autoloading (PSR-4)
 */

// include './Classes/MyClass.php';

use Classes\MyClass;

spl_autoload_register(function ($classname) {
    include $classname . '.php';
});

new MyClass();

// var_dump(spl_autoload_functions());
foreach (spl_autoload_functions() as $function) {
    spl_autoload_unregister($function);
}
