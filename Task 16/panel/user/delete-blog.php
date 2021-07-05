<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the post ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM blog WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$post) {
        exit('Post doesn\'t exist with that ID!');
    }
    // Make sure the post confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // Post clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM blog WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the post!';
        } else {
            // Post clicked the "No" button, redirect them back to the read page
            header('Location: read-blog.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete Blog Post')?>

<div class="content delete">
	<h2>Delete Blog Post #<?=$post['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete post #<?=$post['id']?>?</p>
    <div class="yesno">
        <a href="delete-blog.php?id=<?=$post['id']?>&confirm=yes">Yes</a>
        <a href="delete-blog.php?id=<?=$post['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>