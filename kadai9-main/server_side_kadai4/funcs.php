<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


function db_conn() 
{
  try {
      $db_name = 'kadai_php3';
      $db_id   = 'root'; 
      $db_pw   = ''; 
      $db_host = 'localhost';
      $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
      return $pdo; 
  } catch (PDOException $e) {
       exit('DB Connection Error:' . $e->getMessage());
   }
  }

function sql_error($stmt)
{

    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}



function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


function loginCheck()
{
    if( !isset($_SESSION['chk_ssid'])|| $_SESSION['chk_ssid'] != session_id()){
       
    exit('LOGIN ERROR');
    } else {
    session_regenerate_id(true); 
 
    $_SESSION['chk_ssid'] = session_id();
    }
}