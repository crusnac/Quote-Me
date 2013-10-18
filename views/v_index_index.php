
<div class="jumbotron">
  <div class="container">
    <h1>Hello!</h1>
    <p><strong>Welcome to <?=APP_NAME?>!</strong>  <?=APP_NAME?> is a simple microblogging platform. If you already have an account, please login.  If not,  register with us.  If you are not interested in either, search below to see what our users are saying.</p>
    <p>
    	<a data-toggle="modal" href="#login" class="btn btn-primary"><i class="icon-lock"></i> Sign In</a> 
		<a data-toggle="modal" class="btn btn-success" href="#register"><i class="icon-user"></i> Register</a>
	</p>

  </div>
</div>



<div class="modal" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Login to <?=APP_NAME?></h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="/users/p_login">
	
			<div class="form-group">
			<label for="email">Email address</label>
		    <input type="email" name="email" required class="form-control" placeholder="Enter email" data-validation-matches-match="email" data-validation-matches-message= "Must match email address entered above" >
		    <p class="help-block"></p>
			</div>
			
			<div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" name="password" class="form-control"  placeholder="Password">
		    <p class="help-block"></p>
			</div>
		
			<button class="btn btn-lg btn-primary btn-block" type="submit"><i class="icon-lock"></i> Sign In</button>
			</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div class="modal" id="register">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Register as a new user on <?=APP_NAME?></h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="/users/p_signup">
	
			<div class="form-group">
			<label for="email">First Name</label>
		    <input type="text" name="first_name" class="form-control" placeholder="Enter in your First Name">
			</div>
			
			<div class="form-group">
			<label for="email">Last Name</label>
		    <input type="text" name="last_name" class="form-control" placeholder="Enter in your Last Name">
			</div>
			
			<div class="form-group">
			<label for="email">Email</label>
		    <input type="email" name="email" class="form-control" placeholder="Enter in your E-Mail Address">
			</div>

			<div class="form-group">
			<label for="email">Password</label>
		    <input type="password" name="password" class="form-control" placeholder="Enter in your Password">
			</div>
			
		
			<button class="btn btn-lg btn-primary btn-block" type="submit"><i class="icon-user"></i> Register</button>

			</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
