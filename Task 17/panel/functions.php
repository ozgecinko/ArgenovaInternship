<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'braintech';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

// Full path of htdocs project added to Home, Users, Post page links.
// myproject is the name of my htdocs project.
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="panel.css" rel="stylesheet" type="text/css">
		<link href="../panel.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Braintech</h1>
            <a href="/myproject/panel/index.php"><i class="fas fa-home"></i>Home</a>
    		<a href="/myproject/panel/user/read.php"><i class="fas fa-address-book"></i>Users</a>
			<a href="/myproject/panel/blog/read-blog.php"><i class="fas fa-plus"></i>Post</a>
			<a href="/myproject/panel/comment/read-comment.php"><i class="fas fa-clock"></i>Comment</a>
    	</div>
    </nav>
EOT;
}

function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>