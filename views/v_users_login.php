<?php if(isset($_GET['login-error'])): ?>
<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon-warning-sign"></i> I am unable to log you in.</strong>  Please try again!
</div>
<?php endif; ?>

<?php if(isset($_GET['user-exists'])): ?>
<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon-warning-sign"></i> That user already exists! </strong>  You can login using your existing account or <a class="alert-link" href="/users/signup/">sign up</a> as a new user.
</div>
<?php endif; ?>

<?php if(isset($_GET['user-created'])): ?>
<div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon-warning-sign"></i> Your user has been created!</strong>  Login to continue. 
</div>
<?php endif; ?>




<div class="jumbotron">

<form class="form-signin" method="POST" action='/users/p_login'>

	<h2 class="form-signin-heading">Please Sign In</h2>
    
    <label><small>Your Email Address</small></label>
    <input type="text" name="email" class="form-control" placeholder="Email address" autofocus="">
    <label><small>Your Password</small></label>
    <input type="password" name="password" class="form-control" placeholder="Password"><br />
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>

</form>

</div>


    
</form>

