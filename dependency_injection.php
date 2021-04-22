<?php
 /***
    *Author: Dr. N. Roshyara 	
    *About: Simple example Dependency Injection in PHP 
    *Description: Dependency injection in php helps us to sperate the dependent codes (objects) and let us reuse them again and 
    *again. Not only that , it also helps us to test the code easily. 
    *First use: 	 Decoupling
    *Second use:	 Reuse of Code 
	*Third use: 	 Easy for code testing 
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
		 *@return: void 
		*/
		function set($key, $value){
			$_SESSION[$key]=$value;
		}
		/**
		*@return: string 
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
   	*/
   	function __construct$storage =null){
   		if($storage=null){
   			this.storage = new SessionStorage();
   		}else{
			 
			 $this->storage = $storage; 

   		}
   	}
   	/**
   	*@return: void 
   	*/
   	function setLanguage($language){
   		$this->storage->set('language', $language);
   	}
   	/**
   	*@return: string
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
   
    /************************************************************/
   //if you want to have a setter injection then you can define the User class like following 
   class User
    {
    	/**
    	** 
    	**@return void 
		*/
      function setSessionStorage($storage)
      {
        $this->storage = $storage;
      }

      // ...
    }
    /************************************************************/
    //For the property injection 
    class User
    {
      public $sessionStorage;
    }

    $user->sessionStorage = $storage;
    
    /************************************************************/
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
	/******************************************************************************/
	// Here is one more example with and with dependency inject 
	//class Logger 
	 class Logger{
	 	private $fp; 
	 	public fucntion __construct($logfile){
	 		$this->fp =fopen($logfile,"a");

	 	}
	 	/**
	 	*@param text $text 
	 	*/
	 	public function log($text){
	 		fwrite($this->fp, $text)
	 	}
	 }
	 //Mailer class without depency injection 
	 class Mailer {
		/**
		*@var $logger
		*
		*/
		private $logger 
		
		/**
		*@var: $logfile  
		*/
		private $logfile ="logfile.txt"
		
		/**
		*@param Logger $logger  
		*
		*/		
		public function __construct(){
			/**You create Logger object inside the Mailer and Mailer object is always dependent of certain 
			*Logger class
			*/
			$this->logger = new Logger($logfile);
		}

		/**
		*@param  string $to, $title, $text 
		*/		
		public function sendMail($to, $title, $text){
		   // perform the mailing stuffs.
			//finally log sent message
			$this->logger->log("mail has been sent");
		}

	}
	//Implementation 
 	$mailer =new Mailer(); 
 	$mailer =sendMail('example@example.com',"this is The Title for log file", "This is log body")

	//Mailer class with dependency injection 
	class Mailer {
		/**
		*@var $logger
		*
		*/
		  private $logger 
		/**
		*@param Logger $logger  
		*
		*/
		public function __construct($logger){
			$this->logger =$logger;
		}
		/**
		*@param  string $to, $title, $text 
		*/
		public function sendMail($to, $title, $text){
		   // perform the mailing stuffs.
			//finally log sent message
			$this->logger->log("mail has been sent");
		}

	}

	//Implementation 
	$logfile 	="logfile.txt";
	$logger 	=new Logger($logfile);
 	$mailer 	=new Mailer($logger); 
 	$mailer 	=sendMail('example@example.com',"this is The Title for log file", "This is log body")
?>