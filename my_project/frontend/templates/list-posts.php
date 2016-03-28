<?php foreach ($posts as $post): ?>
 <h3>Post #<?php echo htmlspecialchars($post['id']); ?></h3>
 <p><?php echo implode(' ', array_slice(explode(' ',
strip_tags($post['content'])), 0, 10)); ?> [...]</p>
 <a href="<?php echo $this->base->url.$_SERVER['PHP_SELF']."?id=".$post['id'];
 ?>" class="btn btn-primary">Read More</a>
 <hr/>
<?php endforeach; ?>