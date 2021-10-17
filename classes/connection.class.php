<?php
	
	//include '../include/sanitize.php';

	class connection{
		private $localhost = 'localhost';
		private $user = 'root';
		private $pw = '';
		private $dbname = 'foodnow';
		public $currdate;//current date for checking with db date
		private $currdatetime;//current date for checking with db date
		private $path="uploads/";
		private $targetDir = "./uploads/";
		public $conn;

		public function __construct(){	
			ob_start();//start output buffer
			session_start();//strat session
			//session_regenerate_id();
			ini_set('display_errors','0');
			ini_set('register_globals','off');
			ini_set('session.bug_compat_42','off');
			ini_set('session.bug_compat_warn','off');
			ini_set("post_max_size", "50M");  //form post  size set in php.ini file
			ini_set("upload_max_filesize", "50M"); //file upload size set in php.ini file  and set the confi value $max_size
			ini_set('session.gc_maxlifetime',3600); //1 hour session time
			$session=ini_set('session.gc_maxlifetime',3600);
			ini_set('session.gc_probability',0);
			ini_set('max_execution_time',800);
			ini_set('max_input_time',300);
			ini_set( 'session.cookie_httponly',1);
			//ini_set( 'session.use_only_cookies', TRUE );               
			//ini_set( 'session.use_trans_sid', FALSE );
			//ini_set( 'session.cookie_lifetime', 1200 );
			date_default_timezone_set('Asia/Calcutta');


			$this->currdate=date("Y-m-d");
			$this->currdatetime=date("Y-m-d H:i:s");
			$this->conn =  mysqli_connect($this->localhost, $this->user, $this->pw, $this->dbname);
			if ($this->conn -> connect_error) {
				die("Not Connected ".mysqli_connect_error());
			}
			else {

				return $this->conn;

            }
        }       
    }

    
?>

