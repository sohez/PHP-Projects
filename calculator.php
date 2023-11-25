<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator by Sohez</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <style>
        .btn {

            padding: 15px 20px;
            margin: 2px;
            width: 80px;
           
        }
        .wdt{
            width: 80%;
        }
        .container{
            max-width: 340px;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        span{
            color: red;
            font-size: 0.8rem;
        }
    </style>
</head>

<body style="width: 50%; margin:auto;">
    <div class="container">
        <?php
        $num1 = $num2 = $add = $sub = $mul = $divi = $modu = $result = $c = $error = "";
        if (isset($_POST["submit"])) {

            if (isset($_POST["num1"]) && isset($_POST["num2"])) {
                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $c = $_POST["submit"];

                if (!empty($num1) && !empty($num2)) {

                    if (is_numeric($num1) && is_numeric($num2)) {

                        switch ($c) {
                            case '+':
                                $result = $num1 + $num2;
                                break;
                            case '-':
                                $result = $num1 - $num2;
                                break;
                            case '*':
                                $result = $num1 * $num2;
                                break;
                            case '/':
                                $result = $num1 / $num2;
                                break;
                            case '%':
                                $result = $num1 % $num2;
                                break;
                        }
                    } else {
                        $error = "please Enter Only Numbers";
                    }
                } else {
                    $error = "please enter any numbesrs";
                }
            }
        }
        ?>
        <h1 style="font-size: 1.5rem;">Calculator</h1>
        <form action="calculater.php" method="post" class="row g-3">


            <div class="col-md-12 col-sm-12">
              
                <input type="text" name="num1" class="form-control"  placeholder="First Number" requireed>
            </div>

            <div class="col-md-12 col-sm-12">
           
                <input type="text" name="num2" class="form-control"  placeholder="Second Number" requireed>
            </div>
           
                <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="+">
                </div>

                <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="-">
                </div>

                <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="*">
                </div>

                <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="/">
                </div>
            
                
                <div class="col-4">
                    <input type="submit" name="submit" class="btn btn-primary" id="" value="%">
                </div>
                
                <div class="col-md-12 col-sm-12">
                <input type="text" name="result" class="form-control" id="" value="<?php echo $result; ?>" placeholder="Result">
            </div>

            
        </form>
       <span><?php echo $error; ?></span> 
        
    </div>
</body>

</html>
