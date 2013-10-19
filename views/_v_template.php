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

<!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
			<a class="navbar-brand" href="/"><img src="/inc/images/logo.png"></a>
          </div>
          
          
          <div class="collapse navbar-collapse pull-right">
            <ul class="nav navbar-nav">
        <li><a href="/posts/view/"><span class="badge"> <?php echo $total_number_of_posts; ?> <i class="icon-comment"></i></span> </a></li>
        	<!-- Menu for users who are logged in -->
        <?php if($user): ?>
        
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  		<li><a href="/users/profile">View my Profile</a></li>
                  		<li><a href="#">Edit my Profile</a></li>
                  		<li><a href="#">View my Quotes</a></li>
						<li class="divider"></li>
							<li><a href="/posts/create/"><i class="icon-comment"></i> Submit New Quote</a></li>
							<li class="divider"></li>
							<li><a href="/users/logout"><i class="icon-signout"></i> Sign Out</a></li>                
				  </ul>
				  </li>
				  
				  <!-- Menu options for users who are not logged in -->
        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <li><a href='/users/signup'><i class="icon-user"></i> Register</a></li>
            <li><a href='/users/login'><i class="icon-lock"></i> Sign In</a></li>

        <?php endif; ?>  
				  
				  
				  
				  
				  
            </ul>
          </div>
          
          
          
         
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container content">
        
        <?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
        
        
        
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Example courtesy <a href="http://martinbean.co.uk">Martin Bean</a> and <a href="http://ryanfait.com/sticky-footer/">Ryan Fait</a>.</p>
      </div>
    </div>

  </body></html>