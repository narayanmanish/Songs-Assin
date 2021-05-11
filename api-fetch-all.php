<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
include "Connection_DB.php";
$sql="SELECT song.song_name,song.year_release,song.song_duration,artist.artist_name,album.album_name FROM song INNER JOIN artist  ON song.Artist =artist.artist_id
INNER JOIN album ON song.Album=album.album_id;";
$result=mysqli_query($conn,$sql) or die("SQL Query Failed");
if(mysqli_num_rows($result)>0)
{
	$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
	//MYSQLI_ASSOC is convert $output in Assocative Array
	echo json_encode($output);
	//Json_encode Return json format
}
else
{
	echo json_encode(array('message'=>'No Record Found.', 'Status.'=> false));
}
?>
