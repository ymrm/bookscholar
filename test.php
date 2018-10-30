<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
<title>ブックスカラ</title>
<link rel="stylesheet" type="text/css" href="test.css">
</head>
<body>
<h1>ブックスカラ</h1>
<h2>興味のある新書本を選択してください</h2>
<div id="wrap">
  <div id="left_content">
<?php
$db=new SQLite3('./database.db');

for ($i=0; $i<398;$i++){  //全ての新書本を表示

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
for ($i=398; $i<793;$i++){  //全ての新書本を表示

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
</body>
</html>
