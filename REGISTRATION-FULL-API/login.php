<?php
require "./db.php";
$res = array();
header('Content-Type: application/json; charset=utf-8');

$op['res'] = false;
$op['email_empty'] = false;
$op['email_wrong_format'] = false;
$op['no_email'] = false;
$op['pass_length'] = false;
$op['wrong_pass'] = false;
$op['pass_empty'] = false;
$op['user_api'] = false;

$isEmail = false;
$password = $email = null;

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $email_check = $conn->prepare("SELECT * FROM usersdb WHERE email =:email");
            $email_check->execute(['email' => $_POST['email']]);
            $email_res = $email_check->fetch();

            if ($email_res) {
                $email = $_POST['email'];

                $apikey = null;
                $api_check = $conn->prepare("select userapi from usersdb where email like :email");
                $api_check->execute(['email' => $_POST['email']]);
                $api_res = $api_check->fetch();

                $isEmail = true;
                // if email is valid
            } else {
                //email not found
                $op['no_email'] = true;
            }
        } else {
            $email = null;
            $op['email_wrong_format'] = true;
            // array_push($res, "Wrong email");
        }
    } else {

        $op['email_empty'] = true;
        $email = null;
    }
    //email close


    //password start
    if ($isEmail) {
        if (isset($_POST['pass']) && !empty($_POST['pass'])) {
            if (strlen($_POST['pass']) >= 8) {

                $password_check = $conn->prepare("SELECT * FROM usersdb WHERE email=:email AND pass=:pass");
                $password_check->bindValue(':email', $_POST['email']);
                $password_check->bindValue(':pass', $_POST['pass']);
                $password_check->execute();
                $password_res = $password_check->fetch();

                if ($password_res) {
                    $password = $_POST['pass'];
                    // if password is match
                } else {
                    //password not found
                    $op['wrong_pass'] = true;
                }
            } else {
                $op['pass_length'] = true;
            }
        } else {
            $password = null;
            $op['pass_empty'] = true;
        }
    }
    //password close


    if ($password != null && $email != null) {
        //check if values is empty or not
        $op['res'] = true;
        $op['user_api'] = $api_res[0];

        //  print_r( $api_res);
    } else {
        $op['res'] = false;
    }
}
$temp[0] = $op;

echo json_encode($temp, true);
