<!DOCTYPE html>
<html>
  <head>
    <title>Celestine</title>
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
                <h2>Celestine</h2>
                <!--Main Infor Container-->
                <div class="col-12">
                    <!--Splits the Container in 2-->
                    <div class="row padding">
                        <!--Text Container-->
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <p>
                            <!--Avatar Image-->
                            <img src="img/celestine-image.png" class="img-fluid mx-auto d-block" role="img">
                            </p>    
                        </div>

                        <!--Basic Info Container-->
                        <div class="col-sm-12 col-md-8 col-lg-9">

                            <h4>Lore</h4>

                            <p>
                                A rare ore extracted from near the Sanctuary. Known as the Blessing of Diche, it has the power to infuse the wearer with the energy of life and is carried by royalty and some high-ranking priests.
                            </p>

                            <?php
                            $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                            $columns = array('ArtifactID', 'ArtifactGrade','ArtifactClass','ArtifactHealth','ArtifactAttack');

                            $result = $mysqli->query('SELECT ArtifactID, ArtifactGrade, ArtifactClass, ArtifactHealth, ArtifactAttack FROM tblartifacts WHERE ArtifactID = 1');
                            
                            ?>
                                    
                            <table class="table table-hover table-bordered table-light" role="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Artifact Grade</th>
                                        <th>Class Type</th>
                                        <th>Attack</th>
                                        <th>Health Sign</th>
                                    </tr>
                                </thead>
                                <?php while ($row = $result->fetch_assoc()):?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo $row['ArtifactGrade']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['ArtifactClass']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['ArtifactAttack']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['ArtifactHealth']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                                <br>
                            </table>
                            <?php
                            $result->free();
                            ?>

                            <!--Artifact Skill-->
                            <?php
                            $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                            $columns = array('ArtifactID', 'ArtifactSkill');

                            $result = $mysqli->query('SELECT ArtifactID, ArtifactSkill FROM tblartifacts WHERE ArtifactID = 1');
                            
                            ?>
                                    
                            <table class="table table-hover table-bordered table-light" role="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Artifact Skill</th>
                                    </tr>
                                </thead>
                                <?php while ($row = $result->fetch_assoc()):?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo $row['ArtifactSkill']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </table>
                            <?php
                            $result->free();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>  
    </div>
    </div>


    <br>
    <br>

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