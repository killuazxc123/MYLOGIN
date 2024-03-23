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
            $emailErr = 'Email does not match!';
            $passwordErr = 'Incorrect Password!';
        }
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
    <!--CSS-->
    <link rel="stylesheet" href="styling1.css?v=<?php echo time(); ?>">
    <!--boxicons CSS-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    

    <section class="container forms">
    <div class="form login">
        <div class="form-content">
            <header>Welcome</header>

            <form method="post" action="">
                <div class="field input-field">
                    <input type="email" name="email"  value="<?php echo $email?>" placeholder="Phone number, username, or email">
                    <span class="Error"><?php echo $emailErr;?></span>
                </div>

                <div class="field input-field">
                    <input type="password" name="password" value="<?php echo $password?>" placeholder="Password">
                    <span class="Error"><?php echo $passwordErr;?></span>
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                
                <div class="form-link">
                    <a href="zxc.php" class="forgot-pass">Forgot password?</a> 
                </div>

                <div class="field input-field">
                <button>Continue</button>
                </div>
            </form>
            
            <div class="form-link">
                <span>Don't have an account? <a href="2SignupPage.php" class="link signup-link">Sign up</a></span> 
            </div>
        </div>
        
        <div class="line"></div>
        
        <div class="media-optionsf">
            <a href="https://www.facebook.com/" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Continue with Facebook</span>
            </a>
        </div>

        <div class="media-optionsg">
            <a href="https://www.google.com/account/about/" class="field google">
               <img src="google.png" alt="" class="google-img">
                <span>Continue with Google</span>
            </a>
        </div>
    </div>
    </section>
</body>
</html>