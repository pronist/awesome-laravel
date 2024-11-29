<?php

/**
 * Namespaces
 */

namespace A
{
    const MESSAGE = __NAMESPACE__;

    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }

    function foo()
    {
        return __FUNCTION__;
    }
}
namespace A\B
{
    class A
    {
        public function foo()
        {
            return __METHOD__;
        }
    }
}
namespace
{
    use A\A;
    use A\B\A as AB;
    use function A\foo;
    use const A\MESSAGE;

    // $a = new A();
    // $a = new AB();
    var_dump(MESSAGE);
}
