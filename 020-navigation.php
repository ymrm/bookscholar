<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>ブックスカラ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="./swiper-4.4.1/dist/css/swiper.min.css">

<link rel="stylesheet" type="text/css" href="test.css">
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
      align-items: center;
    }
  </style>
</head>
<body>
<h2>興味のある新書本を選択してください</h2>

  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
<div id="wrap">
  <div id="left_content">
<?php
$db=new SQLite3('./database.db');

for ($i=0; $i<6;$i++){  //全ての新書本を表示

$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
$book_id = $data['book_id'];
$title = $data['title'];
print '<form method="post" name="form1" action="test2.php">';
// 次のページに選択した新書本のIDを送る
?>
<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
<div class="box2">
<a href="javascript:form1[<?php echo $i;?>].submit()"><?php echo $title; ?></a>
</div>
<?php
//ISSNの表示
$sql_result_3=$db->query("SELECT * FROM isbn WHERE book_id = $i");
$data_3=$sql_result_3->fetchArray();
$isbn = $data_3['isbn'];
//print "<p>".$isbn."</p>";
?>

<?php
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


print "</form>";
print "</br>";
}
print '</div>';
print '<div id="right_content">';
for ($i=6; $i<12;$i++){  //全ての新書本を表示

$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
$book_id = $data['book_id'];
$title = $data['title'];
print '<form method="post" name="form1" action="test2.php">';
// 次のページに選択した新書本のIDを送る
?>
<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

<div class="box2">
<a href="javascript:form1[<?php echo $i;?>].submit()"><?php echo $title; ?></a>
</div>
<?php
//ISSNの表示
$sql_result_3=$db->query("SELECT * FROM isbn WHERE book_id = $i");
$data_3=$sql_result_3->fetchArray();
$isbn = $data_3['isbn'];
//print "<p>".$isbn."</p>";
?>

<?php
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


print "</form>";
print "</br>";

}
$db->close();
print '</div>';
print '</div>';
?>




      </div>

      <div class="swiper-slide">

<div id="wrap">
  <div id="left_content">
<?php
$db=new SQLite3('./database.db');

for ($i=12; $i<18;$i++){  //全ての新書本を表示

$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
$book_id = $data['book_id'];
$title = $data['title'];
print '<form method="post" name="form1" action="test2.php">';
// 次のページに選択した新書本のIDを送る
?>
<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
<div class="box2">
<a href="javascript:form1[<?php echo $i;?>].submit()"><?php echo $title; ?></a>
</div>
<?php
//ISSNの表示
$sql_result_3=$db->query("SELECT * FROM isbn WHERE book_id = $i");
$data_3=$sql_result_3->fetchArray();
$isbn = $data_3['isbn'];
//print "<p>".$isbn."</p>";
?>

<?php
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


print "</form>";
print "</br>";
}
print '</div>';
print '<div id="right_content">';
for ($i=18; $i<24;$i++){  //全ての新書本を表示

$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
$book_id = $data['book_id'];
$title = $data['title'];
print '<form method="post" name="form1" action="test2.php">';
// 次のページに選択した新書本のIDを送る
?>
<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

<div class="box2">
<a href="javascript:form1[<?php echo $i;?>].submit()"><?php echo $title; ?></a>
</div>
<?php
//ISSNの表示
$sql_result_3=$db->query("SELECT * FROM isbn WHERE book_id = $i");
$data_3=$sql_result_3->fetchArray();
$isbn = $data_3['isbn'];
//print "<p>".$isbn."</p>";
?>

<?php
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


print "</form>";
print "</br>";

}
$db->close();
print '</div>';
print '</div>';
?>



      </div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div>
      <div class="swiper-slide">Slide 10</div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <!-- Swiper JS -->
  <script src="./swiper-4.4.1/dist/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

</body>
</html>
