<html>
<head>
<title>aaaa</title>
</head>
<body>
<?php
$db=new SQLite3('./database.db');

for ($i=0; $i<793;$i++){  //�S�Ă̐V���{��\��


$sql_result=$db->query("SELECT * FROM title WHERE book_id = $i");
$data=$sql_result->fetchArray();
$book_id = $data['book_id'];
$title = $data['title'];
print '<form method="post" name="form1" action="test2.php">';
// ���̃y�[�W�ɑI�������V���{��ID�𑗂�
?>
<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

<a href="javascript:form1[<?php echo $i;?>].submit()"><?php echo $title; ?></a>

<?php
//���e�����̕\��
$sql_result_2=$db->query("SELECT * FROM summary WHERE book_id = $i");
$data_2=$sql_result_2->fetchArray();
$summary = $data_2['summary'];
print "<p>".$summary."</p>";

//�ڎ��̕\��
$sql_result_1=$db->query("SELECT * FROM content WHERE book_id = $i");
$data_1=$sql_result_1->fetchArray();
$content = $data_1['content'];
print "<p>".$content."</p>";

print "</form>";
print "</br>";
}
$db->close();
?>
</body>
</html>
