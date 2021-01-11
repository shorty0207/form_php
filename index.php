<?php

require('./page.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form action="" method="post">
    <div class="inputStyle">
        <label for="email">El. Pastas</label>
        <input class="<?php echo outputErrorClass($emailErr) ?>" type="text" name="email" id="email" value="<?php echo $email ?>">
        <?php echo showInputError($emailErr) ?>
    </div>
    <div class="inputStyle">
        <label for="password">Slaptazodis</label>
        <input type="text" name="password" id="password" value="<?php echo $password ?>">
        <?php echo showInputError($passwordErr) ?>
    </div>
    <div class="inputStyle">
        <label for="passwordConfirm">Pakartoti slaptazodi</label>
        <input type="text" name="passwordConfirm" id="passwordConfirm" value="<?php echo $passwordConfirm ?>">
        <?php echo showInputError($passwordConfirmErr) ?>
    </div>
    <div class="submit"> <button>Registruotis</button></div>
    <div>
        <?php echo $var ?>
    </div>
</form>
</body>
</html>