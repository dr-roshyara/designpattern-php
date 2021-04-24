<?php
/**
*@Definitions: Callback functions are passed as an argument to another function. To use a function as callback, you need to pass 
*a string containing the name of the function as an argument of the other function.  
*/
/**
*@param: string $item 
*@return : integer 
*/
  function stringLength($item){
  	return strlen($item);
  }

 $stringVec = ["Apple", "orange", "coconut","Aru"];
 $lengthVec =array_map('stringLength',$stringVec);
 print_r($lengthVec);
// one can also use  the function directly as anonymous function . 
 $lengthVec =array_map(function ($item){return strlen($item);}, $stringVec);
 
 /**
 *@param : string $item , function $lengthCalculator 
 *@return: void 
 */
 function printLength($item, $lengthCalculator){
 	echo "<p>The length of the string is: ".$lengthCalculator($item)."</p>";	
 }

 printLength("test",'stringLength');
//Inherting message form the parent scope 
$message = 'hello';

// No "use"
$dumpMessage = function () {
    var_dump($message);
};

 //execute the funtion 
$dumpMessage();

//inherit the $message inside the fucntion 
$dumpMessage = function () use($message){
    var_dump($message);
};

 //execute the funtion 
$dumpMessage();

// Inherit by-reference
$dumpMessage = function () use (&$message) {
	 $message .=" there!";
    var_dump($message);
};
$dumpMessage();
//look at the $message vairable itself  now . 
echo "<p>".$message."</p>";
//for more information loook at the the follwoing link 
echo 'For more information: <a href="https://www.php.net/functions.anonymous"> PHP.net Anonymous functions  </a>';

?>
