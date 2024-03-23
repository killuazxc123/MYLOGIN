<?php

    $email = $password = '';
    $emailErr = $passwordErr = '';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(empty($_POST['email'])){
            $emailErr = 'Email is Required!!!';
        }else{
            $email = $_POST['email'];
        }

        if(empty($_POST['password'])){
            $passwordErr = 'Password is Required!!!';
        }else{
            $password = $_POST['password'];
        }

        
        if($email && $password){
            include 'connect.php';
            $check_email = mysqli_query($connections, "SELECT * FROM kkk_login WHERE email='$email'");
            $check_email_row = mysqli_num_rows($check_email);

            if($check_email_row>0){
                while($row = mysqli_fetch_assoc($check_email)){
                    $db_email = $row['email'];
                    $db_password = $row['password'];
                    $db_account_type = $row['account_type'];
                    if($email == $db_email && $password == $db_password){
                        if($db_account_type == '1'){
                            //echo "<script>window.location.href='admin';</script>";
                            header ("Location: admin");
                            exit();
                        }else{
                            //echo "<script>window.location.href='user';</script>";
                            header ("Location: user");
                            exit();
                        }
                    }
                }
            }
            $emailErr = 'Email does not match!!!';
            $passwordErr = 'Incorrect Password!!!';
        }
    }

/*
        //$querySelectData = "SELECT * FROM login_tbl";
        //$result = $connections->query($querySelectData);

        $check_email = mysqli_query($connections, "SELECT * FROM login_tbl WHERE email='$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row>0){
            while($row = mysqli_fetch_assoc($check_email)){
                if($email = $_POST['email'] == $row["email"] && $password = $_POST['password'] == $row["password"]){
                    echo 'Log in Success! Welcome: ';
                    $userLoggedIn = true;
                
                    $db_password = $row['password'];
                    $db_account_type = $row['account_type'];
                    if($db_account_type == '1'){
                        //echo "<script>window.location.href='admin';</script>";
                        header ("Location: admin");
                        exit();
                    }else{
                        //echo "<script>window.location.href='user';</script>";
                        header ("Location: user");
                        exit();
                    }
                }
            }
            $emailErr = 'Email is not registered!';
            $passwordErr = 'Incorrect Password!';
        }else{
            //$emailErr = 'Email is not registered!';
            //$passwordErr = 'Incorrect Password!';
        }
        
    }
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapatnapo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Log In System</h1>
    <form class="container1" action="" method="POST">
        <label for="email">Email</label>
        <span><?php echo $emailErr; ?></span>
        <input type="text" class="getin" name="email" id="email" placeholder="Enter Email">

        <label for="password">Password</label>
        <span><?php echo $passwordErr; ?></span>
        <input type="password" class="getin" name="password" id="password" placeholder="Enter Password">

        <button type="submit" class="submit">Submit</button>
    </form>
</body>
</html>