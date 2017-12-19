<?php
/*
Sinan Karayaman
*/

	require('Fonksiyonlar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>instagram video downloader</title>
	<style type="text/css">
		
		*{
			font-family: arial;
		}

	</style>
</head>
<body>

<div>
	
	<center><h2>Instagram Video Downloader</h2></center>

	<form action="" method="POST" style="width: 500px; margin: auto;">
			
		<input type="text" name="VideoUrl" style="padding: 10px; width: 450px; border-radius: 3px; border: 1px solid #ddd;" placeholder="Video URL" /><br />
		<input type="submit" value="Save Video" style="padding: 10px; width: 470px; border-radius: 3px; border: 1px solid #ddd; background-color: #f6f6f6; margin-top: 10px;" />

	</form>

</div>

<?php
	
	if(isset($_POST['VideoUrl'])){

		$Url = $_POST['VideoUrl'];
		$Source = Connect($Url);
		$Video = preg_match('@video" content="(.*?)"@', $Source, $Video)?end($Video):false;

		if($Video){

			$VideoName = 'videos/'.uniqid().'.mp4';
			$VideoSource = Connect($Video);
			if(file_put_contents($VideoName, $VideoSource)){

				echo '<center><h2>Video Saved</h2></center>';
				echo '<center><video width="500" controls>
					  <source src="'.$VideoName.'" type="video/mp4">
					</video></center>';
	
			}

		}else{

			echo '<center><h2>Video Not Found or Private</h2></center>';

		}

	}

?>

</body>
</html>
