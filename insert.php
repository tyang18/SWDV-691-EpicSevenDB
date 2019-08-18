<!DOCTYPE html>
<html>
  <head>
    <title>Unit Insert</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="units.php">Units</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="artifacts.php">Artifacts</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="insert.php">Insert</a>
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


    <!--For now, I will be manually adding images, and information about units-->
    <!--In the future, I will add a db for further filtering and unit search-->
    <!--Main Section 1-->
    <hr class="my-4">

    <div class="container-fluid">
    <div class="row main-window">
    <!--About Section-->
        <div class="container-fluid">
        <div class="row main">
            <div class="col-12">
                
                <script language="javascript" type="text/javascript">
                    function removeSpaces(string) {
                    return string.split(' ').join('');
                    }
                </script>

                <!--Main container-->
                <h2>Insert Unit</h2>
                <br>
                <h5>Instructions:</h5>
                <p>
                    To insert a new unit to the database, fill out all the fields required and click the "Add New Unit" button.
                </p>
                <div id="form" class="list-group-item">
                    <br>
                    <form action="process.php" method="post">
                        <p>
                            <label> Unit Name: </label>
                            <input type="text" id="name" name="name" onblur="this.value=removeSpaces(this.value);" />
                        </p>
                        <p>
                            <label> Unit Element: </label>
                            <input type="text" id="element" name="element" />
                        </p>
                        <p>
                            <label> Unit Class: </label>
                            <input type="text" id="class" name="class" />
                        </p>
                        <p>
                            <label> Unit Zodiac: </label>
                            <input type="text" id="zodiac" name="zodiac" />
                        </p>
                        <p>
                            <label> Unit Max Attack: </label>
                            <input type="text" id="attack" name="attack" />
                        </p>
                        <p>
                            <label> Unit Max Defense: </label>
                            <input type="text" id="defense" name="defense" />
                        </p>
                        <p>
                            <label> Unit Max Speed: </label>
                            <input type="text" id="speed" name="speed" />
                        </p>
                        <p>
                            <label> Unit Max Health: </label>
                            <input type="text" id="health" name="health" />
                        </p>
                        <p>
                            <input type="submit" id="btn" value="Add new units" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
  
    <div class="container-fluid">
    <div class="row main-window">
    <!--About Section-->
        <div class="container-fluid">
        <div class="row main">
            <div class="col-12">
                
                <script language="javascript" type="text/javascript">
                    function removeSpaces(string) {
                    return string.split(' ').join('');
                    }
                </script>

                <h2>Insert Unit Portrait</h2>
                <br>
                <h5>Instructions:</h5>
                <p>
                    To insert a new unit image icon for a specific unit, insert the unit's name and upload the image file (.jpeg, .png).
                </p>
                <div id="form2" class="list-group-item">
                    <br>
                    <form action="process2.php" method="POST" enctype="multipart/form-data">
                        <p>
                            <label> Unit Name: </label>
                            <input type="text" id="name" name="name" onblur="this.value=removeSpaces(this.value);" />
                        </p>
                        <p>
                            <label class="btn btn-primary btn-file"> 
                                Select Image Portrait
                                <input type="file" id="image" name="image" style="display:none" />
                            </label>
                        </p>
                        <p>
                            <input type="submit" id="btn2" value="Upload new Image" />
                        </p>
                        <!--https://www.simonewebdesign.it/how-to-put-online-your-wampserver/-->
                        <!-- https://www.youtube.com/watch?v=1NiJcZrPHvA -->
                    </form>
                </div>
            </div>
        </div>
    

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