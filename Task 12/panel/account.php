<!DOCTYPE html>
<html>
    <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="../css/style.css"> 
            
            <title> Braintech </title>      
    </head>
    <body>
    <div class="main">
    <!-- Header -->
        <div class="header">
            <div class="row">
                <!-- Topbar -->
                <div class="topbar">
                    <div class="col-lg-4">
                    <div class="logo">
                        <img src="../img/logo.PNG" alt="logo">
                    </div>
                </div>
                    <div class="col-lg-10 text-right">
                        <div class="topbar-contact">
                            <ul class="contact-list">
                                <li class="contact-desc">
                                    <span class="bar-img"><img src="../img/icons/location.png"></span>
                                    <span class="contact-name">
                                        <span class="contact-title">Address</span>
                                        <p>05 kandi BR. New York</p>
                                    </span>
                                </li>
                                <li class="contact-desc">
                                    <span class="bar-img"><img src="../img/icons/mail.png"></span>
                                    <span class="contact-name">
                                        <span class="contact-title">E-mail</span>
                                        <p><a href="#"> support@rstheme.com</a></p>
                                    </span>
                                </li>
                                <li class="contact-desc-without-border">
                                    <span class="bar-img"><img src="../img/icons/phone.png"></span>
                                <span class="contact-name">
                                    <span class="contact-title">Phone</span>
                                        <p>+019988772</p>
                                </span>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>

                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg">  
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pages</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Blog
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="blog.html">Blog</a>
                              <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item-with-border">
                            <a href="#" class="fa fa-search"></a>
                        </li> 
                        <li class="nav-item">
                            <a href="#" class="fa fa-facebook"></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="fa fa-twitter"></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="fa fa-pinterest"></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="fa fa-instagram"></a>
                        </li>
                    </ul>
                
                </nav>
            </div>
        </div>       


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

        <!-- Footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="#"><img src="../img/logo-dark.png" alt="Logo"></a>
                            </div>
                            <div class="text">
                                <p>Sedut perspiciatis unde omnis iste natus error sitlutem acc usantium doloremque denounce with illo inventore veritatis</p>
                            </div>
                            <ul class="social">
                                <li> 
                                    <a href="#"><span><i class="fa fa-facebook"></i></span></a>
                                </li>
                                <li> 
                                    <a href="#"><span><i class="fa fa-twitter"></i></span></a> 
                                </li>
                                <li> 
                                    <a href="#"><span><i class="fa fa-pinterest-p"></i></span></a> 
                                </li>
                                <li> 
                                    <a href="#"><span><i class="fa fa-instagram"></i></span></a> 
                                </li>                                         
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <span class="footer-title"><h3>IT Services</h3></span>
                            <ul class="footer-pages">
                                <li><a href="software-development.html">Software Development</a></li>
                                <li><a href="web-development.html">Web Development</a></li>
                                <li><a href="case-studies-single.html">Analytic Solutions</a></li>
                                <li><a href="cloud-and-devops.html">Cloud and DevOps</a></li>
                                <li><a href="product-design.html">Project Design</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <span class="footer-title"><h3>Contact Info</h3></span>
                            <ul class="contact-materials">
                                <li>
                                    <span class="bar-img"><img src="../img/icons/location.png"></span>
                                    <span>374 FA Tower, William S Blvd 2721, IL, USA</span>
                                </li>
                                <li>
                                    <span class="bar-img"><img src="../img/icons/phone.png"></span>
                                    <a href="tel:(+880)155-69569">(+880)155-69569</a>
                                </li>
                                <li>
                                    <span class="bar-img"><img src="../img/icons/mail.png"></span>
                                    <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                                </li>
                                <li>
                                    <span class="bar-img"><img src="../img/icons/date.png"></span>
                                    <span>Opening Hours: 10:00 - 18:00 </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <span class="footer-title"><h3>Newsletter</h3></span>
                            <p>We denounce with righteous and in and dislike men who are so beguiled and demo realized.</p>
                            <span class="send">
                            <p>
                                <input class="email" type="email" name="EMAIL" placeholder="Your email address" required="">
                                <button class="button">Submit</button>
                            </p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/script.js"></script>

    </body>
</html>
