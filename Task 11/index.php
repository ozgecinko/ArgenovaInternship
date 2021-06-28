<?php 
session_start ();
if(!isset($_SESSION["login"]))

	header("location:login.php"); 
?>

<?php include 'includes/header.php'; ?>

<!-- Index -->
<div class="row">
    <div class="container">
        <h1> Welcome to Braintech!</h1>
    </div>
</div>

<?php include 'includes/footer.php'; ?>