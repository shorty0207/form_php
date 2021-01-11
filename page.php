<?php
echo '<pre>';
//print_r($_POST);
echo '</pre>';

$array = [
    [
        'e-mail' => 'lebron@one.lt',
        'password' => 'lebronjames23'
    ],
    [
        'e-mail' => 'kobe@one.lt',
        'password' => 'blackmamba8'
    ],
    [
        'e-mail' => 'micheal@one.lt',
        'password' => 'michaeljordan23'
    ],
];
$email = $password = $passwordConfirm = $gender = $newsLetter = $montUpd = '';
$emailErr = $passwordErr = $passwordConfirmErr = $genderErr = '';

$finalArr = [];
$newArray =[];
$var = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Email validacija =======================================
    if (empty($_POST['email'])) {
        $emailErr = 'Please fill in you email';
    } else {
        $email = test_input($_POST['email']);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "You Entered An Invalid Email Format";

        }foreach ($array as $user) {
            if ($user['e-mail'] === $email) {
                $emailErr = 'That email does exist!';
            }
        }
    }

    if (empty($_POST['password'])) {
        $passwordErr = 'Please enter password';
    } else {
        $password = test_input($_POST['password']);
        if (!preg_match("#[0-9]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
    }

    if (empty($_POST['passwordConfirm'])) {
        $passwordConfirmErr = 'Please confirm password';
    }  else {
        $passwordConfirm = test_input($_POST['passwordConfirm']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $passwordConfirmErr = 'Password does not match';
        }
    }
    if ($_POST['password'] === $_POST['passwordConfirm']) {
        if (empty($emailErr) && empty($passwordErr) && empty($passwordConfirmErr) && empty($var)) {
            // klaidu nera
            // echo '<h1>Klaidu nera</h1>';
            $newArray[] =  [
                'e-mail' => ($_POST['email']),
                'password' => ($_POST['password'])
            ];
            $finalArr = array_merge($array, $newArray);
            foreach ($array as $user) {
                if ($user['e-mail'] === $email) {
                    $var = 'That email does exist!';
                }
            }
            Header('Location: success.php');
        }
    }


} // if post end

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function showInputError($errorField)
{
    if ($errorField !== '') {
        return "<span class='error-alert'>$errorField</span>";
    }
}

function outputErrorClass($errorField)
{
    if ($errorField !== '') {
        return 'error-input';
    }
}