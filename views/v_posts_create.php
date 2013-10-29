<!-- Start Error/Success Messages -->
<?php if(isset($_GET['empty-post'])): ?>
<div class="alert alert-danger fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<strong><i class="icon-info-sign"></i> Your Quote was empty!</strong> Please try again.
</div>
<?php endif; ?>
<!-- End Error/Success Messages -->

<script type="text/javascript">
    $(function () {
        $('textarea.limited').maxlength({
            'feedback' : '.charsLeft' // note: looks within the current form
        });
        
        $('input.limited').maxlength({
            'feedback' : '.charsLeftInput' // note: looks within the current form
        });
     
    });
    
</script>


<div class="jumbotron">
	<form method="POST" action="/posts/p_create">
	
		<label><small>Quote Title</small></label>
		<input type="text" maxlength="100" name="title" class="form-control limited" placeholder="Your Quote Title" autofocus="">
		<p class="char-count"><strong>Characters left:</strong> <span class="charsLeftInput">10</span></small></p>

		
		<label><small>Your Quote</small></label>

		<textarea class="form-control limited" maxlength="250" rows="4" cols="50" name="content"></textarea>
		<p class="char-count"><strong>Characters left:</strong> <span class="charsLeft">10</span></small></p>

			<br />
			
		<button class="btn btn-lg btn-primary btn-block" type="submit">Quote Me!</button>
	</form>
</div>
