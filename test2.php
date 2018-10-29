<?php
$post_book_id = $_POST["book_id"];
echo $post_book_id;
?>
<html>
<head>
<title>aaaa</title>
</head>
<body>
<?php
$db=new SQLite3('./database.db');
for ($i=1; $i<55;$i++){
  $sql_result=$db->query("SELECT * FROM rank WHERE book_id = $post_book_id and rank = $i");
  $data=$sql_result->fetchArray();
  $book_id = $data['book_id'];
  $sch_id = $data['sch_id'];
  $rank = $data['rank'];
  print "<p>No.".$rank."</p>";
  //print "<p>ID.".$sch_id."</p>";

  $sql_result=$db->query("SELECT * FROM scholar WHERE sch_id = $sch_id");
  $data=$sql_result->fetchArray();
  $sch_name = $data['sch_name'];
  print "<p>".$sch_name."</p>";
print "</br>";
}
$db->close();
?>
</body>
</html>
