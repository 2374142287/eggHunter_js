<?php
    session_start();
    if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == True)
    {
        if (isset($_SESSION['userType']) && $_SESSION['userType'] != 'none')
        {
            if ($_SESSION['userType'] == 'player')
            {
                header("Location:player.php");
            }else
            {
                header("Location:pathMaker.php");
            }
        }
        else
        {
            header("Location:waitting.php");
        }
    }
    if (isset($_GET['error']))
    {
        echo "<script> alert('username and password do not match'); </script>";
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

<H2>Login</H2>

<form action='waiting.php' method='post' data-ajax='false'>
    <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
        <label for="username" class="ui-input-text">username:</label>
        <input type="text" name="username" id="username" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
        <label for="password" class="ui-input-text">password:</label>
        <input type="password" name="password" id="password" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
        <input type="hidden" name='from' value='login'>
    </div>

    <div style='margin-right:2px' class="ui-block-b">
            <button type='submit' data-theme="a" class="ui-btn-hidden" aria-disabled="false">login</button>
    </div>
    <a href='register.php'>
        <div style='margin-left:2px' class="ui-block-b">
             <button data-theme="c" class="ui-btn-hidden" aria-disabled="false">register</button>
         </div>
    </a>
</form>

</div>

</body>
</html>
