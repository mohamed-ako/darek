<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #0f00b6 !important;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07)!important;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    transition:.3s
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
button:hover{
    background-color: rgb(201, 201, 201);

}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
    <title>Document</title>
</head>
<body class='loginPage'>
<nav>
<ul>
        <!-- <li><a href="index.php">Home</a></li> -->
       
        <li><a href="home.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <!-- <li><a href="login.php">Login</a></li> -->
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>



    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="signup_process.php" method='post'>
        <h3>Sign Up Here</h3>

        <form action="signup_process.php" method="post">
    <input type="text" name="first_name" id="" placeholder='First Name' required><br>
    <input type="text" name="last_name" id="" placeholder='Last Name' required><br>
    <input type="text" name="username" id="" placeholder='Username' required><br>
    <input type="password" name="password" id="" placeholder='Password' required><br>
    <input type="email" name="email" id="" placeholder='Email' required><br>
        <button type='submit'>Sign Up</button>
 

    </form>
   

 
    <center style="color:red;" >
    <?php
    session_start();
    // $pass_err = '';
    if (isset($_SESSION['signup_error'])) {
        echo '<p style="color:red;">'.$_SESSION['signup_error'].'</p>';
        // $pass_err = $_SESSION['signup_error'];
        unset($_SESSION['signup_error']); // Unset the session variable after displaying the error
    }
    // echo '<p>'.$pass_err.'</p>'
    ?>
    </center>
</form>
</body>
</html>
