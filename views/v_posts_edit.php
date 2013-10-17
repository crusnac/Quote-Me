<?php foreach ($posts as $value): ?>

<form method='POST' action='/posts/p_edit/<?php echo $value['id']; ?>'>


    Title<br>
    <input type='text' name='title' value="<?php echo $value['title']; ?>">
    <br><br>

    Body<br>
    <textarea rows="4" cols="50" name='body'><?php echo $value['body']; ?></textarea>
    <br><br>

    <input type='submit' value='Update'>
    
 <?php endforeach; ?>

 
    
    

</form>