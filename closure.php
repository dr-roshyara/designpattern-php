
<?php
/*************************************************************************/
//In the follwoing we return a function and it 
/**
* @param int $x
*@return: closure fucntion with param int $y 
*/
 function getAdder($x) {
     return function ($y) use ($x) {
       // or: lexical $x;
       return $x + $y;
     };
   }

$cl =getAdder(2);
echo "<p> Closure function evalauation: ".$cl(3)."</p>";
echo '<p>For more informatoin check: <a href="https://wiki.php.net/rfc/closures">  Closure</a> </p>';
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