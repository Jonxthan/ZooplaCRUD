<?php 
	include_once 'dbh.inc.php';
	ini_set('display_errors',0); 
	
	//EDIT DATA
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM properties WHERE Property_id=$id");
		$n = mysqli_fetch_array($record);
		
		//get old variables from database to be displayed in form values
		$oldcounty = $n['County'];
		$oldcountry = $n['Country'];
		$oldtown = $n['Town'];
		$olddetailsurl = $n['Full_Details_URL'];
		$olddisplayableaddress = $n['Displayable_Address'];
		$oldimageurl = $n['Image_URL'];
		$oldthumbnailurl = $n['Thumbnail_URL'];
		$oldlatitude = $n['Latitude'];
		$oldlongitude = $n['Longitude'];
		$oldnumbedrooms = $n['Number_of_bedrooms'];
		$oldnumbathrooms = $n['Number_of_bathrooms'];
		$oldprice = $n['Price'];
		$oldpropertytype = $n['Property_Type'];
		$oldstat = $n['Stat'];

	}

?>



<html>
<head>
<title>Admin Panel | Zoopla</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!--This button loads JSON data from 3rd party into SQL table-->
<form method="post" action="dbh.inc.php">
<?php echo "Click this button to fetch 10 properties from third party website and insert them into the `properties` table " ?>
<input type="submit" name="press" >
</form>

<!--CONFIRMATION MESSAGE-->
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<h1>Admin Panel</h1>

<!--DDISPLAY ALL PROPERTIES IN PROPERTIES TABLE-->
<?php $results = mysqli_query($conn, "SELECT * FROM properties"); ?>

<table>
	<thead>
		<tr>
			<th>County</th>
			<th>Country</th>
            <th>Town</th>
            <th>Details URL</th>
			<th>Displayable Address</th>
            <th>Image URL</th>
			<th>Thumbnail URL</th>
            <th>Latitude</th>
			<th>Longitude</th>
            <th>Number of Bedrooms</th>
			<th>Number of Bathrooms</th>
            <th>Price(£)</th>
			<th>Property Type</th>
            <th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['County']; ?></td>
			<td><?php echo $row['Country']; ?></td>
            <td><?php echo $row['Town']; ?></td>
            <td><?php echo $row['Full_Details_URL']; ?></td>
			<td><?php echo $row['Displayable_Address']; ?></td>
            <td><?php echo $row['Image_URL']; ?></td>
			<td><?php echo $row['Thumbnail_URL']; ?></td>
            <td><?php echo $row['Latitude']; ?></td>
			<td><?php echo $row['Longitude']; ?></td>
            <td><?php echo $row['Number_of_bedrooms']; ?></td>
			<td><?php echo $row['Number_of_bathrooms']; ?></td>
            <td><?php echo $row['Price']; ?></td>
			<td><?php echo $row['Property_Type']; ?></td>
			<td><?php echo $row['Stat']; ?></td>

			<td>
				<a href="index.php?edit=<?php echo $row['Property_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="dbh.inc.php?del=<?php echo $row['Property_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<!--HTML USER INPUT FORM-->

<form method="post" action="dbh.inc.php" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>County</label>
			<input type="text" name="county" value="<?php echo $oldcounty; ?>">
		</div>
		<div class="input-group">
			<label>Country</label>
			<input type="text" name="country" value="<?php echo $oldcountry; ?>">
		</div>
		<div class="input-group">
			<label>Town</label>
			<input type="text" name="town" value="<?php echo $oldtown; ?>">
		</div>
		<div class="input-group">
			<label>Full Details URL</label>
			<input type="text" name="fulldetailsurl" value="<?php echo $olddetailsurl; ?>">
		</div>
		<div class="input-group">
			<label>Displayable Address</label>
			<input type="text" name="displayableaddress" value="<?php echo $olddisplayableaddress; ?>">
		</div>
		<div class="input-group">
			<label>Image URL</label>
			<input type="text" name="imageurl" value="<?php echo $oldimageurl; ?>">
		</div>
		<div class="input-group">
			<label>Thumbnail URL</label>
			<input type="text" name="thumbnailurl" value="<?php echo $oldthumbnailurl; ?>">
		</div>
		<div class="input-group">
			<label>Latitude</label>
			<input type="text" name="latitude" value="<?php echo $oldlatitude; ?>">
		</div>
		<div class="input-group">
			<label>Longitude</label>
			<input type="text" name="longitude" value="<?php echo $oldlongitude; ?>">
		</div>
		<div class="input-group">
			<label>Number Of Bedrooms</label>
			<input type="text" name="numbedrooms" value="<?php echo $oldnumbedrooms; ?>">
		</div>
		<div class="input-group">
			<label>Number Of Bathrooms</label>
			<input type="text" name="numbathrooms" value="<?php echo $oldnumbathrooms; ?>">
		</div>
		<div class="input-group">
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $oldprice; ?>">
		</div>
		<div class="input-group">
			<label>Property Type</label>
			<input type="text" name="propertytype" value="<?php echo $oldpropertytype; ?>">
		</div>
		<div class="input-group">
			<label>Status</label>
			<input type="text" name="stat" value="<?php echo $oldstat; ?>">
		</div>
		<div class="input-group">
		<?php if ($update == true): ?>
		<input type="submit" name="update" style="background: #556B2F;" value="update">
		<?php else: ?>
		<input type="submit" name="save" >
		<?php endif ?>

		</div>
	</form>




</body>
</html>