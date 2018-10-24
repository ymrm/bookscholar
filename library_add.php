<html>
<head><title>データの追加</title></head>
<body>
<?php
$genru = $_POST['genru'];
$year = $_POST['year'];
$month = $_POST['month'];
$date = $_POST['date'];
$item = $_POST['item'];
$count = $_POST['count'];
$price = $_POST['price'];
if ($genru == "" and $year == "" and $month == "" and $date == "" and $item == "" and $count == "" and $price == ""){
    exit ("必要項目が入力されていません。\n再度確認してみてください。");
}

$host = "localhost";
if (!$conn = mysqli_connect($host, "s1511514", "k@n@k0","s1511514")){
    die("データベース接続エラー.<br />");
}

mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");
    
$sql = "INSERT INTO purchase(person_id, year,month,date,item,count,price) VALUES('$person_id', '$year', '$month', '$date', '$item', '$count', '$price')";

mysqli_query($conn, $sql)
   or die("登録できませんでした");
print("登録しました。<a href=\"search_form.html\">search_form.html</a>で確認してください。");
?>
</body>
</html>
