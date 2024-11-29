<?php

/**
 * Auth guard
 */

return guard([
    '/user/update',
    '/post/write',
    '/post/update',
    '/post/delete'
]) ?: reject("/auth/login");
