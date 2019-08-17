<!DOCTYPE html>
<html>
  <head>
      Upload Unit
  </head>
  <body>
        <!-- This page is used to connect to the database and upload a Unit's data to the EpicSeven Database Units Table. -->

        <?php
            //Variables to store input data
            $name = $_POST["name"];
            $element = $_POST["element"];
            $class = $_POST["class"];
            $zodiac = $_POST["zodiac"];
            $attack = $_POST["attack"];
            $defense = $_POST["defense"];
            $speed = $_POST["speed"];
            $health = $_POST["health"];


            //Connecting to the Database
            $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

            //Checking for successful connection
            if (!$mysqli) {
                die ("Connection error: ".mysqli_connect_error());
            }else {
                echo "Server connected!";
            }

            //SQLto insert input data into the specified colums of the respective table
            $sql = "INSERT INTO tblunits (UnitName, UnitElement, UnitClass, UnitZodiac, UnitAttack, UnitDefense, UnitSpeed, UnitHealth) 
            VALUES ('$name', '$element', '$class', '$zodiac', '$attack', '$defense', '$speed', '$health')";

            //Stores the restul
            $result = mysqli_query($mysqli, $sql); 

            //Shows successful or failure message
            if ($result) {
                echo "New Unit has been added!";
            }else {
                echo mysqli_errno($mysqli) . ": " .mysqli_error($mysqli) . "\n";
            }

            //Close connection
            mysqli_close($mysqli);
        ?>

        <!-- Button to get back to the Units Page -->
        <p>
            <button onclick="window.location.href = 'units.php';">Back to Units Page</button>
        </p>

    </body>
</html>

