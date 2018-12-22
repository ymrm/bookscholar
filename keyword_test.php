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
<center>
<h1>興味のあるキーワードを選択してください</h1>
</center>

<?php
function outputsinsyo($ii){

print '<div id="wrap">';
print '<div id="left_content">';
$db=new SQLite3('./database.db');

for ($i=$ii; $i<($ii+6);$i++){  //全ての新書本を表示
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


//キーワードを入手
$sql_result_4=$db->query("SELECT * FROM keyword WHERE book_id = $i");
$data_4=$sql_result_4->fetchArray();
$keyword_list = $data_4['keyword_list'];
//print "<p>".$keyword_name."</p>";








print '<form method="post" name="form1" action="keyword_test2.php">';
// 次のページに選択した新書本のIDを送る
print '<input type="hidden" name="book_id" value="';
echo $book_id; 
print '">';
print '<div class="box2">';
print '<a href="javascript:form1[';
echo $i;
print '].submit()">';
//目次内容説明なしprint '<span title='.$summary_content.'>'.$keyword_list.'</p>';
print $keyword_list.'</p>';
print '</a>';
print '</div>';


print "</form>";
print "</br>";
}
print '</div>';
print '<div id="right_content">';
for ($i=($ii+6); $i<($ii+12);$i++){  //全ての新書本を表示

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

//キーワードを入手
$sql_result_4=$db->query("SELECT * FROM keyword WHERE book_id = $i");
$data_4=$sql_result_4->fetchArray();
$keyword_list = $data_4['keyword_list'];



print '<form method="post" name="form1" action="keyword_test2.php">';
// 次のページに選択した新書本のIDを送る
print '<input type="hidden" name="book_id" value="';
echo $book_id; 
print '">';

print '<div class="box2">';
print '<a href="javascript:form1[';
echo $i;
print '].submit()">';
//目次内容説明なしprint '<span title='.$summary_content.'>'.$keyword_list.'</p>';
print $keyword_list.'</p>';
print '</a>';
print '</div>';

print "</form>";
print "</br>";

}
$db->close();
print '</div>';
print '</div>';
}
?>

  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
<?php
for ($j=0; $j<793;$j+=12){  //全ての新書本を表示
		print '<div class="swiper-slide">';
		outputsinsyo($j);
		print '</div>';
}
?>
      <div class="swiper-slide">
</div>
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
