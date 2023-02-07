<?php




$name =$_POST['bookname'];
$url =$_POST['url'];
$content =$_POST['bookcomment'];
$type =$_POST['type'];


try {

  $pdo = new PDO('mysql:dbname=kadai_php3;charset=utf8;host=localhost','root',''); //root,hostなど環境によって異なる

} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

$stmt = $pdo->prepare("INSERT INTO 
                        gs_bm_table2(id,bookname,url,bookcomment,type,time) 
                        VALUES(NULL,:bookname,:url,:bookcomment,:type,sysdate()) " ); 

$stmt->bindValue(':bookname', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $content, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);



$status = $stmt->execute();


if ($status == false) {
  sql_error($stmt);
} else {
  redirect('index.php');
}
?>
