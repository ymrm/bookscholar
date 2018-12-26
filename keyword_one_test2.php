<?php
$post_key_id = $_POST["key_id"];
$db=new SQLite3('./database.db');
$sql_result=$db->query("SELECT * FROM keyword_one WHERE key_id = $post_key_id");
$data=$sql_result->fetchArray();
$keyword = $data['keyword'];
print "<center><h1>「".$keyword."」を選択しました</h1>";
print '<h1>選択したキーワードから、興味のある学問のランキングが表示します</h1></center>';
?>
<html>
<head>
<title>学問</title>

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
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
}
	  .wrapper {
	    max-width: 300px;
	    margin: 0 auto;
	    text-align: center;
	    background: #cccccc;
	  }
	  .txt {
	    display: inline-block;
	    text-align: left;
	  }
</style>


</head>
<body>
<?php
$db=new SQLite3('./database.db');
for ($i=1; $i<55;$i++){
  $sql_result=$db->query("SELECT * FROM keyrank WHERE key_id = $post_key_id and rank = $i");
  $data=$sql_result->fetchArray();
  $key_id = $data['key_id'];
  $sch_id = $data['sch_id'];
  $rank = $data['rank'];
print "<div class='wrapper' style='margin-top: 10px;'>";
  print "<h2 class='txt'>No.".$rank. "&nbsp;&nbsp;&nbsp";
  //print "<p>ID.".$sch_id."</p>";

  $sql_result=$db->query("SELECT * FROM scholar WHERE sch_id = $sch_id");
  $data=$sql_result->fetchArray();
  $sch_name = $data['sch_name'];
  print $sch_name."</h2>";
print "</br>";
print "</div>";
}
$db->close();
?>
</body>
</html>
