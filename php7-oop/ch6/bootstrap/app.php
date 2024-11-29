<?php

return new Eclair\Application([
    \App\Providers\ErrorServiceProvider::class,
    \App\Providers\SessionServiceProvider::class,
    \App\Providers\DatabaseServiceProvider::class,
    \App\Providers\ThemeServiceProvider::class,
    \App\Providers\RouteServiceProvider::class
]);
