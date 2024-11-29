<?php

/**
 * php_user_filter
 */
class StrToUpperFilter extends php_user_filter
{
    /**
     * @param resource $in
     * @param resource $out
     * @param int $consumed
     * @param bool $closing
     */
    public function filter($in, $out, &$consumed, $closing)
    {
        while ($bucket = stream_bucket_make_writeable($in)) {
            $bucket->data = strtoupper($bucket->data);
            $consumed += $bucket->datalen;
            stream_bucket_append($out, $bucket);
        }
        return PSFS_PASS_ON;
    }
}


$fp = fopen(dirname(__DIR__, 3) . '/README.md', 'r');
// stream_filter_append($fp, 'string.toupper');

stream_filter_register('str.toupper', 'StrToUpperFilter');
stream_filter_append($fp, 'str.toupper');

var_dump(stream_get_contents($fp));
