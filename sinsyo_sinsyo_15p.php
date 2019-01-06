<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ブックスカラ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="./swiper-4.4.1/dist/css/swiper.min.css">

<!-- Demo styles -->
<style>
html, body {
position: relative;
height: 100%;
}
body {
background: #eee;
			font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
			font-size: 14px;
color:#000;
margin: 0;
padding: 0;
}
</style>
</head>
<body>
<center>
<h1>興味のある新書本を選択してください</h1>
<a href="./sinsyo_sinsyo.php">1</a>
<a href="./sinsyo_sinsyo_2p.php">2</a>
<a href="./sinsyo_sinsyo_3p.php">3</a>
<a href="./sinsyo_sinsyo_4p.php">4</a>
<a href="./sinsyo_sinsyo_5p.php">5</a>
<a href="./sinsyo_sinsyo_6p.php">6</a>
<a href="./sinsyo_sinsyo_7p.php">7</a>
<a href="./sinsyo_sinsyo_8p.php">8</a>
<a href="./sinsyo_sinsyo_9p.php">9</a>
<a href="./sinsyo_sinsyo_10p.php">10</a>
<a href="./sinsyo_sinsyo_11p.php">11</a>
<a href="./sinsyo_sinsyo_12p.php">12</a>
<a href="./sinsyo_sinsyo_13p.php">13</a>
<a href="./sinsyo_sinsyo_14p.php">14</a>
<u><p style="display:inline;">15</p></u>
<a href="./sinsyo_sinsyo_16p.php">16</a>
</br>
<a href="./sinsyo_sinsyo_14p.php">前へ</a>
<a href="./sinsyo_sinsyo_16p.php">次へ</a>
</br>
</br>
</br>
</br>

<?php
function outputsinsyo($i){

		print '<div id="wrap">';
		print '<div id="left_content">';
		$db=new SQLite3('./database.db');

		for ($i=700; $i<750;$i++){  //全ての新書本を表示
				$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
				$data=$sql_result->fetchArray();
				$book_id = $data['book_id'];
				$title = $data['title'];


				//ISSNの表示
				$sql_result_3=$db->query("SELECT * FROM isbn WHERE book_id = $i");
				$data_3=$sql_result_3->fetchArray();
				$isbn = $data_3['isbn'];
				//print "<p>".$isbn."</p>";

				//内容説明の表示
				$sql_result_2=$db->query("SELECT * FROM summary WHERE book_id = $i");
				$data_2=$sql_result_2->fetchArray();
				$summary = $data_2['summary'];
				//print "<p>".$summary."</p>";

				//目次の表示
				$sql_result_1=$db->query("SELECT * FROM content WHERE book_id = $i");
				$data_1=$sql_result_1->fetchArray();
				$content = $data_1['content'];
				//print "<p>".$content."</p>";
				$summary_content = $summary.$content;


				print '<form method="post" name="form1" action="sinsyo_sinsyo2.php">';
				// 次のページに選択した新書本のIDを送る
				print '<input type="hidden" name="book_id" value="';
				echo $book_id; 
				print '">';
				print '<div class="box2">';
				print '<a href="javascript:form1[';
				echo $i;
				print '].submit()">';
				print '<span title='.$summary_content.'>'.$title.'</p>';
				print '</a>';
				print '</div>';


				print "</form>";
				print "</br>";
		}
		print '</div>';
		print '<div id="right_content">';
		$db->close();
		print '</div>';
		print '</div>';
}
?>

<!-- Swiper -->
<?php
		outputsinsyo(0);
?>

</body>
</html>
