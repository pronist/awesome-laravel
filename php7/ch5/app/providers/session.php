<?php

/**
 * Start a Session
 */

ini_set('session.gc_maxlietime', config('session.lifetime'));
session_set_cookie_params(config('session.lifetime'));

session_save_path(config('session.path'));

return session_start();
