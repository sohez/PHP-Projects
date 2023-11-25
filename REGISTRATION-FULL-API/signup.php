<?php
session_start();
require "./db.php";
$res = array();
header('Content-Type: application/json; charset=utf-8');
$op['res'] = false;
$op['email_empty'] = false;
$op['email_wrong_format'] = false;
$op['email_exist'] = false;
$op['pass_length'] = false;
$op['wrong_pass'] = false;
$op['pass_empty'] = false;
$op['user_api'] = false;

$userapi = null;


if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    //Set up data insert
    $stmt = $conn->prepare("INSERT INTO usersdb (email, pass, userapi)
    VALUES (:email, :pass, :userapi)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $password);
    $stmt->bindParam(':userapi', $userapi);

    //email insert
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $email_check = $conn->prepare("SELECT * FROM usersdb WHERE email =:email");
            $email_check->execute(['email' => $_POST['email']]);
            $email_res = $email_check->fetch();

            if ($email_res) {
                $op['email_exist'] = true;
                // Already hav a e mail log in please
            } else {
                $email = $_POST['email'];
            }
        } else {
            $email = null;
            $op['email_wrong_format'] = true;
        }
    } else {
        $email = null;
        $op['email_empty'] = true;
    }
    //email close


    //password start
    if (isset($_POST['pass']) && !empty($_POST['pass'])) {
        if (strlen($_POST['pass']) >= 8) {
            $password = $_POST['pass'];
        } else {
            $op['pass_length'] = true;
            //8 length
        }
    } else {
        $password = null;
        $op['pass_empty'] = true;
        //Plese enter password
    }

    //password close
    function rrr($co)
    {
        $rndstr = generateRandomString(10);
        $api_check = $co->prepare("SELECT * FROM usersdb WHERE userapi =:userapi");
        $api_check->execute(['userapi' => $rndstr]);
        $api_res = $api_check->fetch();

        if ($api_res) {
            rrr($co);
            // array_push($res, "Alrady email"); 
        } else {
            global $userapi;
            $userapi = $rndstr;
        }
    }
    rrr($conn);
    if ($password != null && $email != null && $userapi != null) {
        //check if values is empty or not
        $stmt->execute();
        $op['user_api'] = $userapi;
        $op['res'] = true;
    } else {
        $op['res'] = false;
    }
}

function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
//echo $_POST['email']."  ".$_POST['pass']."  ".$userapi;

$temp[0] = $op;
echo json_encode($temp, true);
