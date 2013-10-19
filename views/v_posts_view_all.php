<h1>What our users are Quoting...</h1>
<?php foreach ($view_posts as $post): ?>

		<!-- Start Post -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<!-- Process the Posts array -->
				<h3><a href="/posts/view/post/<?php echo $post['id']; ?>"><i class="icon-comment"></i> <?php echo $post['title']; ?></a></h3>
			</div>
			<div class="panel-body">
				<?php echo $post['body']; ?>
			</div>
			<div class="panel-footer">
				<strong><small>Created by:</strong> <a href="/posts/view/users/<?php echo $post['user_id']; ?>">
					<?php echo $post['first_name']; ?> <?php echo $post['last_name']; ?></a> on <?php echo Time::display($post['created'], 'M D Y'); ?></small>
			</div>
		</div>
		<!-- End Post -->

<?php endforeach; ?>