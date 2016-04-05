<?php require_once('shared/header.php'); ?>
<hr style="clear:both;"/>
<a href="<?php echo $this->base->url.'/my-site'; ?>" class="ui olive basic button"><?php echo $lang["RETURN_POST_LIST"] ?></a>
<div class="container">
<?php foreach($posts as $post): ?>
	<h3><?php echo (!empty($post['title'])? htmlspecialchars($post['title']): 'Post #'.htmlspecialchars($post['id'])); ?></h3>
		<?php echo $post['content']; ?>
	<hr/>
<?php endforeach; ?>
<div class="container">
<div class="container">
<h3><?php echo $lang["COMMENTS"] ?></h3>
<?php if (count($postComments)>0): ?>
    <?php foreach($postComments as $comment): ?>
        <div class="ui feed">
            <div class="event">
                <div class="">
                  <!-- <img src="/images/avatar/small/elliot.jpg"> -->
                  <i class="bordered user icon"></i>
                </div>
                <div class="content">
                    <div class="summary">
                        <a class="user"> <?php echo htmlspecialchars($comment['name']); ?> </a> <?php echo htmlspecialchars($comment['email']); ?>
                        <div class="date">
                          1 Hour Ago
                        </div>
                    </div>
                    <div class="meta">
                        <a class="like">
                            <i class="like icon"></i> 4 Likes
                        </a>
                  </div>
                  <div class="description">
                        <?php echo htmlspecialchars($comment['comment']); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div><?php echo $lang["NO_COMMENT"] ?></div>
<?php endif; ?>
</div>



<h3><?php echo $lang["COMMENT"] ?></h3>
<form action="<?php echo $this->base->url.'/my-site/index.php?action=save'; ?>" method="post" class="form-horizontal">
	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="comment[postid]" />
    <div class="control-group <?php echo (!empty($error)? 'error': ''); ?>">
    	<label class="control-label" for="email"><?php echo $lang['EMAIL']; ?></label>
    	<div class="controls">
    		<input type="email" name="comment[email]" id="email" placeholder=<?php echo $lang['EMAIL']; ?> />
    	</div>
    </div>
    <div class="control-group <?php echo (!empty($error)? 'error': ''); ?>">
    	<label class="control-label" for="name"><?php echo $lang['FULL_NAME']; ?></label>
    	<div class="controls">
    		<input type="text" name="comment[fullname]" id="name" placeholder=<?php echo $lang['FULL_NAME']; ?> />
    	</div>
    </div>
    <div class="control-group <?php echo (!empty($error)? 'error': ''); ?>">
    	<label class="control-label" for="comment"><?php echo $lang['COMMENT']; ?></label>
    	<div class="controls">
    		<textarea id="comment" name="comment[context]"></textarea>
    	</div>
    </div>
    <div class="control-group">
    	<div class="controls">
    		<button type="submit" class="btn"><?php echo $lang['SUBMIT_COMMENT']; ?></button>
    	</div>
    </div>
</form>

<style type="text/css">
    .card-container.card {
        max-width: 350px;
        padding: 10px 10px;
        margin: 5px 5px;
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