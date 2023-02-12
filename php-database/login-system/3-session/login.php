<?php
session_start();


// Cek Session jika user sudah login maka tidak boleh kembali ke halaman login sebelum logout 
if( isset($_SESSION["login"]) ){
    header("Location: index.php");
    exit;
}


require_once 'functions.php';

    if(isset($_POST['login'])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        // query username ke database yang username = dengan username yang di input User
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' "); 

        // cek username
        if(mysqli_num_rows($result) === 1){

            // cek passwordnya
            $row = mysqli_fetch_assoc($result);

          if ( password_verify($password, $row["password"]) ){ // bandingkan dengan password verify 
            //  Set Session
            $_SESSION["login"] = true;

              header("Location: index.php");
              exit;
          }


        //     if ($password === $row["password"]) {
        //         header("Location: index.php");
        //         exit;
                
        // };


        };

        $error = true;  // jika program true maka error tdk akan di jalankan karna ada sintaks exit;
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login </title>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if( isset($error) ) :?>
        <p style="color:red; font-style:italic;">Username / Password salah</p>
      <?php endif; ?>    
    <form action="" method="post">
    <ul>
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">        
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">        
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
    </form>

</body>
</html>