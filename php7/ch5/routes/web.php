<?php

return [
    [ '/', 'get', 'index.index' ],
    [ '/auth/login', 'get', 'auth.showLoginForm' ],
    [ '/auth/login', 'post', 'auth.login' ],
    [ '/auth/logout', 'get', 'auth.logout' ],
    [ '/post/write', 'get', 'post.create' ],
    [ '/post/write', 'post', 'post.store' ],
    [ '/post/read', 'get', 'post.show' ],
    [ '/post/update', 'get', 'post.edit' ],
    [ '/post/update', 'post', 'post.update' ],
    [ '/post/delete', 'get', 'post.destory' ],
    [ '/user/register', 'get', 'user.create' ],
    [ '/user/register', 'post', 'user.store' ],
    [ '/user/update', 'get', 'user.edit' ],
    [ '/user/update', 'post', 'user.update' ]
];
