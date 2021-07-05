<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;

    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $img = isset($_POST['img']) ? $_POST['img'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    // Insert new record into the blog table
    $stmt = $pdo->prepare('INSERT INTO blog VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $img, $category, $title, $content]);
    
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create Blog Post')?>

<div class="content update">
	<h2>Create Blog Post</h2>
    <form action="create-blog.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">

        <label for="img">Image</label>
        <input type="text" name="img" placeholder="Image" id="img">

        <label for="category">Category</label>
        <input type="text" name="category" placeholder="Category" id="category">

        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" id="title">

        <label for="content">Content</label>
        <input type="text" name="content" placeholder="Content" id="content">

        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>


<?=template_footer()?>

<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
