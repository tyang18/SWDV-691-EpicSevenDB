<!DOCTYPE html>
<html>
  <head>
    <title>Artifacts</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="artifacts.php">Artifacts</a>
                </li>
                <li class="nav-item">
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
    <div class="container-fluid">
    <div class="row main-window">
    
        <!--About Section-->
        <div class="container-fluid">
        <div class="row main">
            <div class="col-12">
                <!--Main container-->
                <h2>Artifact Information</h2>
                <table class="table table-hover table-bordered">
                    <!--Hides the left 3 column upon smaller window-->
                    
                    <thead>
                        <!--Row 1-->
                        <tr>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="d-none d-sm-table-cell">Class Specific</th>
                        <th scope="col" class="d-none d-sm-table-cell">Star Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Row 2-->
                        <tr>
                        <th scope="row">
                            <a class="nav-link" href="artifact_celestine.html"><img src="img/celestine.png" class="img-fluid"></a>
                        </th>
                        <td>
                                <a class="nav-link" href="artifact_celestine.html">Celestine</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/soulweaver.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/5star.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        </tr>
                        
                        <!--Row 3-->
                        <tr>
                        <th scope="row">
                            <a class="nav-link" href="artifact_durandal.html"><img src="img/durandal.png" class="img-fluid"></a>
                        </th>
                        <td>
                                <a class="nav-link" href="artifact_durandal.html">Durandal</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/warrior.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/5star.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        </tr>

                        <!--Row 4-->
                        <tr>
                        <th scope="row">
                            <a class="nav-link" href="artifact_rnl.html"><img src="img/rnl.png" class="img-fluid"></a>
                        </th>
                        <td>
                            <a class="nav-link" href="artifact_rnl.html">Rhiana and Luciel</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/thief.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/5star.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        </tr>

                        <!--Row 5-->
                        <tr>
                        <th scope="row">
                            <a class="nav-link" href="artifact_swordofezera.html"><img src="img/swordofezera.png" class="img-fluid"></a>
                        </th>
                        <td>
                            <a class="nav-link" href="artifact_swordofezera.html">Sword of Ezera</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/knight.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/5star.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        </tr>

                        <!--Row 6-->
                        <tr>
                        <th scope="row">
                                <a class="nav-link" href="artifact_timematter.html"><img src="img/timematter.png" class="img-fluid"></a>
                        </th>
                        <td>
                            <a class="nav-link" href="artifact_timematter.html">Time Matter</a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/mage.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/5star.PNG" class="img-fluid d-none d-sm-block">
                        </td>
                        </tr>
                        
                    </tbody>
                </table>
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