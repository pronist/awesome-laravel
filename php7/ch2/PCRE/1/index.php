<?php

/**
 * String Match (Regex)
 *
 * Case 1. preg_match
 */

preg_match('/^(https?\:)\/\/(.*)(\..*)$/', 'http://example.com', $matches);

/**
 * Case 2. preg_match_all
 */
$html = <<<'HTML'
<section>
    <h1>Lorem Ipsum</h1>
    <article>
        <h2>What is Lorem Ipsum?</h2>
    </article>
</section>
HTML;

preg_match_all('/<(h[1-6])>(.*)<\/\\1>/', $html, $matches);

/**
 * Replace
 */
preg_replace('/^(.*)@(.*)$/', 'http://$2?user=$1', 'pronist@naver.com');
// preg_filter('/^(.*)@(.*)$/','http://$2?user=$1', 'pronist@naver.com');

preg_replace_callback(
    '/^(.*)@(.*)$/',
    function ($matches) {
        [, $username, $domain ] = $matches;
        return 'http://' . $domain . '?user=' . $username;
    },
    'pronist@naver.com'
);

/**
 * Filter
 */
preg_grep('/^(.*)@(.*)$/', [
    'php://stdout',
    'pronist@naver.com'
]);

/**
 * Escape regex string
 */
preg_quote('^().*$?:[]');
