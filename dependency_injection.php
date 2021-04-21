<?php
 /***
    *Author: Dr. N. Roshyara 
    *About: Simple example Dependency Injection in PHP 
    *Description: Dependency injection in php helps us to sperate the dependent codes (objects) and let us reuse them again and 
    *again. Not only that , it also helps us to test the code easily. 
    *First use: 	 Decoupling
    *Second use:	 Reuse of Code 
	*Third use: 	 Easy testing 
	*The most popular form of dependency injection is ,,constructor injection". That means you inject the dependent object through *constructor.  This away, your code is clean and decoupled.   
	*/
	$_SESSION['language'] ='de';
	$user_language 		  =$_SESSION['language'];
	class SessionStorage {
		function __construct ($cookieName ='PHP_SESS_ID'){
			session_name($cookieName);
			session_start();
		}
		/**
		 *return: void 
		*/
		function set($key, $value){
			$_SESSION[$key]=$value;
		}
		/**
		* return: string 
		*/
		function get($key){
			return $_SESSION[$key];
		}
		//....
	}
   /**
    *User class 
   */
   class User {
   	protected $storage ; 
   	/**
   	* Here we use dependency injection. 
   	* With the follwoing constructor injection, we can inject any storage object.
   	*
   	function __construct$storage =null){
   		if($storage=null){
   			this.storage = new SessionStorage();
   		}else{
			 
			 $this->storage = $storage; 

   		}
   	}
   	/***
   	* return : void 
   	*/
   	function setLanguage($language){
   		$this->storage->set('language', $language);
   	}
   	/***
   	* return: string
   	*/
   	 function getLanguage(){
   	 	return $this->storage->get('language');
   	 }
   	 //....

   }
   //use the code now 
   $storage =new SessionStorage('SESSION_ID');
   $user 	=new User($storage);
   /**
   **In above code, we can replace one storage object with the other and  we dont have to change anything in  the user class . 
   *This is called seperation of concerns. 
   ** 
   */
   //if you want to have a setter injection then you can define the User class like following 
   class User
    {
      function setSessionStorage($storage)
      {
        $this->storage = $storage;
      }

      // ...
    }
    //or the property injection 
    class User
    {
      public $sessionStorage;
    }

    $user->sessionStorage = $storage;
    //further examples : 
    // symfony: A constructor injection example
	$dispatcher = new sfEventDispatcher();
	$storage = new sfMySQLSessionStorage(array('database' => 'session', 'db_table' => 'session'));
	$user = new sfUser($dispatcher, $storage, array('default_culture' => 'en'));

	// Zend Framework: A setter injection example
	$transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
	  'auth'     => 'login',
	  'username' => 'foo',
	  'password' => 'bar',
	  'ssl'      => 'ssl',
	  'port'     => 465,
	));

	$mailer = new Zend_Mail();
	$mailer->setDefaultTransport($transport);
?>