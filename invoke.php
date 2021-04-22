<?php
/*************************************************************************/
//Reflection method
class Example {
  static function printer () { echo "Hello World!\n"; }
}
 
$class = new ReflectionClass ('Example');
$method = $class->getMethod ('printer');
$closure = $method->getClosure ();
echo $closure ();

$closure = function ($a, &$b, $c = null) { };
$m = new ReflectionMethod ($closure, '__invoke');
//Reflection::export ($m);
// $m = new ReflectionMethod ($closure(2,3,3));
// $p = new ReflectionParameter ($closure, 0);
// $p = new ReflectionParameter ($closure, 'a');
// $p = new ReflectionParameter (array ($closure, '__invoke'), 0);
/*************************************************************************/

?>