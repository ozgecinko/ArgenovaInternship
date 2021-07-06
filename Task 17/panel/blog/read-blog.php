<?php
include '../functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 10;

// Prepare the SQL statement and get records from our blog table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM blog ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of blogs, this is so we can determine whether there should be a next and previous button
$num_blog= $pdo->query('SELECT COUNT(*) FROM blog')->fetchColumn();
?>

<?=template_header('Read Blog Posts')?>

<div class="content read">
	<h2>Read Blog Posts</h2>
	<a href="create-blog.php" class="create-contact">Create Blog Post</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Image</td>
                <td>Category</td>
                <td>Title</td>
                <td>Content</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
            <tr>
                <td><?=$blog['id']?></td>
                <td><?=$blog['img']?></td>
                <td><?=$blog['category']?></td>
                <td><?=$blog['title']?></td>
                <td><?=$blog['content']?></td>
                <td class="actions">
                    <a href="update-blog.php?id=<?=$blog['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete-blog.php?id=<?=$blog['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_blog): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>