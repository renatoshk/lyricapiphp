<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2 style="color:white">Welcome to Lyrics World!</h2>
  <form class="form-horizontal" action="index.php" method="post">
    <div class="form-group">
      <div class="col-sm-4">
        <input type="text" class="form-control"  placeholder="Enter Author" name="artist">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4">          
        <input type="text" class="form-control"  placeholder="Enter Song" name="song">
      </div>
    </div>
    <div class="form-group">        
      <div class=" col-sm-4">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$autor = $_POST['artist'];
	$song = $_POST['song'];
	$newArtist = str_replace(' ','%20', $autor);
	$newSong = str_replace(' ','%20', $song);
	$url = "https://api.lyrics.ovh/v1/" .$newArtist. "/" . $newSong;
	$json = file_get_contents($url);
	$data = json_decode($json, true);
    echo $data['lyrics'];
}	
 ?>