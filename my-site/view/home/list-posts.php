<?php require_once('shared/header.php'); ?>
<div class="container">
<?php foreach($posts as $post): ?>
	<div class="card card-container">
		<h3><?php echo (!empty($post['title'])? htmlspecialchars($post['title']): 'Post #'.htmlspecialchars($post['id'])); ?></h3>
		<p><?php echo implode(' ', array_slice(explode(' ', strip_tags($post['content'])), 0, 10)); ?> [...]</p>
		<a href="<?php echo $this->base->url."/my-site/?id=".$post['id']; ?>" class="btn btn-primary"><?php echo $lang['READ_MORE']; ?></a><p><?php echo $lang['COMMENTS']; ?>: <?php echo $post['comments']; ?></p>
	</div>
<?php endforeach; ?>
</div>
<style type="text/css">
	.card-container.card {
	    max-width: 350px;
	    padding: 10px 10px;
float: left;
	}
	.card {
	    background-color: #F7F7F7;
	    /* just in case there no content*/
	    
	    margin: 0 ;
	    margin-top: 5px;
	    /* shadows and rounded borders */
	    -moz-border-radius: 2px;
	    -webkit-border-radius: 2px;
	    border-radius: 2px;
	    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	}

</style>
<?php require_once('shared/footer.php'); ?>