<?php

include 'db.php';
$commentNewCount = $_POST['commentNewCount'];
$sql = "SELECT Nume, Prenume, Mesaj, Nota, Ora FROM reviews_table ORDER BY Ora DESC LIMIT $commentNewCount ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_assoc($result)) {

		$rating_img='';
		switch ($row['Nota']) {
			case '5':
				$rating_img="./images/5star.png";
				break;
			case '4':
				$rating_img="./images/4star.png";
				break;
			case '3':
				$rating_img="./images/3star.png";
				break;
			case '2':
				$rating_img="./images/2star.png";
				break;
			case '1':
				$rating_img="./images/1star.png";
				break;
			default:
				$rating_img="./images/5star.png";
				break;
		}
										echo "<hr>";
										// echo "<div class='user_name'>".substr($row['Ora'],0,10)."</div>";
										echo "<article class='user_review'>";
										echo "<div class='user_name'>".substr($row['Ora'],0,10)."<br>".$row['Prenume']." ".$row['Nume']."</div>";
										echo "<div class='review_content'>"."<img class='user_rating_img' src='".$rating_img."'>"."<div>".$row['Mesaj']."</div>"."</div>";
										echo "</article>";
	}

}
else{
	echo "";
	}
	mysqli_close($conn);
?>