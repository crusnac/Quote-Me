<?php if(isset($_GET['create-successful'])): ?>
<div class="alert alert-success fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<strong><i class="icon-info-sign"></i> Your post has been created!</strong>
</div>
<?php endif; ?>
<?php if(isset($_GET['delete-success'])): ?>
<div class="alert alert-success fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<strong><i class="icon-info-sign"></i> Your post has been deleted successfully!</strong>
</div>
<?php endif; ?>
<?php if(isset($_GET['delete-error'])): ?>
<div class="alert alert-danger fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<strong><i class="icon-info-sign"></i> There was an error deleting your Quote, please try again!</strong>
</div>
<?php endif; ?>



<?php if(empty($view_posts)): //Check to see if a user has any posts, if they don't dipslay an error.?>
<div class="alert alert-success fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<strong><i class="icon-info-sign"></i> This user doesn't have any Quotes.  Try back later.</strong>
</div>

<?php else: //If they have posts, show them below and process the $view_posts ARRAY. ?>
<h1><?php echo $view_posts[0]['first_name']; ?> is Quoting...</h1>
	<?php foreach ($view_posts as $post): ?>
	
			<!-- Start Post -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<!-- Process the Posts array -->
					<h3><a href="/posts/view/post/<?php echo $post['id']; ?>"><i class="icon-comment"></i> <?php echo $post['title']; ?></a></h3>
										
				</div>
				<div class="panel-body">
					<?php echo $post['content']; ?>
				</div>
				<div class="panel-footer">
					<strong><small>Created by:</strong>
					<?php echo $post['first_name']; ?> <?php echo $post['last_name']; ?> on <em> <?php echo Time::display($post['created'], 'M d, Y @ g:i a T'); ?></em></small>
				</div>
			</div>
			<!-- End Post -->
			
	<?php endforeach; ?>
<?php endif; ?>