<?php
    session_start();
    if (isset($_POST['from']))
    {
        if ($_POST['from'] == 'register')
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if ($username == '' || $password == '')
            {
                header('location:register.php?error=empty');
            }
            if (isset($users[$username]))
            {
                header('location:register.php?error=exist');
            }else
            {
                $_SESSION['isLogin'] = $username;
                $_SESSION['pathId'] = 0;
                $users = file_get_contents('user.json');
                $users = json_decode($users, true);
                $users[$username] = MD5($password);
                file_put_contents('user.json', json_encode($users));
            }
        }
        else if ($_POST['from'] == 'login')
        {
            $users = file_get_contents('user.json');
            $users = json_decode($users, true);
            $username = $_POST['username'];
            $password = MD5($_POST['password']);
            if (!$username || !$password)
            {
                header('location:index.php?error=empty');
            }
            if (isset($users[$username]) && $users[$username] == $password)
            {
            }else
            {
                header('location:index.php?error=notmatch&username=dk647');
            }
            $_SESSION['isLogin'] = $username;
            $_SESSION['pathId'] = 0;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Egg Hunter</title>
    <link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.2.1.css" />

    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.2.1.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp key=AIzaSyCHhuoIgmcas53uUdt5JAT5Qf_Ze29K340&sensor=false"></script>

</head>
<body>

<div data-role="page" class="type-index">

    <?php require_once('header.php') ?>

    <div data-role="content">

        <div class="ui-body ui-body-b">
            <h4>to be an egg hunter</h4>
            <a href="gamelist.php" data-role="button" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="b" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-up-b">
                <span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"> join a game</span></span>
            </a>
        </div>
        <hr/>
        <div class="ui-body ui-body-b">
            <h4>to be a path maker</h4>
            <a href="pathMaker.php" data-ajax='false' data-ajax="false" data-role="button" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="b" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-up-b">
                <span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">start a game</span></span>
            </a>
        </div>
    </div>

</body>
</html>
