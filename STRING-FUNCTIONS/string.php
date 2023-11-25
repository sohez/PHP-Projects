<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Programs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


    <style>
        body {
            font-size: 1.2rem;
            background-color: #252525;
        }

        .sp {
            height: 15px;
        }

        .bt {
            padding: 8px 12px;
            width: 100%;
            font-size: 0.80rem;

        }

        .wd {
            max-width: 200px;
        }

        .editext {
            font-size: 0.90rem;
            outline: none;
            background: none;
            border: none;
            color: white;
            border-bottom: 1px solid red;
            margin-top: 30px;
        }

        .btn {
            width: 100%;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <center>
            <h1 class="fw-bold text-danger">String Function Programs</h1>
            <form action="string.php" method="POST">
                <div class="outline">
                    <input type="text" name="inp" placeholder="Enter your text" class="editext">
                    <br>
                </div>
                <div class="sp"></div>
                <div class="wd">

                    <input type="submit" value="STRING_REVERSE" name="submit" class="btn btn-outline-danger ">

                    <input type="submit" value="STRING_LENGTH" name="submit" class="btn btn-outline-warning ">

                    <input type="submit" value="STRING_COUNT" name="submit" class="btn btn-outline-warning ">

                    <input type="submit" value="STRING_UPPER_CASE" name="submit" class="btn btn-outline-success ">

                    <input type="submit" value="STRING_LOWER_CASE" name="submit" class="btn btn-outline-success ">

                </div>

            </form>
            <div class="card" style="max-width: 38rem; margin-bottom: 70px;">

                <div class="card-body">
                    <p class="card-text">

                        <?php
                        $value = "";
                        $subvalue = "";
                        if (isset($_POST["submit"])) {

                            if (empty($_POST["inp"])) {
                                $subvalue = "Please Enter a Text..!";
                            } else {

                                $str1 = $_POST["inp"];
                                $value = $_POST["submit"];
                                switch ($value) {
                                    case "STRING_REVERSE":
                                        $subvalue = "Reverse string is:";
                                        $value = strrev($str1);
                                        break;
                                    case "STRING_COUNT":
                                        $subvalue = "In this String Words is:";
                                        $value = str_word_count($str1);
                                        break;
                                    case "STRING_LENGTH":
                                        $subvalue = "In this String Charecture is:";
                                        $value = strlen($str1);
                                        break;
                                    case "STRING_UPPER_CASE":
                                        $subvalue = "String in UPPER CASE:";
                                        $value = strtoupper($str1);
                                        break;
                                    case "STRING_LOWER_CASE":
                                        $subvalue = "String in Lower CASE:";
                                        $value = strtolower($str1);
                                        break;
                                }
                            }
                        }
                        ?>
                    <div class="outputbox"><?php echo "<p style='color:red;'>$subvalue</p>" . "<br>" . $value; ?></div>

                    </p>
                </div>
            </div>
        </center>
    </div>
</body>

</html>
