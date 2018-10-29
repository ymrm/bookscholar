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
for ($i=0; $i<793;$i++){


$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
$book_id = $data['book_id'];
$title = $data['title'];
print "</br>";
}
$db->close();
?>
</body>
</html>
