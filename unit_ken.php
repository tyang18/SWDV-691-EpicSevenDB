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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <!--Start of Mustache.js-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript" src="js/mustache.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gameplay.html">Gameplay</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="units.html">Units</a>
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

    <!--For now, I will be manually adding images, and information about units-->
    <!--In the future, I will add a db for further filtering and unit search-->
    <!--Main Section 1-->
    <div class="container-fluid">
    <div class="row main-window">
    
        <!--About Section-->
        <div class="container-fluid">
        <div class="row main">
            <div class="col-12">

                <?php
                    $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                    $query = 'SELECT tblunits.UnitLore, tblsprites.SpriteImage ON tblunits.UnitID=tblsprites.UnitID WHERE SpriteID = ?';

                    $stmt = $con->prepare( $query );

                    $image = array('UnitLore', 'SpriteImage');
 
                    // bind the id of the image you want to select
                    $stmt->bindParam(1, $_GET['SpriteID']);
                    $stmt->execute();
                    
                    // to verify if a record is found
                    $num = $stmt->rowCount();
                    
                    if( $num ){
                        // if found
                        $row = $stmt->fetch_assoc();
                        
                        // specify header with content type,
                        // you can do header("Content-type: image/jpg"); for jpg,
                        // header("Content-type: image/gif"); for gif, etc.
                        header("Content-type: image/png");
                        
                        //display the image data
                        print $row['data'];
                        exit;
                    }else{
                        //if no image found with the given id,
                        //load/query your default image here
                    }

                ?>

                <!--Main container-->
                <h2>Ken</h2>
                <!--Main Infor Container-->
                <div class="col-12">
                    <!--Splits the Container in 2-->
                    <div class="row padding">
                        <!--Text Container-->
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <p>
                            <!--Avatar Image-->
                            <img src="img/ken-avatar.png" class="img-fluid mx-auto d-block" role="img">

                        </div>

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
                            <td style="vertical-align: middle;" <?php echo $column == 'UnitName'; ?>><a href="unit_<?php echo $row['UnitName']; ?>.html"><?php echo $row['UnitName']; ?></a></td>
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


                <!--Main container-->
                <h2>Ken</h2>
                <!--Main Infor Container-->
                <div class="col-12">
                    <!--Splits the Container in 2-->
                    <div class="row padding">
                        <!--Text Container-->
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <p>
                            <!--Avatar Image-->
                            <img src="img/ken-avatar.png" class="img-fluid mx-auto d-block" role="img">
                            </p>    

                            <h4>Background</h4>

                            <p>
                                Born an orphan, Ken has faced many hardships in his life, but manages to maintain a bright and optimistic personality. He believes the only way to survive is through strength, and dedicates his life to training and always admires the strong.
                            </p>

                        </div>

                        <!--Basic Info Container-->
                        <div class="col-sm-12 col-md-8 col-lg-9">
                            <table class="table table-light" role="table" >
                   
                                <!--Hides the left 3 column upon smaller window-->
                                <thead class="thead-dark">
                                    <!--Row 1-->
                                    <tr>
                                    <th scope="col">Star Grade</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Class Type</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Element</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Zodiac Sign</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">
                                        <h2>&#9734&#9734&#9734&#9734&#9734</h2>
                                    </th>
                                    <td class="d-none d-sm-table-cell">
                                        <img src="img/warrior.PNG" class="img-fluid d-none d-sm-block" role="img">
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <img src="img/fire.png" class="img-fluid d-none d-sm-block" role="img">
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <img src="img/capricorn.PNG" class="img-fluid d-none d-sm-block" role="img">
                                    </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--Stats Container-->
                            <table class="table table-hover table-bordered table-light" role="table" >
                   
                                <!--Hides the left 3 column upon smaller window-->
                                <thead class="thead-dark">
                                    <!--Row 1-->
                                    <tr>
                                    <th scope="col">Level</th>
                                    <th scope="col">CP</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Attack</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Defense</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Health</th>
                                    <th scope="col" class="d-none d-sm-table-cell">Speed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">
                                        Level 1 at 5&#9734 (No Awakening)
                                    </th>
                                    <td>
                                        1406
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        81
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        77
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        351
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        102
                                    </td>
                                    </tr>

                                    <!--Row 2-->
                                    <tr>
                                    <th scope="row">
                                        Level 50 at 5&#9734 (No Awakening)
                                    </th>
                                    <td>
                                        12050
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        655
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        500
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        4653
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        102
                                    </td>
                                    </tr>

                                    <!--Row 3-->
                                    <tr>
                                    <th scope="row">
                                        Level 60 at 6&#9733 (No Awakening)
                                    </th>
                                    <td>
                                        15038
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        816
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        620
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        5850
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        102
                                    </td>
                                    </tr>

                                    <!--Row 5-->
                                    <tr>
                                    <th scope="row">
                                        Level 60 at 6&#9733 (Awakening)
                                    </th>
                                    <td>
                                        17484
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        966
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        657
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        7323
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        102
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <table class="table table-bordered table-light" role="table" >
                    <!--Hides the left 3 column upon smaller window-->
                    
                    <thead class="thead-dark">
                        <!--Row 1-->
                        <tr>
                        <th scope="col" style="width: 33.33%">Skill 1</th>
                        <th scope="col" style="width: 33.33%">Skill 2</th>
                        <th scope="col" style="width: 33.33%" class="d-none d-sm-table-cell">Skill 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">
                            <img src="img/ken-skill1.png" class="img-fluid mx-auto d-block" role="img">
                            <h3 style="font-size:2vw">Knockout</h3>
                            <p style="font-size:.9vw">
                                Attacks with a flurry of strikes, with a 35% chance to decrease Defense for 2 turns. If the caster is granted Vigor, also burns target for 2 turns. Damage dealt increases proportional to the caster's max Health.
                            </p>
                        </th>
                        <td>
                            <img src="img/ken-skill2.png" class="img-fluid mx-auto d-block" role="img">
                            <h3 style="font-size:2vw">Celestial Kick</h3>
                            <p style="font-size:.9vw">
                                Attacks the enemy with a kick, increasing Speed of the caster for 2 turns, with a 75% chance to decrease Defense of the target for 2 turns. Gains 40 Fighting Spirit when an enemy is defeated. If caster is granted Vigor, ignores Effect Resistance. Damage dealt increases proportional to the caster's max Health.
                            </p>

                        </td>
                        <td class="d-none d-sm-table-cell">
                            <img src="img/ken-skill3.png" class="img-fluid mx-auto d-block" role="img">
                            <h3 style="font-size:2vw">Phoenix Flurry</h3>
                            <p style="font-size:.9vw">
                                Attacks with a flurry of strikes, with a 35% chance to decrease Defense for 2 turns. If the caster is granted Vigor, also burns target for 2 turns. Damage dealt increases proportional to the caster's max Health.
                            </p>

                        </td>
                        </tr>

                    </tbody>
                </table>
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