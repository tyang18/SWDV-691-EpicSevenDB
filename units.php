<!DOCTYPE html>
<html>
  <head>
    <title>Units</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="less/style.css" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <!--Start of Mustache.js-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="js/mustache.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="/e7icon.ico" rel="icon" type="image/x-icon" />
  </head>
  
  <body>

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
                <li class="nav-item active">
                    <a class="nav-link active" href="units.php">Units</a>
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
                <h2>Unit Information</h2>

                <?php
                $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                $columns = array('PortraitImage','UnitName','UnitElement', 'UnitClass', 'UnitZodiac');
                $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
                $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';


                if ($result = $mysqli->query('SELECT tblunits.UnitID, tblportraits.PortraitImage, tblunits.UnitName, tblunits.UnitElement, tblunits.UnitClass, tblunits.UnitZodiac FROM tblunits INNER JOIN tblportraits ON tblunits.UnitID=tblportraits.UnitID ORDER BY ' .  $column . ' ' . $sort_order)) {
                    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
                    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                    $add_class = ' class="highlight"';
                    ?>
                        
                    <table class="table table-hover table-bordered table-light" role="table">
                        <tr>
                            <th>Unit Icon </th>
                            <th><a href="units.php?column=UnitName&order=<?php echo $asc_or_desc; ?>" >Name <i class="fas fa-sort <?php echo $column == 'UnitName' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="units.php?column=UnitElement&order=<?php echo $asc_or_desc; ?>" >Element <i class="fas fa-sort <?php echo $column == 'UnitElement' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="units.php?column=UnitClass&order=<?php echo $asc_or_desc; ?>" >Class <i class="fas fa-sort <?php echo $column == 'UnitClass' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                            <th><a href="units.php?column=UnitZodiac&order=<?php echo $asc_or_desc; ?>" >Zodiac <i class="fas fa-sort <?php echo $column == 'UnitZodiac' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()):?>
                        <tr>
                            <td <?php echo $column == 'PortraitImage' ? $add_class : ''; ?>><?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['PortraitImage']).'"/>'; ?></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'UnitName' ? $add_class : ''; ?>><a href="unit_<?php echo $row['UnitName']; ?>.php"><?php echo $row['UnitName']; ?></a></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'UnitElement' ? $add_class : ''; ?> class="imageSwitch"><?php echo $row['UnitElement']; ?></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'UnitClass' ? $add_class : ''; ?>><?php echo $row['UnitClass']; ?></td>
                            <td style="vertical-align: middle;" <?php echo $column == 'UnitZodiac' ? $add_class : ''; ?>><?php echo $row['UnitZodiac']; ?></td>
                        </tr>
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