<!DOCTYPE html>
<html>
  <head>
    <title>Epic Seven DB</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="less/style.css" >
    <link rel="stylesheet" href="css/style.css">
            
    <!--Start of Mustache.js-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="js/mustache.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
  </head>
  
  <body onload="loadUser()">

    <!--FACEBOOK SDK-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>


    <!--Sticky Navigation Bar-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" role="img">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gameplay.html">Gameplay</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="units.html">Units</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="artifacts.html">Artifacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tier.html">Tier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="other.html">Other</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <!--Banner Image-->
    <div class="banner-image" role="img">
        <img class="center-fit" src="img/banner.png">
    </div>

    <!--Download link-->
    <div class="container-fluid">
    <div class="row jumbotron text-center">
        <div class="col-12">
            <a href="https://itunes.apple.com/us/app/epic-seven/id1322399438?mt=8"><button type="button" class="btn btn-outline-secondary">Install the Game</button></a>
        </div>
    </div>
    </div>

    <!--Main Section 1-->
    <script id="template" type="x-tmpl-mustache">
        <h1>{{header}}</h1>
        <p>
            {{info}}
            <hr class="my-4">
            {{info2}}
            <ul>
                {{#list}}
                <li>
                    {{listinfo}}
                </li>
                {{/list}}
            </ul>    
        </p>
    </script>
    
    <div class="container-fluid">
    <div class="row main-window">
    
        <!--About Section-->
        <div class="container-fluid">
        <div class="row main">
            <div class="col-12">
                <!--Main container-->
                <div class="row padding">
                    <div id="maindiv" class="col-sm-12 col-md-6 col-lg-8">
                        <!--Located at home.js-->
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!--Will change to Javascript SDK code at a later time-->
                        <!--Will have screen responsive issues at around md size-->
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FEpicSevenGlobal%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>


    <!--Main Section 2-->
    <div class="container-fluid">
    <div class="row main-window">

        <!--News and Maintenance-->
        <div class="container-fluid">
                <div class="row main">
                    <div class="col-md-12">
                        <h2>News and Maintenance</h2>
                        <p class="lead">
                            I will a a list of links here <br>
                            <ul class="navbar-nav ml-auto" style="list-style-type:disc">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://page.onstove.com/epicseven/global/board/list/e7en001/view/3115653?boardKey=e7en001&afterBack=true">[GM Note] 4/12 Banned Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://page.onstove.com/epicseven/global/board/list/e7en001/view/3087063?boardKey=e7en001&afterBack=true">[Known Issue] 4/8 Arena Reward Correction</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://page.onstove.com/epicseven/global/board/list/e7en001/view/3096360?boardKey=e7en001&afterBack=true">[GM Note] 4/5 Banned Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://page.onstove.com/epicseven/global/board/list/e7en001/view/3092266?boardKey=e7en001&afterBack=true">[GM Note] iOS Client Update</a>
                                </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <br><br>


    <!--Fixed Image Background-->
    <figure>
        <div class="fixed-wrap">
            <div id="fixed">
            </div>
        </div>
    </figure>



    <!--Footer-->
    <footer>
        <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-12">
                <ul class="footer-list" style="list-style-type:none">
                    <li><a class="nav-link" href="about.html">About</a></li>
                    <li><a class="nav-link" href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col-12">
                <hr class="light-100">
                <h5>&copy; Tou Yang</h5>
            </div>
        </div>    
        </div>
    </footer>

  </body>
</html>