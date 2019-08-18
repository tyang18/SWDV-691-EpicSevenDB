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

                <?php
                $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                $columns = array('ArtIcon','ArtifactName','ArtifactClass', 'ArtifactGrade');
                $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';


                if ($result = $mysqli->query('SELECT tblartimage.ArtIcon, ArtifactName, ArtifactClass, ArtifactGrade FROM tblartifacts INNER JOIN tblartimage ON tblartifacts.ArtifactID=tblartimage.ArtifactID ORDER BY ' .  $column . ' ' . $sort_order)) {
                    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                    $add_class = ' class="highlight"';
                    ?>
                        
                    <table class="table table-hover table-bordered table-light" role="table">
                        <tr>
                            <th>Unit Icon </th>
                            <th><a href="artifacts.php?column=ArtifactName&order=<?php echo $asc_or_desc; ?>" >Name <i class="fas fa-sort <?php echo $column == 'ArtifactName' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="artifacts.php?column=ArtifactClass&order=<?php echo $asc_or_desc; ?>" >Element <i class="fas fa-sort <?php echo $column == 'ArtifactClass' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="artifacts.php?column=ArtifactGrade&order=<?php echo $asc_or_desc; ?>" >Class <i class="fas fa-sort <?php echo $column == 'ArtifactGrade' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()):?>
                        <tr>
                            <td <?php echo $column == 'ArtIcon' ? $add_class : ''; ?>><?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['ArtIcon']).'"/>'; ?></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'ArtifactName' ? $add_class : ''; ?>><a href="artifact_<?php echo $row['ArtifactName']; ?>.php"><?php echo $row['ArtifactName']; ?></a></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'ArtifactClass' ? $add_class : ''; ?> class="imageSwitch"><?php echo $row['ArtifactClass']; ?></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'ArtifactGrade' ? $add_class : ''; ?>><?php echo $row['ArtifactGrade']; ?></td>
                        </tr>

                        <script>
                        $().ready(function () {
                            $('.imageSwitch').each(function () {
                                string = $(this).text('Fire');
                                $(this).html('<img src="img/fire.png" alt="' + Fire + '" />');
                            });
                        });
                        //https://onelittledesigner.com/rapidweaver/rapidweaver-snippets/replacing-text-with-an-image-using-jquery/
                        </script>
                        
                        <?php endwhile; ?>
                        
                        <br><br>

                    </table>
                    <?php
                    $result->free();
                }
                ?>

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