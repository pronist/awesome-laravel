<?php

/**
 * Exception extends
 */
class MyException extends Exception
{
}

try {
    throw new MyException('Hello, world');
} catch (MyException $e) {
    var_dump(MyException::class);
} catch (Exception $e) {
    var_dump(Exception::class);
}
