<?php
include '../functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the comment ID exists
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM comment WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('Comment doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM comment WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the comment!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read-comment.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete Comment')?>

<div class="content delete">
	<h2>Delete Comment #<?=$comment['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete comment #<?=$comment['id']?>?</p>
    <div class="yesno">
        <a href="delete-comment.php?id=<?=$comment['id']?>&confirm=yes">Yes</a>
        <a href="delete-comment.php?id=<?=$comment['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>