<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'epicseven');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('UnitID','UnitName','UnitElement', 'UnitClass', 'UnitZodiac');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

$test = 'ken';

// Get the result...
if ($result = $mysqli->query('SELECT UnitID, UnitName, UnitElement, UnitClass, UnitZodiac from tblunits ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>PHP & MySQL Table Sorting by CodeShack</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			th {
				background-color: #54585d;
				border: 1px solid #54585d;
			}
			th:hover {
				background-color: #64686e;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #ffffff;
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
		</head>
		<body>
			<table>
				<tr>
                    <th><a href="test.php?column=UnitID&order=<?php echo $asc_or_desc; ?>" scope="col">UnitID <i class="fas fa-sort <?php echo $column == 'UnitID' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th><a href="test.php?column=UnitName&order=<?php echo $asc_or_desc; ?>" scope="col">Name <i class="fas fa-sort <?php echo $column == 'UnitName' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th><a href="test.php?column=UnitElement&order=<?php echo $asc_or_desc; ?>" scope="col" class="d-none d-sm-table-cell">Element <i class="fas fa-sort <?php echo $column == 'UnitElement' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th><a href="test.php?column=UnitClass&order=<?php echo $asc_or_desc; ?>" scope="col" class="d-none d-sm-table-cell">Class <i class="fas fa-sort <?php echo $column == 'UnitClass' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th><a href="test.php?column=UnitZodiac&order=<?php echo $asc_or_desc; ?>" scope="col" class="d-none d-sm-table-cell">Zodiac <i class="fas fa-sort <?php echo $column == 'UnitZodiac' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                </tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
                    <td <?php echo $column == 'UnitID' ? $add_class : ''; ?>><?php echo $row['UnitID']; ?></td>
                    <td <?php echo $column == 'UnitName' ? $add_class : ''; ?>><?php echo $row['UnitName']; ?></td>
                    <td <?php echo $column == 'UnitElement' ? $add_class : ''; ?>><?php echo $row['UnitElement']; ?></td>
                    <td <?php echo $column == 'UnitClass' ? $add_class : ''; ?>><?php echo $row['UnitClass']; ?></td>
                    <td <?php echo $column == 'UnitZodiac' ? $add_class : ''; ?>><?php echo $row['UnitZodiac']; ?></td>
                </tr>

                <?php endwhile; ?>
                    
                <?php
                    while ($sum = $result->fetch_assoc()){
                        print_r($sum);
                    }
                    //echo $sum;
                ?>

			</table>
		</body>
	</html>
	<?php
	$result->free();
}
?>
<?php
echo $test;
echo $column == 'UnitID';
echo $row['UnitID'];
?>

<br><br>


<?php
$mysqli = new mysqli("localhost", "root", "", "epicseven");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT tblunits.UnitID, tblportraits.Image, tblunits.UnitName, tblunits.UnitElement, tblunits.UnitClass, tblunits.UnitZodiac FROM tblunits INNER JOIN tblportraits ON tblunits.UnitID=tblportraits.UnitID ORDER by UnitID";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s, %s, (%s)\n", $row["UnitID"], $row["UnitName"], $row["UnitElement"]);
        echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['Image']).'"/>';
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>

<br><br><br>

<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'epicseven');

// For extra protection these are the columns of which the user can sort by (in your database table).
$columns = array('Image','UnitName','UnitElement', 'UnitClass', 'UnitZodiac');

// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

// Get the sort order for the column, ascending or descending, default is ascending.
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

$test = 'ken';

// Get the result...
if ($result = $mysqli->query('SELECT tblportraits.Image, tblunits.UnitName, tblunits.UnitElement, tblunits.UnitClass, tblunits.UnitZodiac FROM tblunits INNER JOIN tblportraits ON tblunits.UnitID=tblportraits.UnitID ORDER BY ' .  $column . ' ' . $sort_order)) {
	// Some variables we need for the table.
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>PHP & MySQL Table Sorting by CodeShack</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 10px;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			th {
				background-color: #54585d;
				border: 1px solid #54585d;
			}
			th:hover {
				background-color: #64686e;
			}
			th a {
				display: block;
				text-decoration:none;
				padding: 10px;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
			}
			th a i {
				margin-left: 5px;
				color: rgba(255,255,255,0.4);
			}
			td {
				padding: 10px;
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #ffffff;
			}
			tr .highlight {
				background-color: #f9fafb;
			}
			</style>
		</head>
		<body>
			<table>
				<tr>
                    <th scope="col" >Unit Image </th>
                    <th scope="col" ><a href="test.php?column=UnitName&order=<?php echo $asc_or_desc; ?>" >Name <i class="fas fa-sort <?php echo $column == 'UnitName' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th scope="col" class="d-none d-sm-table-cell"><a href="test.php?column=UnitElement&order=<?php echo $asc_or_desc; ?>" >Element <i class="fas fa-sort <?php echo $column == 'UnitElement' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th scope="col" class="d-none d-sm-table-cell"><a href="test.php?column=UnitClass&order=<?php echo $asc_or_desc; ?>" >Class <i class="fas fa-sort <?php echo $column == 'UnitClass' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                    <th scope="col" class="d-none d-sm-table-cell"><a href="test.php?column=UnitZodiac&order=<?php echo $asc_or_desc; ?>" >Zodiac <i class="fas fa-sort <?php echo $column == 'UnitZodiac' ? '-' . $up_or_down : ''; ?>"></i></a></th>
                </tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
                    <td <?php echo $column == 'Image' ? $add_class : ''; ?>><?php echo '<img src="data:image/jpeg;base64, '.base64_encode( $row['Image']).'"/>'; ?></td>
                    <td <?php echo $column == 'UnitName' ? $add_class : ''; ?>><?php echo $row['UnitName']; ?></td>
                    <td <?php echo $column == 'UnitElement' ? $add_class : ''; ?>><?php echo $row['UnitElement']; ?></td>
                    <td <?php echo $column == 'UnitClass' ? $add_class : ''; ?>><?php echo $row['UnitClass']; ?></td>
                    <td <?php echo $column == 'UnitZodiac' ? $add_class : ''; ?>><?php echo $row['UnitZodiac']; ?></td>
                </tr>

                <?php endwhile; ?>
                    
                <?php
                    while ($sum = $result->fetch_assoc()){
                        print_r($sum);
                    }
                    //echo $sum;
                ?>

			</table>
		</body>
	</html>
	<?php
	$result->free();
}
?>