<html>
<head>
  <title>検索結果</title>
  <link href="main-site/css/bootstrap.css" rel="stylesheet" />
  <link href="main-site/css/style.css" rel="stylesheet" />

</head>
<body>
    <section id="header">
        <div class="container">

            <div class="row text-center">

                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">



    <br/>
    <br/>
<?php
$host = "localhost";
if (!$conn = mysqli_connect($host, "s1511514", "k@n@k0","s1511514")){
    die("データベース接続エラー.<br />");
}
mysqli_select_db($conn, "kisop");
mysqli_set_charset($conn, "utf8");


if(empty($_POST["person_name"])){ 
    die("名前を入力してください<br />");
}
  print("<h1>");
  if (empty($_POST["year"])and empty($_POST["month"]) and empty($_POST["date"])){
    print("出費");
  }else{
    if($_POST["year"]){ 
      print($_POST["year"]);
      print("年");
    }

    if($_POST["month"]){ 
      print($_POST["month"]);
      print("月");
    }
    if($_POST["date"]){ 
      print($_POST["date"]);
      print("日");
    }
  print("の出費");
  }
  print("</h1>");
  print("<br/>");
?>
    </section>
    <section id="preview">
        <div class="container">
            <div class="row text-center">

                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ">


<?php
  $condition = "";

    $person_name = mysqli_escape_string($conn, $_POST["person_name"]);
    $person_name = str_replace("%", "\%", $person_name);
    $year = mysqli_escape_string($conn, $_POST["year"]);
    $year = str_replace("%", "\%", $year);
    $month = mysqli_escape_string($conn, $_POST["month"]);
    $month = str_replace("%", "\%", $month);
    $date = mysqli_escape_string($conn, $_POST["date"]);
    $date = str_replace("%", "\%", $date);
    
    $sql_person_id = "SELECT person_id FROM people WHERE person_name = '$person_name'";
    print($sql_person_id);
    $res_person_id = mysqli_query($conn, $sql_person_id);

    $person_id = mysqli_fetch_array($res_person_id)["person_id"];
    $condition = "WHERE person_id = $person_id";

    //日付指定の条件
    if ($year){ 
      $year ."AND year= $year";
    }
    if ($month){ 
      $condition ."AND month = $month";
    }
    
    if ($date){ 
      $condition."AND date = $date";
    }

  $sql_ = "SELECT * FROM purchase ".$condition;
  $sql = "select items.genru_name,items.item_name,purchase.count,purchase.price from purchase ,items where purchase.item = items.item_name and purchase.person_id = ".$person_id;
  print($sql);
  $res = mysqli_query($conn, $sql);
  print("<table border=\"1\">");
  print("<tr><td>ジャンル</td><td>商品名</td><td>単価</td><td>個数</td><td>小計</td></tr>");

  while($row = mysqli_fetch_array($res)) {
      $prices = $row["price"] * $row["count"];
      print("<tr>");
      print("<td>".$row["genru_name"]."</td>");
      print("<td>".$row["item_name"]."</td>");
      print("<td>".$row["price"]."</td>");
      print("<td>".$row["count"]."</td>");
      print("<td>".$prices."</td>");
      print("</tr>");
  }
  print("</table>");
  mysqli_free_result($res);

  $sql1 = "select items.genru_name,sum(purchase.price*purchase.count) from purchase ,items where purchase.item = items.item_name and purchase.person_id =".$person_id. " group by items.genru_name";
  $res1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($res1);
  print($sql1);
  $res1 = mysqli_query($conn, $sql1);
  while($row1 = mysqli_fetch_array($res1)) {
    print("<h4>");
    print($row1["genru_name"]);
    print($row1["sum(purchase.price*purchase.count)"]);
    print("円</h4>");
  }

  $sql2 = "SELECT SUM(price*count) FROM purchase ".$condition;
  $res2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($res2);
  print($sql1);
  print("<br/>");
  print("<br/>");
  print("<br/>");
  print("<h3>合計");
  print($row2["SUM(price*count)"]);
  print("円</h3>");
?>
</div>
</div>
</div>
</section>
</body>
</html>
