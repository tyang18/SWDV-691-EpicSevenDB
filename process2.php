<!DOCTYPE html>
<html>
  <head>
      Upload Image
  </head>
  <body>
        <!-- This page is used to connect to the database and upload a Unit's data to the EpicSeven Database Units Table. -->

        <?php
            //Variables to store input data
            $image = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $temp = $_FILES['image']['tmp_name'];
            $size = $_FILES['image']['size'];

            $imageExt = explode('.', $image);
            $allowExt = strtolower(end($imageExt));
            $allow = array('jpg', 'jpeg', 'png');
            $target = "img/".$image;

            $name = $_POST["name"];

            //Turns the files into BLOB type 
            $imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));


            //Connecting to the Database
            $mysqli = mysqli_connect("localhost", "root", "", "epicseven");

            //Checking for successful connection
            if (!$mysqli) {
                die ("Connection error: ".mysqli_connect_error());
            }else {
                echo "Server connected!";
            }

            //SQL check and Insert uploaded image into the respective table
            if (in_array($allowExt, $allow)){
                $sql = "INSERT INTO tblportraits (PortraitName, PortraitImage) VALUES ('$name', '$imagetmp')";
                //Stores the restul
                $result = mysqli_query($mysqli, $sql); 
                //move_uploaded_file($temp, $target);
                echo "New Unit has been added!";
            }
            else{
                echo mysqli_errno($mysqli) . ": " .mysqli_error($mysqli) . "\n";
                echo "There was an issue";
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

