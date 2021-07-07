<?php
include '../functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

$records_per_page = 10;

$stmt = $pdo->prepare('SELECT * FROM comment ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_comments = $pdo->query('SELECT COUNT(*) FROM comment')->fetchColumn();
?>

<?=template_header('Read Comments')?>

<div class="content read">
	<h2>Read Comments</h2>
	<a href="create-comment.php" class="create-contact">Create Comment</a>
	<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Post ID</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Message</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?=$comment['id']?></td>
                <td><?=$comment['blog_id']?></td>
                <td><?=$comment['name']?></td>
                <td><?=$comment['email']?></td>
                <td><?=$comment['message']?></td>
                <td class="actions">
                    <a href="delete-comment.php?id=<?=$comment['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read-comment.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_comments): ?>
		<a href="read-comment.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>