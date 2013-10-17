<?php foreach ($posts as $post): ?>

<form method='POST' action='/posts/p_edit/<?php echo $post['id']; ?>'>

    Title<br>
    <input type='text' name='title' value="<?php echo $post['title']; ?>">
    <br><br>

    Body<br>
    <textarea rows="4" cols="50" name='body'><?php echo $post['body']; ?></textarea>
    <br><br>

    <input type='submit' value='Update'>
    
 <?php endforeach; ?>

</form>