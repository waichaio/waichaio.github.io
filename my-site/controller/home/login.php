<?php
	require_once('model/database.php');
	session_start();
	class Login{

		public $ksdb = '';
		public $base = '';

		public function __construct(){
			$this->ksdb = new Database;
			$this->base = (object) '';
			$this->base->url = "http://".$_SERVER['SERVER_NAME'];
			$this->index();
		}

		public function index(){
			if(!empty($_GET['status']) && $_GET['status'] == 'logout'){
				session_unset();
				session_destroy();
				$error = 'You have been logged out. Please login again.';
				require_once('view/admin/loginform.php');
			}else if(!empty($_SESSION['kickstart_login']) && $_SESSION['kickstart_login'] = true){
				header('Location: '.$this->base->url.'/my-site/controller/admin/posts.php');
				exit();
			}else{
				if($_SERVER['REQUEST_METHOD'] === 'POST'){
					$error = $this->validateDetails();
				}else if(!empty($_GET['status'])){
					if($_GET['status'] == 'inactive'){
						session_unset();
						session_destroy();
						$error = 'You have been logged out due to inactivity. Please login again.';
					}
				}
				require_once('view/admin/loginform.php');
			}
		}

		public function loginSuccess(){
			$_SESSION['kickstart_login'] = true;
			$_SESSION["timeout"] = time();
			header('Location: '.$this->base->url.'/my-site/controller/admin/posts.php');
			return;
		}

		public function loginFail(){
			return 'Your Username/Password was incorrect';
		}

		private function validateDetails(){
			$return = array();
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				//$salt = '$2a$07$R.gJb2U2N.FmZ4hPp1y2CN$';
				//$password = crypt($_POST['password'], $salt);
				$password = $_POST['password'];
				$return = array();
				$query = $this->ksdb->db->prepare("SELECT * FROM users WHERE username = '".$_POST['username']."' AND password = '".$password."'");
				try {
					$query->execute();
					for($i=0; $row = $query->fetch(); $i++){
						$return[$i] = array();
						foreach($row as $key => $rowitem){
							$return[$i][$key] = $rowitem;
						}
					}
				}catch (PDOException $e) {
					echo $e->getMessage();
				}
				$login = $return;
				//$login = $this->ksdb->dbselect('users', array('*'),array('username' => $_POST['username'], 'password' => $password));
				if(!empty($login) && is_array($login) && !empty($login[0])){
					$this->loginSuccess();
				}else{
					return $error = $this->loginFail();
				}
			}else{
				return 'Please enter your Username/Password';
			}
		}

	}