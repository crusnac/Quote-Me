<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email'>    
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>

    <?php 
    if(isset($error)): ?>
        <div class='error'>
        Error;
        </div>
        <br>
    <?php endif; ?> 
    
    <?php 
		if(isset($exists)): ?>
        <div class='notice'>
            That email already exists.  Please try again.
        </div>
        <br>
    <?php endif; ?> 
    
    <?php if(isset($success)): ?>
        <div class='success'>
            Success!
        </div>
        <br>
    <?php endif; ?>    
    
    <input type='submit' value='Log in'>
    
    

</form>

