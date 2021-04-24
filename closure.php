
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

?>