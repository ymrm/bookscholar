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
//print $data["book_id"]." : ".$data["title"];
print '<form method="post" name="form1" action="test2.php">';
?>
<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

<a href="javascript:form1[<?php echo $i;?>].submit()"><?php echo $title; ?></a>

<?php
print "</form>";
print "</br>";
}
$db->close();
?>
</body>
</html>
