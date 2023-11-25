<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bg color</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <style>
        .container {
            max-width: 300px;
            background-color: white;
            border-radius: 5%;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .hed {
            font-size: 1.4rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="bgcolor.php" method="post" class="row g-3">



            <div class="col-md-12 col-sm-12">
                <div class="hed">Select Background Color</div>
                <hr>
                <div class="form-check">
                    <input type="radio" name="color" value="red" id="red" class="form-check-input">
                    <label for="red" class="form-check-label" >Red Color</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="color" value="yellow" id="yellow" class="form-check-input">
                    <label for="yellow" class="form-check-label" >Yellow Color</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="color" value="green" id="green" class="form-check-input">
                    <label for="green" class="form-check-label" >Green Color</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="color" value="blue" id="blue" class="form-check-input">
                    <label for="blue" class="form-check-label" >Blue Color</label>
                </div>

            </div>

            <input type="submit" name="submit" value="Change Baground Color" class="btn btn-primary">

        </form>
    </div>


    <?php
    if (isset($_POST["submit"])) {
        if (isset($_POST["color"])) {
            $color = $_POST["color"];
            echo "<style>
        body{
            background-color: $color;
        }
        </style>";
        } else {
            echo "please select a coloe";
        }
    }
    ?>
</body>

</html>
