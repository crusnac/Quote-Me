<?php if(isset($_GET['login-error'])): ?>
<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>I am unable to log you in.</strong>  Please try again!
</div>
<?php endif; ?>

<?php if(isset($_GET['user-exists'])): ?>
<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>That user already exists! </strong>  You can login using your existing account or <a class="alert-link" href="/users/signup/">sign up</a> as a new user.
</div>
<?php endif; ?>

<?php if(isset($_GET['user-created'])): ?>
<div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Your user has been created!</strong>  Login to continue. 
</div>
<?php endif; ?>




<div class="jumbotron">

<form class="form-signin" method="POST" action='/users/p_login'>

	<h2 class="form-signin-heading">Please sign in</h2>
    
    <input type="text" name="email" class="form-control" placeholder="Email address" autofocus="">
    <input type="password" name="password" class="form-control" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

</form>

</div>


    
</form>

