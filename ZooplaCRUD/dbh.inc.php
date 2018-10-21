<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "properties";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo 'connection success <br>';
}


//Insert Form Values Into Database
if (isset($_POST['save'])) {
    $frmcounty = $_POST['county'];
    $frmcountry = $_POST['country'];
    $frmtown = $_POST['town'];
    $frmfulldetailsurl = $_POST['fulldetailsurl'];
    $frmdisplayableaddress = $_POST['displayableaddress'];
    $frmimageurl = $_POST['imageurl'];
    $frmthumbnailurl = $_POST['thumbnailurl'];
    $frmlatitude = $_POST['latitude'];
    $frmlongitude = $_POST['longitude'];
    $frmnumbedrooms = $_POST['numbedrooms'];
    $frmnumbathrooms = $_POST['numbathrooms'];
    $frmprice = $_POST['price'];
    $frmpropertytype = $_POST['propertytype'];
    $frmstat = $_POST['stat'];


    mysqli_query($conn, "INSERT INTO properties (County, Country, Town, Full_Details_URL, Displayable_Address, 
    Image_URL, Thumbnail_URL, Latitude, Longitude, Number_of_bedrooms, Number_of_bathrooms, 
    Price, Property_Type, Stat) VALUES ('$frmcounty', '$frmcountry', '$frmtown', '$frmfulldetailsurl','$frmdisplayableaddress', '$frmimageurl',
    '$frmthumbnailurl', '$frmlatitude', '$frmlongitude', '$frmnumbedrooms', '$frmnumbathrooms', '$frmprice', '$frmpropertytype', '$frmstat')"); 
    
    $_SESSION['message'] = "Address saved"; 
    header('location: index.php');
    
}


//Update Form Values 

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$newcounty = $_POST['county'];
	

	mysqli_query($conn, "UPDATE properties SET County='$newcounty' WHERE Property_id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}


//DELETE ITEMS

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM properties WHERE Property_id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}


//BUTTON THAT LOADS JSON DATA INTO TABLE

if (isset($_POST['press'])) {
  
//Get json data and convert into php array
$properties_url = 'https://api.zoopla.co.uk/api/v1/property_listings.js?area=manchester&page_number=1&api_key=raqjr53tyfbdytqt8bc7r3h8';
$properties_json = file_get_contents($properties_url);
$properties_array = json_decode($properties_json, true);

//Assign array values into variables

$i = 0;
for ($x = 0; $x < 10; $x++) {

$county = $properties_array['listing'][$i]['county']; 
$country = $properties_array['listing'][$i]['country'];
$town = $properties_array['listing'][$i]['post_town'];
$detailsurl = $properties_array['listing'][$i]['details_url']; 
$displayableaddress = $properties_array['listing'][$i]['displayable_address'];
$imageurl = $properties_array['listing'][$i]['image_url'];
$thumbnailurl = $properties_array['listing'][$i]['thumbnail_url'];
$latitude = $properties_array['listing'][$i]['latitude'];
$longitude = $properties_array['listing'][$i]['longitude'];
$numbedrooms = $properties_array['listing'][$i]['num_bedrooms']; 
$numbathrooms = $properties_array['listing'][$i]['num_bathrooms'];
$price = $properties_array['listing'][$i]['price']; 
$propertytype = $properties_array['listing'][$i]['property_type'];
$stat = $properties_array['listing'][$i]['status'];

//Insert values into properties table


    $sql = "REPLACE INTO properties (County, Country, Town, Full_Details_URL, Displayable_Address, 
                        Image_URL, Thumbnail_URL, Latitude, Longitude, Number_of_bedrooms, Number_of_bathrooms, 
                        Price, Property_Type, Stat)
                VALUES ('$county', '$country', '$town', '$detailsurl', '$displayableaddress', 
                        '$imageurl', '$thumbnailurl', '$latitude', '$longitude', '$numbedrooms', '$numbathrooms', '$price', 
                        '$propertytype', '$stat')";

           $i++;


    //Check if records were posted into table
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 
    
    header('location: index.php');
}



} 