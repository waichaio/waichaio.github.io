<?php
	session_start();
	require_once('../../model/database.php');
	class Adminpanel{
		public function __construct(){
			$inactive = 600;
			if (isset($_SESSION["kickstart_login"])) {
			    $sessionTTL = time() - $_SESSION["timeout"];
			    if ($sessionTTL > $inactive) {
			    	session_unset();
			        session_destroy();
			        header("Location: http://".$_SERVER['SERVER_NAME']."/my-site/login.php?status=inactive");
			    }
			}
			$_SESSION["timeout"] = time();
			$login = $_SESSION['kickstart_login'];
			if(empty($login)){
				session_unset();
				session_destroy();
				header('Location: http://'.$_SERVER['SERVER_NAME'].'/my-site/login.php?status=loggedout');
			}else{
				$this->ksdb = new Database;
				$this->base = (object) '';
				$this->base->url = 'http://'.$_SERVER['SERVER_NAME'];
			}
		}
	}

	class Posts extends Adminpanel{

		public function __construct(){
			parent::__construct();
			if(!empty($_GET['action'])){
				switch ($_GET['action']){
					case 'create':
						$this->addPost();
						break;
					default:
						$this->listPosts();
						break;
					case 'save':
						$this->savePost();
						break;
					case 'delete':
						$this->deletePost();
						break;
					case 'edit':
						$this->editPosts();
						break;
				}
			}else{
				$this->listPosts();
			}
		}

		public function listPosts(){
			$posts = $return = array();
			$query = $this->ksdb->db->prepare("SELECT * FROM posts");
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
			$posts = $return;
			require_once('../../view/admin/manageposts.php');
		}

		public function editPosts(){

		}

		public function addPost(){
			require_once('../../view/admin/newpost.php');
		}

		public function savePost(){
			$status= '';
			$array = $format = $return = array();
			if(!empty($_POST['post'])){
				$post = $_POST['post'];
			}
			if(!empty($_POST['id'])){
				$id = $_POST['id'];
			}
			if(!empty($post['content'])){
				$array['content'] = $post['content'];
				$format[] = ':content'; 
			}
			if(!empty($post['title'])){
				$array['title'] = $post['title'];
				$format[] = ':title'; 
			} 
			$cols = $values = '';
			$i=0;
			foreach($array as $col => $data){
				if($i==0){
					$cols .= $col;
					$values .='"'. $data.'"';
				}else{
					$cols .= ','.$col;
					$values .= ',"'.$data.'"';
				}
				$i++;
			}
			try {
				if(!empty($id)){
					$query = $this->ksdb->db->prepare("UPDATE posts(".$cols.") VALUES (".$values.")");
				}else{
					$query = $this->ksdb->db->prepare("INSERT INTO posts(".$cols.") VALUES (".$values.")");
				}
	
				$result = $query->execute();
				$add = $query->rowCount();
			}catch (PDOException $e) {
				echo $e->getMessage();
			}
			$query->closeCursor();
			$this->ksdb->db = null;
			if(!empty($add) && $add > 0){
				$status = array('success' => 'Your post has been saved successfully.');
				$key = 'success';
			}else{
				$status = array('error' => 'There has been an error saving your post. Please try again later.');
				$key = 'error';
			}
			header("Location: ".$this->base->url."/my-site/controller/admin/posts.php?status=".$key);		
		}

		public function deletePost(){
			if(!empty($_GET['id']) && is_numeric($_GET['id'])){
				$query = "DELETE FROM `posts` WHERE id = ".$_GET['id'];
				$result = $this->ksdb->db->query($query);
				$delete = $result->rowCount();
				$this->db = null;
				if(!empty($delete) && $delete > 0){
					header("Location: ".$this->base->url."/my-site/controller/admin/posts.php?delete=success");
				}else{
					header("Location: ".$this->base->url."/my-site/controller/admin/posts.php?delete=error");
				}
			}	
		}

	}

	class Comments extends Adminpanel{

		public function __construct(){
			parent::__construct();
			if(!empty($_GET['action']) && $_GET['action'] == 'delete'){
				$this->deleteComment();
			}else{
				$this->listComments();
			}
		}

		public function listComments(){
			$comments = $return = array();
			$query = $this->ksdb->db->prepare("SELECT * FROM comments");
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
			$comments = $return;
			require_once('../../view/admin/managecomments.php');
		}

		public function deleteComment(){
			if(!empty($_GET['id']) && is_numeric($_GET['id'])){
				$query = "DELETE FROM `comments` WHERE id = ".$_GET['id'];
				$result = $this->ksdb->db->query($query);
				$delete = $result->rowCount();
				$this->db = null;
				if(!empty($delete) && $delete > 0){
					header("Location: ".$this->base->url."/my-site/controller/admin/comments.php?delete=success");
				}else{
					header("Location: ".$this->base->url."/my-site/controller/admin/comments.php?delete=error");
				}
			}	
		}
		
	}

	$admin = new Adminpanel();