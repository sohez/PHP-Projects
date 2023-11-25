<?php
require "./db.php";
header('Content-Type: application/json; charset=utf-8');

$op['res'] = false;
$op['email_empty'] = false;
$op['email_wrong_format'] = false;
$op['no_email_exist'] = false;
$op['email_sent'] = false;

$op['pass_length'] = false;
$op['wrong_otp'] = false;
$op['pass_empty'] = false;

$password = $email = null;

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {

    //email insert
    if (isset($_POST['email'])) {

        if (!empty($_POST['email'])) {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

                $email_check = $conn->prepare("SELECT * FROM usersdb WHERE email =:email");
                $email_check->execute(['email' => $_POST['email']]);
                $email_res = $email_check->fetch();

                $code_rnd = random_int(1111, 9999);

                if ($email_res) {

                    $code = $conn->prepare("UPDATE usersdb SET code = :code
                WHERE email = :email");
                    $code->bindParam(':email', $_POST['email']);
                    $code->bindParam(':code', $code_rnd);
                    $code->execute();
                    $code_res = $code->fetch();

                    $to = $_POST['email'];
                    $subject = "verification message for mCodo";

                    $message = "<b>Your OTP is : </b>";
                    $message .=  $code_rnd;

                    $header = "From:sohez@help.com \r\n";
                    // $header .= "Cc:afgh@somedomain.com \r\n";
                    // $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html\r\n";

                    $retval = mail($to, $subject, $message, $header);

                    if ($retval == true) {

                        $op['email_sent'] = true;
                        $op['res'] = true;

                        //  echo "Message sent successfully...";

                    } else {

                        $op['email_sent'] = false;

                        //  echo "Message could not be sent...";
                    }


                    // if email is valid
                } else {
                    //email not found
                    $op['no_email_exist'] = true;
                }
            } else {
                $email = null;
                $op['email_wrong_format'] = true;
            }
        } else {

            $op['email_empty'] = true;
        }
    }
    //email close

    if (isset($_POST['code']) && isset($_POST['reset_email']) && isset($_POST['npass'])) {

        $user_code = $_POST['code'];
        $user_email = $_POST['reset_email'];
        $user_new_pass = $_POST['npass'];

        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

            $email_check = $conn->prepare("SELECT * FROM usersdb WHERE email =:email");
            $email_check->execute(['email' => $user_email]);
            $email_res = $email_check->fetch();
            if ($email_res) {

                $code = $conn->prepare("select code from usersdb where email like :email");
                $code->execute(['email' => $user_email]);
                $code_res = $code->fetch();
                if ($code_res[0] == $user_code) {
                    if ($user_new_pass > 7) {

                        $update_pass = $conn->prepare("UPDATE usersdb SET pass=:pass WHERE email=:email");
                        $update_pass->bindParam(':email', $user_email);
                        $update_pass->bindParam(':pass', $user_new_pass);
                        $update_pass->execute();
                        $update_pass_res = $update_pass->fetch();

                        $op['res'] = true;

                        $code_r_num = 1000;
                        $code_r = $conn->prepare("UPDATE usersdb SET code =:code
                WHERE email =:email");
                        $code_r->bindParam(':email', $_POST['email']);
                        $code_r->bindParam(':code', $code_r_num);
                        $code_r->execute();
                        $code_r_res = $code_r->fetch();
                    } else {
                        $op['pass_length'] = true;
                    }
                } else {
                    $op['wrong_otp'] = true;
                }
            } else {
                $op['no_email_exist'] = true;
            }
        } else {
            $op['email_wrong_format'] = true;
        }
    }
}
$temp[0] = $op;
echo json_encode($temp, true);
