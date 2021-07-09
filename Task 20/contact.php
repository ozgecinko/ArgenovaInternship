<?php include 'includes/header.php'; ?>

        <!-- Contact Form -->
        <div class="contact">
            <div class="row">
                        <div class="col-md-4">
                            <div class = "contact-box">    
                                <div class="title">
                                    <p>Let's Talk</p>
                                    <h2 class="contact-title">Speak With Expert Engineers.</h2>
                                </div> 

                                <div class="info-box">
                                    <div class="info-img">
                                        <img src="img/icons/mail-contact.png">
                                    </div>
                                    <div class="info-text">
                                        <span class="info-desc">Email: <br>
                                        <a href="#">support@rstheme.com</a></span>
                                    </div>
                                </div>

                                <div class="info-box">
                                    <div class="info-img">
                                        <img src="img/icons/phone-contact.png">
                                    </div>
                                    <div class="info-text">
                                        <span class="info-desc">Phone: <br>
                                        <a href="tel:123222-8888">(123) 222-8888</a></span>
                                    </div>
                                </div>

                                <div class="info-box">
                                    <div class="info-img">
                                        <img src="img/icons/location-contact.png">
                                    </div>
                                    <div class="info-text">
                                        <span class="info-desc">Address: <br>
                                        New Jesrsy, 1201, USA</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="contact-card">
                                <div class="contact-widget">
                                    <p class="desc">GET IN TOUCH</p>
                                    <h2 class="title">Fill The Form Below</h2>
                                </div> 

                                <form id="contact-form" name="contact-form">
                                    <fieldset>
                                        <div class = "row"> 
                                            <div class="col-lg-6 col-md-6 col-sm-6" id="mb">
                                                <input type="text"  id="name" class="form-control" placeholder="Name">
                                                <p id="pname"></p>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6" id="mb">
                                                <input type="text" id="surname" class="form-control" placeholder="Surname">
                                                <p id="psurname"></p>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6" id="mb">
                                                <input type="email" id="email" class="form-control" placeholder="Email">
                                                <p id="pemail"></p>
                                            </div>
                                        
                                            <div class="col-lg-6 col-md-6 col-sm-6" id="mb">
                                                <input type="password"  id="password" class="form-control" placeholder="Password">                                              
                                                <p id="ppasword"></p>
                                            </div>
                                        
                                            <div class="col-lg-6 col-md-6 col-sm-6" id="mb">
                                                <input type="text" id="phone" class="form-control" placeholder="Phone">
                                                <p id="pphone"></p>
                                            </div>
                                        
                                            <div class="col-lg-6 col-md-6 col-sm-6" id="mb">
                                                    <input type="radio" name="gender" id="female" value="female">
                                                    <label for="female"> Female </label><br>
                                                    <input type="radio" name="gender" id="male" value="male">
                                                    <label for="male"> Male </label>
                                                    <p id="pgender"></p>
                                            </div>

                                            <div class="col-lg-12 col-md-6 col-sm-6" id="mb">
                                                <textarea id="message" class="form-control" placeholder="Write your message here"></textarea>
                                                <p id="p"></p>
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-6 col-sm-6" id="mb">
                                                <input type="submit" id="submit" value="Submit" class="form-control">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                </div>
        </div>

        

        <!-- Map -->
        <div class="col-md-12">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d116838.26108855112!2d90.371647!3d23.776046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe26372e73a6832e7!2sRSTheme!5e0!3m2!1str!2sus!4v1623848922296!5m2!1str!2sus" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>