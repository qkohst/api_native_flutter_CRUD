<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $response = array();
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $nama = $_POST['nama'];

  $cek = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_fetch_array(mysqli_query($con, $cek));

  if (isset($result)) {
    $response['value'] = 400;
    $response['message'] = "Username Telah Digunakan";
    echo json_encode($response);
  } else {
    $insert = "INSERT INTO users VALUE(NULL, '$username', '$password', '1', '$nama', '1', NOW())";
    if (mysqli_query($con, $insert)) {
      $response['value'] = 200;
      $response['message'] = "Berhasil didaftarkan";
      echo json_encode($response);
    } else {
      $response['value'] = 400;
      $response['message'] = "Gagal didaftarkan";
      echo json_encode($response);
    }
  }
}
