<?php
$flag = "start";
 if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password ="";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to database failed". mysqli_connect_error()); 
    }
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `db`.`users` WHERE username = '$name' AND password='$password'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        // echo "Sucess";
        $flag = "sucess";
      } else {
        $flag = "0";
      }
    //   echo $sql;
      $con->close();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="name">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <!-- <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="#">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div> -->
                <div class="card-footer" style="color: white;">
                    <?php
                    if($flag == "sucess"){
                        echo "<h6><b>Sucess</b></h6>";
                        echo "<span style='font-size: small;'>$sql</span>";
                    }
                    else if($flag == "0"){
                        echo "<h6><b>login failed</b></h6>"; 
                        echo "<span style='font-size: small;'>$sql</span>"; 
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>