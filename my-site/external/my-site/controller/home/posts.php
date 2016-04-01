<?php

require_once('model/database.php');
include_once('Markdown.php');

class Blog{
	public $ksdb = '';
	public $base = '';
	public function __construct(){
		$this->ksdb = new Database;
		$this->base = new stdClass;
		$this->base->url = "http://".$_SERVER['SERVER_NAME'];
	}
}

class Posts extends Blog{

	public function __construct(){
		parent::__construct();
		$this->comments = new Comments();		
		if(!empty($_GET['id'])){
			$this->viewPost($_GET['id']);
		}else{
			$this->getPosts();
		}
	}

	public function getPosts(){
		$id = 0;
		$posts = $return = array();
		$template = '';
		$posts = $this->ksdb->dbselect('posts', array('*'));
		
		foreach($posts as $key => $post){
			$posts[$key]['comments'] = $this->comments->commentNumber($post['id']);
		}
		$template = 'list-posts.php';
		include_once('view/home/'.$template);
	}

	public function viewPost($postId){
		$id = $postId;
		$posts = $return = array();
		$template = '';
		$posts = $this->ksdb->dbselect('posts', array('*'),'WHERE id = '.$id);

		$markdown = new Michelf\Markdown();
		$posts[0]['content'] = $markdown->defaultTransform($posts[0]['content']);
		$postComments = $this->comments->getComments($posts[0]['id']);
		$template = 'view-post.php';
		include_once('view/home/'.$template);
	}
}

class Comments extends Blog{

	public function __construct(){
		parent::__construct();
		// if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['comment'])){
		// 	$this->addComment();
		// }

		if(!empty($_GET['action'])&&($_GET['action'])==='save'){
			$this->addComment();
		}
	}


	public function commentNumber($postId){

		$query = $this->ksdb->dbselect('comments', array('*'),' where postid='. $postId);
		$commentnum = count($query);
		if($commentnum <= 0){
			$commentnum = 0;
		}
		return $commentnum;
	}

	public function getComments($postId){

		return $query = $this->ksdb->dbselect('comments', array('*'),'WHERE postid = '.$postId);
	}

	public function addComment(){
		$status= '';
		$array = $format = array();
		if(!empty($_POST['comment'])){
			$comment = $_POST['comment'];
		}
		if(!empty($comment['fullname'])){
			$array['name'] = $comment['fullname'];
			$format[] = ':fullname'; 
		}
		if(!empty($comment['email'])){
			$array['email'] = $comment['email'];
			$format[] = ':email'; 
		}
		if(!empty($comment['context'])){
			$array['comment'] = $comment['context'];
			$format[] = ':context'; 
		}
		if(!empty($comment['postid'])){
			$array['postid'] = $comment['postid'];
			$format[] = ':postid'; 
		}

		$cols = $values = '';
		$i=0;
		foreach($array as $col => $data){
			if($i==0){
				$cols .= $col;
				$values .= '"'.$data.'"';
			}else{
				$cols .= ','.$col;
				$values .= ',"'.$data.'"';
			}
			$i++;
		}

		$add = $this->ksdb->dbadd('comments', $cols, $values);
		if(!empty($add) && $add > 0){
			$status = array('success' => 'Your comment has been submitted');
			$key = 'success';
		}else{
			$status = array('error' => 'There has been an error submitting your comment. Please try again later.');
			$key = 'error';
		}
		header("Location: ".$this->base->url.'/my-site/?id='.$comment['postid']);	
	}

}