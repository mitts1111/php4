<?php
session_start();
require_once('funcs.php');
loginCheck();

$name =$_POST['bookname'];
$url =$_POST['url'];
$content =$_POST['bookcomment'];
$type =$_POST['type'];
$id = $_POST['id'];



require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare(
    'UPDATE
                        gs_bm_table2
                        SET bookname = :bookname,
                        url = :url, 
                        bookcomment = :bookcomment, 
                        type = :type, 
                        time = sysdate()
                        WHERE id = :id;');

$stmt->bindValue(':bookname', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $content, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute(); //実行

if ($status == false) {
    sql_error($stmt);
  } else {
    redirect('index.php');
  }
