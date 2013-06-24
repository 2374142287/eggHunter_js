<?php
    if (isset($_GET['error']))
    {
        if ($_GET['error'] == 'exist')
        {
            echo "<script> alert('username is exist'); </script>";
        }else
        {
            echo "<script> alert('please check your input'); </script>";
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
	<script src="js/register.js"></script>

</head>
<body> 

	<div data-role="page" class="type-index">

    <?php require_once('header.php') ?>

<div data-role="content">

<form action="waiting.php" method="post" data-ajax='false'>
    <div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
        <label for="username" class="ui-input-text">username:</label>
        <input type="text" name="username" id="username" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
        <label for="password" class="ui-input-text">password:</label>
        <input type="text" name="password" id="password" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
        <label for="email" class="ui-input-text">email:</label>
        <input type="text" name="email" id="email" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
        <input type="hidden" name="from" value="register">
    </div>
    <fieldset class="ui-grid-a">
        <a href='index.php'><div class="ui-block-a">
            <button data-theme="c" class="ui-btn-hidden" aria-disabled="false">Cancel</button>
        </div></a>
        <div class="ui-block-b">
            <button type='submit' data-theme="a" class="ui-btn-hidden" aria-disabled="false">OK</button>
        </div>
    </fieldset>
</form>
</div>

</body>
</html>