<?php
/*************************************************************************/
//Invoke method is a magic method in php. It is defined as the constructor and you can invod
class InvokeExample {
  public function __invoke () {
    echo "Hello World!\n";
  }
}
$invx = new InvokeExample;
echo $invx ();
//


//Reflection method
class ReflexionExample {
  static function printHello () { echo "<br> Hello World, Here is ReflexionExample!\n"; }
}
 
$class = new ReflectionClass ('ReflexionExample');
$method = $class->getMethod ('printHello');
$closure = $method->getClosure ();
echo $closure ();

//Reflection::export ($m);
// $m = new ReflectionMethod ($closure(2,3,3));
// $p = new ReflectionParameter ($closure, 0);
// $p = new ReflectionParameter ($closure, 'a');
// $p = new ReflectionParameter (array ($closure, '__invoke'), 0);
/*************************************************************************/

?>