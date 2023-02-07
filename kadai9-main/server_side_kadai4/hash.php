<?php

$password = 'test1';

$hashed_pw = password_hash($password, PASSWORD_DEFAULT);

echo $hashed_pw;

echo '<pre>';
var_dump(password_verify('test1', $hashed_pw));
echo '</pre>';
