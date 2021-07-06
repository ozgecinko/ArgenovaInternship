<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the user id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $img = isset($_POST['img']) ? $_POST['img'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE blog SET id = ?, img = ?, category = ?, title = ?, content = ? WHERE id = ?');
        $stmt->execute([$id, $img, $category, $title,  $content, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the post from the blog table
    $stmt = $pdo->prepare('SELECT * FROM blog WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$post) {
        exit('Post doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update Blog Post #<?=$post['id']?></h2>
    <form action="update-blog.php?id=<?=$post['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="1" value="<?=$post['id']?>" id="id">

        <label for="img">Image</label>
        <input type="text" name="img" placeholder="Image" value="<?=$post['img']?>" id="img">

        <label for="category">Category</label>
        <input type="text" name="category" placeholder="Category" value="<?=$post['category']?>" id="category">

        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" value="<?=$post['title']?>" id="title">
  
        <label for="content">Content</label>
        <input type="text" name="content" placeholder="Content" value="<?=$post['content']?>" id="content">

        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>