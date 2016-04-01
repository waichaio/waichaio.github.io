<?php require_once('shared/header.php'); ?>
<hr style="clear:both;"/>
<a href="<?php echo $this->base->url.'/my-site'; ?>" class="ui olive basic button">Return to Post List</a>
<div class="container">
<?php foreach($posts as $post): ?>
	<h3><?php echo (!empty($post['title'])? htmlspecialchars($post['title']): 'Post #'.htmlspecialchars($post['id'])); ?></h3>
		<?php echo $post['content']; ?>
	<hr/>
<?php endforeach; ?>
<div class="container">
<div class="container">
<h3>Comments</h3>

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
        <!-- <div class="ui cards">
          <div class="card">
            <div class="content">
              <div class="header"><?php echo htmlspecialchars($comment['name']); ?></div>
              <div class="meta"><?php echo htmlspecialchars($comment['email']); ?></div>
              <div class="description">
                <?php echo htmlspecialchars($comment['comment']); ?>
              </div>
            </div>
          </div>
        </div> -->
    <?php endforeach; ?>
</div>



<h3>Leave Comment</h3>
<form action="<?php echo $this->base->url.'/my-site/index.php?action=save'; ?>" method="post" class="form-horizontal">
	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="comment[postid]" />
    <div class="control-group <?php echo (!empty($error)? 'error': ''); ?>">
    	<label class="control-label" for="email">Email</label>
    	<div class="controls">
    		<input type="email" name="comment[email]" id="email" placeholder="Your Email Address"/>
    	</div>
    </div>
    <div class="control-group <?php echo (!empty($error)? 'error': ''); ?>">
    	<label class="control-label" for="name">Full Name</label>
    	<div class="controls">
    		<input type="text" name="comment[fullname]" id="name" placeholder="Your Full Name"/>
    	</div>
    </div>
    <div class="control-group <?php echo (!empty($error)? 'error': ''); ?>">
    	<label class="control-label" for="comment">Comment</label>
    	<div class="controls">
    		<textarea id="comment" name="comment[context]"></textarea>
    	</div>
    </div>
    <div class="control-group">
    	<div class="controls">
    		<button type="submit" class="btn">Submit Comment</button>
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
