<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email'>    
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>


	

    <?php 
    if(isset($_GET["notice"])): ?>
        <div class='error'>
        Error;
        </div>
        <br>
    <?php endif; ?> 
    
    <?php 
		if(isset($_GET["exists"])): ?>
        <div class='notice'>
            That email already exists.  Please try again.
        </div>
        <br>
    <?php endif; ?> 
    
        <?php 

    if(isset($_GET["success"])): ?>
        <div class='success'>
            Success!
        </div>
        <br>
    <?php endif; ?>    
    
    <input type='submit' value='Log in'>
    
    <?php
    foreach($_GET as $key => $value)
        echo $key . " : " . $value;
	?>
    
</form>

