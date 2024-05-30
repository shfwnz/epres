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
          $_SESSION['fullname'] = $data['fullname'];
          $_SESSION['email'] = $data['email'];
          $_SESSION['kelas'] = $data['kelas'];
          $_SESSION['ekstraa'] = $data['ekstraa'];
          $_SESSION['gender'] = $data['gender'];
          $_SESSION['nis'] = $data['nis'];
          $_SESSION['user_tipe'] = $data['user_tipe'];

          if ($data['user_tipe'] == 'admin') {
            echo json_encode(array('success' => true, 'redirectUrl' => 'dashboard.php'));
        } else {
            echo json_encode(array('success' => true, 'redirectUrl' => 'pages/dashboard-siswa.php'));
        }

      } else { 
        echo json_encode(array('success' => false, 'message' => 'Username/Password salah!'));
      }
?>