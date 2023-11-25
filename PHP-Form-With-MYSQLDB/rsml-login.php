<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSML Form BY Sohez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }

        span {
            color: red;
            font-size: small;
        }

        .wdt {
            width: 80%;
            margin: auto;
            margin-top: 30px;
            padding: 20px;
            border: 0.2px solid black;

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }



        @media (max-width: 767.98px) {


            .wdt {
                width: 98%;
            }

            .logo {
                display: none;
            }
        }
    </style>
</head>

<body>

    <?php
    //for DB
    $conn = mysqli_connect('localhost', 'root', '', 'sohez') or die('error');

    if (!$conn) {
        die('somthig worng');
    }

    ?>

    <?php

    $errofname = $erromname = $errolname = $gen = $erropnumber = $emailvalid = $passvalid = $errdate  = $ecource = "";

    $firstname = $middlename = $lastname = $gender = $phonenumber = $email = $password = $date1 = $cource = "";

    $er = $suc = $moj = "";



    if (isset($_POST["submit"])) {

        //for first name
        if (isset($_POST["fname"])) {
            if (!empty($_POST["fname"])) {
                $withoutsp = preg_match("/[^a-zA-Z ]+/", $_POST["fname"]);
                if ($withoutsp) {
                    $firstname = "";
                    $errofname = 'Wrong name format';
                } else {
                    $firstname = $_POST["fname"];
                }
            } else {
                $errofname = "Please Enter a First Name";
            }
        }

        //for middle name
        if (isset($_POST["mname"])) {
            if (!empty($_POST["mname"])) {
                $withoutsp = preg_match("/[^a-zA-Z ]+/", $_POST["mname"]);
                if ($withoutsp) {
                    $middlename = "";
                    $erromname  = 'Wrong name format';
                } else {
                    $middlename = $_POST["mname"];
                }
            } else {
                $erromname = "Please Enter a Middle Name";
            }
        }

        //for last name
        if (isset($_POST["lname"])) {
            if (!empty($_POST["lname"])) {
                $withoutsp = preg_match("/[^a-zA-Z ]+/",  $_POST["lname"]);
                if ($withoutsp) {
                    $lastname = "";
                    $errolname = 'wrong name format';
                } else {
                    $lastname = $_POST["lname"];
                }
            } else {
                $errolname = "Please Enter a Last Name";
            }
        }


        //for gender
        if (isset($_POST["gender"])) {
            $gender = $_POST["gender"];
        } else {
            $gen = "Please Select Gender";
        }



        //for phone number
        if (isset($_POST["number"])) {
            if (!empty($_POST["number"])) {
                if (is_numeric($_POST["number"]) && strlen($_POST["number"]) == 10) {
                    $phonenumber = $_POST["number"];
                } else {
                    $phonenumber = "";
                    $erropnumber = "Not a phone number";
                }
            } else {
                $erropnumber = "Please Enter a Phone Number";
            }
        }

        //date
        if (isset($_POST["date"])) {
            if (!empty($_POST["date"])) {
                $date1 = $_POST["date"];
            } else {
                $errdate = "select date of birth";
            }
        }

        //cource
        if (isset($_POST["cource"])) {
            if (!empty($_POST["cource"])) {
                $cource = $_POST["cource"];
            } else {
                $ecource = "select Cource";
            }
        }


        //For Email
        if (isset($_POST["email"])) {
            if (!empty($_POST["email"])) {
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailvalid = "Invalid email format";
                } else {
                    $email = $_POST["email"];
                }
            } else {
                $emailvalid = "Please Enter a Email";
            }
        }


        //for Password
        if (isset($_POST["pass"])) {
            if (!empty($_POST["pass"])) {
                if (strlen($_POST["pass"]) >= 8) {
                    $password = $_POST["pass"];
                } else {
                    $password = "";
                    $passvalid = "minimmun 8 length pass";
                }
            } else {
                $passvalid = "Please Enter a Password";
            }
        }


        if (empty($firstname && $middlename && $lastname && $gender && $phonenumber &&  $email &&  $password &&  $date1 && $cource)) {
            $er = "Fill the full form";
        }  //database mysql
        else {

            $sql = "insert into login(firstname,middlename,lastname,gender,phonenumber,email,password,date1,cource) values('$firstname','$middlename', '$lastname', '$gender', '$phonenumber', '$email', '$password', '$date1','$cource')";
            if (mysqli_query($conn, $sql)) {
                $suc = "Successfully Registred";
            } else {
                $er = "Somthing Wrong From Server...!";
            }
        }
    }
    ?>

    <div class="container">

        <div class="wdt">

            <div class="row g-3">

                <div class="col-md-2">
                    <img src="https://www.shahucollegelatur.org.in/img/rsmlogo.png" style="height: 100px; width: 90px;" class="logo">
                </div>

                <div class="col-md-10">
                    <h1 style="text-align: center; font-size: 1.3rem;"> RAJARSHI SHAHU MAHAVIDYALAYA (AUTONOMOUS), LATUR <br>
                        Registration Form </h1>

                </div>

            </div>

            <hr>
            <div class="row g-3">

                <div class="col-md-8">
                    <?php $date = date("d F Y D");
                    echo $date;
                    ?>
                </div>

            </div>

            <p style="color: red; font-size: 0.80rem;">All require</p>
            <hr>
            <form action="rsml-login.php" method="post" class="row g-3 ">

                <div class="col-md-4 col-sm-6">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" class="form-control" id="fname" required>

                    <span><?php echo  $errofname ?></span>
                </div>

                <div class="col-md-4 col-sm-6">
                    <label for="mname" class="form-label">Middle Name</label>
                    <input type="text" name="mname" placeholder="Middle Name" class="form-control" id="mname" required>
                    <span><?php echo $erromname ?></span>
                </div>

                <div class="col-md-4 col-sm-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" id="lname" required>
                    <span><?php echo $errolname ?></span>

                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="date" class="form-label">Date of Birth</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                    <span><?php echo $errdate ?></span>
                </div><br>


                <div class="col-md-6 col-sm-6">
                    <label for="pnumber" class="form-label">Phone Number</label>
                    <input type="text" name="number" class="form-control" placeholder="+91" class="form-control" id="pnumber" required>
                    <span><?php echo $erropnumber ?></span>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" placeholder="Email" class="form-control" id="email" required>
                    <span><?php echo $emailvalid ?></span>
                </div>

                <div class="col-md-6 col-sm-6">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass" placeholder="Password" class="form-control" id="pass" required>
                    <span><?php echo  $passvalid ?></span>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-check-label">Select Gender</div>
                    <div class="form-check">
                        <input type="radio" name="gender" value="male" id="Male" class="form-check-input">
                        <label class="form-check-label" for="Male">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" value="female" id="female" class="form-check-input">
                        <label class="form-check-label" for="female">Female</label><br>
                        <span><?php echo $gen ?></span>
                    </div>
                </div>




                <div class="form-check-label" for="cor">Select Cource</div>
                <div class="form-check">
                    <select name="cource" class="custom-select">
                        <option value="BVOC">B.voc</option>
                        <option value="BCA">BCA</option>
                        <option value="BTech">B.Tech</option>
                        <option value="BSC">BSC</option>
                    </select>
                </div>

                <input type="submit" name="submit" value="Registration" class="btn btn-primary " style="width: 300px;">
                <span><?php echo $er; ?></span>
                <span style="color: green;"><?php echo $suc; ?></span>

            </form>
            <br>
            <div>
                <p>Do You Have a Account? <a href="#">Login</a></p>
            </div>

        </div>

        <?php
        if (empty($firstname && $middlename && $lastname && $gender && $phonenumber &&  $email &&  $password &&  $date1)) {
            $er = "Fill the full form";
        } else {

            echo "<div class='table-responsive'>
<table class='table' style='margin-top: 50px;'>
  <tbody>
    <tr>
      <th scope='row'>First Name:</th>
      <td> $firstname </td>
    </tr>

   <tr>
      <th scope='row'>Middle Name:</th>
      <td>$middlename </td>
    </tr>
    
       <tr>
      <th scope='row'>Last Name:</th>
      <td> $lastname </td>
    </tr>
    
       <tr>
      <th scope='row'>Gender:</th>
      <td>$gender</td>
    </tr>
    
   <tr>
      <th scope='row'>Phone:</th>
      <td>$phonenumber</td>
    </tr>
    
   <tr>
      <th scope='row'>Email:</th>
      <td>$email</td>
    </tr>
    
   <tr>
      <th scope='row'>Password:</th>
      <td>$password</td>
    </tr>
    
   <tr>
      <th scope='row'>Date:</th>
      <td>$date1</td>
    </tr>
      <tr>
      <th scope='row'>Cource Name:</th>
      <td>$cource</td>
    </tr>
  </tbody>
</table>
</div>";
        }


        ?>
    </div>
</body>

</html>