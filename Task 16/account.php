<?php include 'includes/header.php'; ?>

<!-- Account -->
<div class="account" id="mp">
                <div class="container">
                    <div class="row">
                       <div class="col-md-6">
                            <h2 class="title">Login</h2>
                           <div class="login">
                                <form action="process.php" method="post">
                                    <div class="form-group">
                                        <label>Username or email address<span>*</span></label>
                                        <input id="username" name="username" class="form-control" type="text" required=""> 
                                        <label>Password <span>*</span></label>
                                        <input id="pass" name="password" class="form-control" type="password" required="">
                                    </div>
                                    <input type="submit" id="submit" value="Submit" class="form-control" name="sub">
                                        <label>
                                            <p>
                                            <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
                                            Remember me
                                            </p>
                                        </label>
                                    <div class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </div>
                                </form>
                            </div>
                       </div>
                       <div class="col-md-6">
                            <h2 class="title">Register</h2>
                            <div class="login">
                                <div class="form-group">
                                    <label>Email address<span>*</span></label>
                                    <input id="gname" name="type" class="form-control" type="text" required=""> 
                                </div>
                                <p>A password will be sent to your email address.</p>
                                <p>
                                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy.</a>
                                </p>
                                <input type="submit" id="submit" value="Register" class="form-control">
                            </div>
                       </div> 
                    </div>
                </div>
</div>
<!-- Account -->

<?php 
if(isset($_REQUEST["err"]))
	$msg="Invalid username or Password";
?>
<p style="color:red;">
<?php if(isset($msg))
{
	
echo $msg;
}
?>

<?php include 'includes/footer.php'; ?>