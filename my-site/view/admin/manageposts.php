<?php require_once('shared/header.php'); ?>
	<a href="<?php echo $this->base->url.'/my-site/controller/admin/posts.php?action=create'; ?>" class="btn btn-info"><?php echo $lang['BTN_CREATE'] ?></a>
	<a href="<?php echo $this->base->url.'/my-site/controller/admin/comments.php'; ?>" class="btn btn-info"><?php echo $lang['COMMENTS'] ?></a>
	<table>
		<thead>
			<tr>
				<td>Post Title</td>
				<td>Post Content</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($posts as $post): ?>
			<tr>
				<td><h3><?php echo (!empty($post['title'])? htmlspecialchars($post['title']): 'Post #'.htmlspecialchars($post['id'])); ?></h3></td>
				<td><p><?php echo implode(' ', array_slice(explode(' ', strip_tags($post['content'])), 0, 10)); ?> [...]</p></td>
				<td><a href="<?php echo $this->base->url."/my-site/controller/admin/posts.php?id=".$post['id']."&action=edit"; ?>" class="btn btn-primary"><?php echo $lang['BTN_EDIT'] ?></a><a href="<?php echo $this->base->url."/my-site/controller/admin/posts.php?id=".$post['id']."&action=delete"; ?>" class="btn btn-primary"><?php echo $lang['BTN_DELETE'] ?></a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php require_once('shared/footer.php'); ?>