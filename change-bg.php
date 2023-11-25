<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-size: 1rem;
            background-color: white;
        }

        .cont {
            background-color: white;
            max-width: 300px;
            max-height: 350px;
            margin: 15px;
            padding: 20px;
            border: 1px solid #252525;
        }

        .sp {
            height: 10px;

        }

        .color {
            font-size: 1.1rem;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            color: rgb(25, 25, 25);
            ;
        }

        .btn {
            padding: 8px 20px 8px 20px;
            border: none;
            outline: none;
            font-size: 1.1rem;
            background-color: #252525;
            color: white;
            transition: 0.3s;
        }

        .btn:hover {
            padding: 9px 21px 9px 21px;
            font-size: 1rem;
            background-color: white;
            color: #252525;
            border: 2px solid #252525;
            border-radius: 10px 10px;
        }
        span{
            color: red;
        }
    </style>
</head>

<body>
    <!--code by sohel-->

    <?php
    $namecolor = array("green", "red", "yellow", "black", "pink", "orange","blue");

    $arysize = sizeof($namecolor) - 1;
    $ret = false;
    $span = "";
    if (isset($_POST["submit"])) {
        if (isset($_POST["box"])) {
            $box = $_POST["box"];
        } else {
            $box = "off";
        }

        if (empty($_POST["color"])) {
            $span = "please Enter any color name";
        } else {
            $color = $_POST["color"];
            if ($box == "off") {

                for ($i = 0; $i <= $arysize; $i++) {
                    if ($color == $namecolor[$i]) {
                        echo  "<style> body{ background-color: $namecolor[$i]; } </style>";
                        $ret = true;
                    }
                }

                if ($ret != true) {
                    $span = "Color Name Not Found in Array list";
                }
            } else {
                echo  "<style> body{ background-color: $color; } </style>";
            }
        }
    }

    ?>


    <center>
        <div class="cont">
            <form action="loper.php" method="POST">
                <input type="text" name="color" class="color" placeholder="enter your color name">
                <br>
                <div class="sp"></div>
                if use custom color :
                <input type="checkbox" class="box" name="box">
                <div class="sp"></div>
                <br>
                <input type="submit" name="submit" class="btn" value="set bg">

            </form>
            <br>
            <span><?php echo "$span"; ?></span>

        </div>

    </center>

</body>

</html>
