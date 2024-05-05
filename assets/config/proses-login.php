<?php
  include 'connect.php';
  
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Your existing login logic
      $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
      
      $result = mysqli_query($is_connect, $query);
      
      $data = mysqli_fetch_assoc($result);
      if ($data != null) {
          session_start();
          $_SESSION['id'] = $data['id'];
          $_SESSION['username'] = $username;
          $_SESSION['name'] = $data['nama'];

          header('Location: ../../dashboard.php');

      } else {
          echo 'login gagal'; // Or a more informative message
      }
?>