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

        <H3>Please input your group number, if the gourp is not exist, it will be create</H3>

        <input type="text" name="name" id="name" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
        <a data-ajax="false" href='player.php'>
            <div style='margin-left:2px' class="ui-block-b">
                <button data-theme="c" class="ui-btn-hidden" aria-disabled="false">Join</button>
            </div>
        </a>

    </div>

</body>
</html>
