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
                            <img src="img/basar-avatar.png" class="img-fluid mx-auto d-block" role="img">
                            </p>    

                            <h4>Background</h4>

                            <p>
                                Leader of one of the six biggest merchant guilds in Savara, Basar is a seller of poisons and explosives. A genius of business, at a young age he has gained enough power to compare with the great Afih Merchant Guild.
                            </p>

                        </div>

                        <!--Basic Info Container-->
                        <div class="col-sm-12 col-md-8 col-lg-9">

                            <?php
                            $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                            $columns = array('UnitID','UnitClass','UnitElement','UnitZodiac', 'UnitGrade');

                            $result = $mysqli->query('SELECT UnitID, UnitClass, UnitElement, UnitZodiac, UnitGrade FROM tblunits WHERE UnitID = 11')
                            
                            ?>
                                    
                                <table class="table table-hover table-bordered table-light" role="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Star Grade</th>
                                            <th>Class Type</th>
                                            <th>Element</th>
                                            <th>Zodiac Sign</th>
                                        </tr>
                                    </thead>
                                    <?php while ($row = $result->fetch_assoc()):?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?php echo $row['UnitGrade']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['UnitClass']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['UnitElement']; ?></td>
                                        <td style="vertical-align: middle;"><?php echo $row['UnitZodiac']; ?></td>
                                    </tr>
                                        <?php endwhile; ?>
                                    <br><br>
                                </table>
                                <?php
                                $result->free();
                                ?>


                        <?php
                        $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                        $columns = array('UnitID','UnitAttack','UnitDefense','UnitSpeed', 'UnitHealth', 'UnitGrade');
                    

                        $result = $mysqli->query('SELECT UnitID, UnitAttack, UnitDefense, UnitSpeed, UnitHealth, UnitGrade FROM tblunits WHERE UnitID = 11')
                        
                        ?>
                                
                            <table class="table table-hover table-bordered table-light" role="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Attack</th>
                                        <th>Defense</th>
                                        <th>Speed</th>
                                        <th>Health</th>
                                    </tr>
                                </thead>
                                <?php while ($row = $result->fetch_assoc()):?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo $row['UnitAttack']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['UnitDefense']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['UnitSpeed']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $row['UnitHealth']; ?></td>
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

                <?php
                    $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

                    $columns = array('SkillID','Skill1Name','Skill2Name','Skill3Name','Skill1Icon','Skill2Icon','Skill3Icon','Skill1Info','Skill2Info','Skill3Info');
                

                    $result = $mysqli->query('SELECT SkillID, Skill1Name, Skill2Name, Skill3Name, Skill1Icon, Skill2Icon, Skill3Icon, Skill1Info, Skill2Info, Skill3Info FROM tblskills WHERE SkillID = 11')
                    
                    ?>
                            
                        <table class="table table-hover table-bordered table-light" role="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Skill 1</th>
                                    <th>Skill 2</th>
                                    <th>Skill 3</th>
                                </tr>
                            </thead>
                            <?php while ($row = $result->fetch_assoc()):?>
                            <tr>
                                <td style="vertical-align: middle;">
                                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['Skill1Icon']).'"/>'; ?> 
                                    <h4><?php echo $row['Skill1Name']; ?></h4>
                                    <p style="font-size:1vw"><?php echo $row['Skill1Info']; ?></p>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['Skill2Icon']).'"/>'; ?> 
                                    <h4><?php echo $row['Skill2Name']; ?></h4>
                                    <p style="font-size:1vw"><?php echo $row['Skill2Info']; ?></p>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['Skill3Icon']).'"/>'; ?> 
                                    <h4><?php echo $row['Skill3Name']; ?></h4>
                                    <p style="font-size:1vw"><?php echo $row['Skill3Info']; ?></p>
                                </td>
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