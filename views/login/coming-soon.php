<!DOCTYPE html>
<html>
<head>
	<title>Home - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="css/coming-soon.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html">
                <strong>CLEAN CANVAS</strong>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about-us.html">About</a></li>
                    <li><a class="btn-header" href="<?php echo $_SERVER['PHP_SELF']; ?>?action=logout">Logout</a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>

    <!-- Sign In Option 1 -->
    <div id="coming_soon">
        <div class="head">
            <div class="container">
                <div class="span6 text">
                    <h4>We are launching very soon</h4>
                    <p>
                        We are currently working on an awesome new site. <span>STAY TUNED!</span>
                        <br />
                        Please don´t  forget to check out our tweets and subscribe to be notified.</p>
                </div>

                <div class="span6 count">
                    <div class="box last">
                        <div class="circle">
                            <span>22</span>
                        </div>
                        <p>Seconds</p>
                    </div>
                    <div class="box">
                        <div class="circle">
                            <span>34</span>
                        </div>
                        <p>Minutes</p>
                    </div>
                    <div class="box">
                        <div class="circle">
                            <span>75</span>
                        </div>
                        <p>Hours</p>
                    </div>
                    <div class="box">
                        <div class="circle">
                            <span>165</span>
                        </div>
                        <p>Days</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="email_wrapp">
            <div class="container">
                <div class="span11 wrapp">
                    <p><strong>Sign up here</strong> to be one of the first to know when it´s ready</p>
                    <input type="text" placeholder="Email address...">
                    <a href="#" class="btn send">ok</a>
                </div>
            </div>
        </div>

        <div class="social">
            <div class="container">
                    <p>Follow us</p>
                    <a href="#" class="facebook">
                        <span class="icons ico1"></span>
                        <span class="iconsh ico1h"></span>
                    </a>
                    <a href="#" class="twitter">
                        <span class="icons ico2"></span>
                        <span class="iconsh ico2h"></span>
                    </a>
                    <a href="#" class="gplus">
                        <span class="icons ico3"></span>
                        <span class="iconsh ico3h"></span>
                    </a>
                    <a href="#" class="flickr">
                        <span class="icons ico4"></span>
                        <span class="iconsh ico4h"></span>
                    </a>
                    <a href="#" class="pinterest">
                        <span class="icons ico5"></span>
                        <span class="iconsh ico5h"></span>
                    </a>
                    <a href="#" class="dribble">
                        <span class="icons ico6"></span>
                        <span class="iconsh ico6h"></span>
                    </a>
                    <a href="#" class="behance">
                        <span class="icons ico7"></span>
                        <span class="iconsh ico7h"></span>
                    </a>
            </div>
        </div>
    </div>

    <!-- starts footer -->
    <footer id="footer">
        <div class="container">
            <div class="row info">
                <div class="span6 residence">
                    <ul>
                        <li>2301 East Lamar Blvd. Suite 140. City, Arlington.</li>
                        <li>United States, Zip Code TX 76006.</li>
                    </ul>
                </div>
                <div class="span5 touch">
                    <ul>
                        <li><strong>P.</strong> 1 817 274 2933</li>
                        <li><strong>E.</strong><a href="#"> bootstrap@twitter.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row credits">
                <div class="span12">
                    <div class="row social">
                        <div class="span12">
                            <a href="#" class="facebook">
                                <span class="socialicons ico1"></span>
                                <span class="socialicons_h ico1h"></span>
                            </a>
                            <a href="#" class="twitter">
                                <span class="socialicons ico2"></span>
                                <span class="socialicons_h ico2h"></span>
                            </a>
                            <a href="#" class="gplus">
                                <span class="socialicons ico3"></span>
                                <span class="socialicons_h ico3h"></span>
                            </a>
                            <a href="#" class="flickr">
                                <span class="socialicons ico4"></span>
                                <span class="socialicons_h ico4h"></span>
                            </a>
                            <a href="#" class="pinterest">
                                <span class="socialicons ico5"></span>
                                <span class="socialicons_h ico5h"></span>
                            </a>
                            <a href="#" class="dribble">
                                <span class="socialicons ico6"></span>
                                <span class="socialicons_h ico6h"></span>
                            </a>
                            <a href="#" class="behance">
                                <span class="socialicons ico7"></span>
                                <span class="socialicons_h ico7h"></span>
                            </a>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="span12">
                            © 2013 Clean Canvas. All rights reserved. Theme by Detail Canvas.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>
