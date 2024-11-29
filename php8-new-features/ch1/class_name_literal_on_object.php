<?php

/**
 * Class name literal on object
 */
class A {}

var_dump((new A())::class); // -> A
