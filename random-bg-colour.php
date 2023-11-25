<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php

    $red = random_int(0, 255);
    $green = random_int(0, 255);
    $blue = random_int(0, 255);
    echo "
<style>
html{
    background-color: rgb($red, $green, $blue);
}
</style>

"

    ?>
    <style>
        .center {
            max-width: fit-content;
            height: 120px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 5px 12px;
            border-radius: 8px;
            clear: both;
        }

        .btn {
          padding: 12px 22px;
          outline: none;
          border: 0.2px solid black;
          color: white;
          background-color: rgb(50, 168, 78);
          font-size: 1.2rem;
          border-radius: 8px;
          font-weight: 800;
        }
        .btn:hover{
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="center">
        <form action="" method="post">
            <input class="btn" type="submit" value="change Background color">
        </form>
        <br>
    </br>
        
    </div>
    <div class="copy">
            <?php echo "rgb($red, $green, $blue)"?> 
        </div>
</body>

</html>
