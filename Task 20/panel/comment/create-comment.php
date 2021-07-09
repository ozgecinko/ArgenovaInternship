<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $blog_id = isset($_POST['blog_id']) && !empty($_POST['blog_id']) && $_POST['blog_id'] != 'auto' ? $_POST['blog_id'] : NULL;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    $stmt = $pdo->prepare('INSERT INTO comment VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $blog_id, $name, $email, $message]);
    
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create Comment')?>

<div class="content update">
	<h2>Create Comment</h2>
    <form action="create-comment.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">

        <label for="blog_id">Post ID</label>
        <input type="text" name="blog_id" placeholder="26" value="auto" id="blog_id">

        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name">
        
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="E-mail" id="email">

        <label for="message">Message</label>
        <input type="text" name="message" placeholder="Message" id="message">
        
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>