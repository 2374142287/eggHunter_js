<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Egg Hunter</title>
    <link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.2.1.css" />

    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.2.1.js"></script>
    <script src="js/gamelist.js"></script>
    <?php
         if (isset($_GET['error']))
         {
            echo "<script> alert('path maker not exist'); </script>";
         }
    ?>

</head>
<body>

<div data-role="page" class="type-index">

    <?php require_once('header.php') ?>

    <div data-role="content">

        <H3>Please input the username of the path maker</H3>
        <form action="player.php" method="post" data-ajax='false'>
            <input type="text" name="name" id="name" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
            <div style='margin-left:2px' class="ui-block-b">
                <button type='submit' data-theme="c" class="ui-btn-hidden" aria-disabled="false">Join</button>
            </div>
        </from>

    </div>

</body>
</html>
