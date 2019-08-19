<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="less/style.css" >
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            
    <!--Start of Mustache.js-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="js/mustache.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
    <link href="/e7icon.ico" rel="icon" type="image/x-icon" />
    
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="units.php">Units</a>
                </li>
                <li class="nav-item">
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


    <!--Main Section 1-->
    <script id="template" type="x-tmpl-mustache">
        <h1>{{header}}</h1>
        <h3>{{header2}}</h1>
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


    <div class="container-fluid" >
    <div class="row main-window">
    
        <!--About Section-->
        <div class="container-fluid">
        <div class="row main">
            <div class="col-12">
                <!--Main container-->
                <div class="row padding">
                    <div id="maindiv" class="col-sm-12 col-md-12 col-lg-4 list-group-item">
                        <!--home.js-->
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 list-group-item" >
                        <h3>
                            Epic Seven Trailer
                        </h3>
                        <br><br>
                        <div class="video-responsive">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/TzAuDxroCm8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <br>
                        <a href="https://itunes.apple.com/us/app/epic-seven/id1322399438?mt=8"><button type="button" class="btn btn-outline-secondary ">Install the Game</button></a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 list-group-item">
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


    <!--Main Section 3-->
    <div class="container-fluid">
    <div class="row main-window">

        <div class="container-fluid">
                <div class="row main">
                    <div class="col-md-12 list-group-item">
                        <h2>Recent Units</h2>
                        
                        <?php
                            $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                            $columns = array('PortraitImage','UnitName','UnitElement', 'UnitClass', 'UnitZodiac');
                            $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                            $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

                            $result = $mysqli->query('SELECT tblunits.UnitID, tblportraits.PortraitImage, tblunits.UnitName, tblunits.UnitElement, tblunits.UnitClass, tblunits.UnitZodiac FROM tblunits INNER JOIN tblportraits ON tblunits.UnitID=tblportraits.UnitID WHERE tblunits.UnitID = 9 LIMIT 1')

                        ?>
                                
                            <table class="table table-hover table-bordered table-light" role="table">

                                <tr>
                                    <th>Unit Icon</th>
                                    <th>Name</th>
                                    <th>Element</th>
                                    <th>Class</th>
                                    <th>Zodiac</th>
                                </tr>

                                <?php while ($row = $result->fetch_assoc()):?>
        
                                <tr>
                                    <td <?php echo $column == 'PortraitImage'; ?>><?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['PortraitImage']).'"/>'; ?></td>
                                    <td style="vertical-align: middle;" <?php echo $column == 'UnitName'; ?>><a href="unit_<?php echo $row['UnitName']; ?>.php"><?php echo $row['UnitName']; ?></a></td>
                                    <td style="vertical-align: middle;" <?php echo $column == 'UnitElement'; ?> class="imageSwitch"><?php echo $row['UnitElement']; ?></td>
                                    <td style="vertical-align: middle;" <?php echo $column == 'UnitClass'; ?>><?php echo $row['UnitClass']; ?></td>
                                    <td style="vertical-align: middle;" <?php echo $column == 'UnitZodiac'; ?>><?php echo $row['UnitZodiac']; ?></td>
                                </tr>
                                <?php endwhile; ?>

                                <br><br>
                            </table>
                            <?php
                            $result->free();
                        ?>
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
                    <div class="col-md-12 list-group-item">
                        <h2>Game News and Maintenance</h2>
                        <p class="lead"></p>
                            
                            <ul class="navbar-nav ml-auto list-group" style="list-style-type:disc">
                                <li class="list-group-item">
                                    <a class="nav-link" href="https://page.onstove.com/epicseven/global/main/view/3819902">[GM Note] Epic Pass Adjustments</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="https://page.onstove.com/epicseven/global/main/view/3817630">[GM Note] 8/17 Patch Information</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="page.onstove.com/epicseven/global/main/view/3805787">Arena Weekly Starting Grade Compensation Notice</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="nav-link" href="https://page.onstove.com/epicseven/global/main/view/3807305">[Notice] Questions from Our Heirs</a>
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