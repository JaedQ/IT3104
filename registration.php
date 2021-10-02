<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div>
        <?php
        if(isset($_POST['create'])){

            $fname          = $_POST['firstname'];
            $lname          = $_POST['lastname'];
            $email          = $_POST['email'];
            $addr           = $_POST['addr'];
            $phone_num      = $_POST['phonenumber'];
            $passw          = $_POST['password'];
            $gnder          = $_POST['sex'];
        
            $hashedPWD = password_hash($passw, PASSWORD_DEFAULT);

            $sql = "INSERT INTO useraccounts(fname, lname, email, addr, phone_num, passw, gender) VALUES(?,?,?,?,?,?,?)";
            $nsrt = $db->prepare($sql);
            $result = $nsrt->execute([$fname, $lname, $email, $addr, $phone_num, $hashedPWD, $gnder]);
            
            if($result){
                echo '<span style="color:#006400;text-align:center;"><b>Successfully Submitted & Saved to DataBase!</b></span>';
            }else{
                echo '<span style="color:#006400;text-align:center;"><b>Error! Something is wrong...</b></span>';
            }
            
        }
        ?>
    </div>

    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <h1>REGISTRATION FORM</h1>
                        <hr class="mb-3">

                        <label for="firstname"><b>First Name</b></label>
                        <input class="form-control" id="firstname" type="text" name="firstname" required placeholder="Enter First Name">
                        
                        <br>
                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" id="lastname"  type="text" name="lastname" required placeholder="Enter Last Name">

                        <br>
                        <label for="email"><b>Email</b></label>
                        <input class="form-control" id="email"  type="email" name="email" required placeholder="Enter Email">

                        <br>
                        <label for="Address"><b>Address</b></label>
                        <input class="form-control" id="addr"  type="text" name="addr" required placeholder="Enter Address">

                        <br>
                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" id="phonenumber"  type="text" name="phonenumber" required placeholder="Enter Phone Number">

                        <br>
                        <label for="password"><b>Password</b></label>
                        <input class="form-control" id="password"  type="password" name="password" required placeholder="Enter Password"> 

                        <br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" value="Male" required>
                        <label class="form-check-label" ><b>Male</b></label>
                        </div>

                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" value="Female" required>
                        <label class="form-check-label" ><b>Female</b></label>
                        </div>

                        <hr class="mb-3">
                        <br>
                        <input class="btn btn-primary" type="submit" id="register" name="create" value="SUBMIT">
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
