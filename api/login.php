<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $response = array();
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek = "SELECT * FROM users WHERE username='$username' and password='$password'";
  $result = mysqli_fetch_array(mysqli_query($con, $cek));

  if (isset($result)) {
    $response['status'] = 200;
    $response['message'] = "Login Berhasil";
    echo json_encode($response);
  } else {
    $response['status'] = 400;
    $response['message'] = "Username atau Password SALAH";
    echo json_encode($response);
  }
}
