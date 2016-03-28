<a href="<?php echo $this->base->url.$_SERVER['PHP_SELF']; ?>" class="btn btn-primary">
Return to Post List</a>
<?php foreach ($posts as $post): ?>
 <h3>Post #<?php echo htmlspecialchars($post['id']); ?></h3>
 <?php echo htmlspecialchars($post['content']); ?>
 <hr/>
<?php endforeach; ?>