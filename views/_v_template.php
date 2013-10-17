<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/inc/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="/inc/css/default.css">
	<link rel="stylesheet" href="/inc/css/font-awesome.min.css">
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/inc/js/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="/inc/js/bootstrap.min.js"></script>
	<script src="/inc/js/jqBootstrapValidation.js"></script>

	<script src="/inc/js/custom.js"></script>
	
	<script>
		$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>

	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div class="container">
	
	<div class="header">
	
		
        <ul class="nav nav-pills pull-right">
        
                <li><a href='/'><i class="icon-home"></i></a></li>

        
        <li><a href="/posts/view/"><span class="badge"> <?php echo $total_number_of_posts; ?> <i class="icon-comment"></i></span> </a></li>
        
        

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>
			
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-angle-right"></i> View Profile</a></li>
						<li><a href="#"><i class="icon-angle-right"></i> Edit Profile</a></li>
						<li><a href="#"><i class="icon-angle-right"></i> View myTwits</a></li>
							<li class="divider"></li>
						<li><a href="#"><i class="icon-comment"></i> New twit</a></li>
							<li class="divider"></li>
						<li><a href="/users/logout"><i class="icon-signout"></i> Sign Out</a></li>

					</ul>
			</li>
			
			
			
        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <li><a href='/users/signup'><i class="icon-user"></i> Register</a></li>
            <li><a href='/users/login'><i class="icon-lock"></i> Sign In</a></li>

        <?php endif; ?>        
        </ul>
        
        
        
        <h3 class="text-muted">Chat Box</h3>
      </div>


	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	
	</div>
</body>
</html>