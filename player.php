<?php

    session_start();
    $_SESSION['userType'] = 'player';
    $paths = file_get_contents("kml.json");
    $paths = json_decode($paths, true);
    if (isset($_POST['name']) && !isset($paths[$_POST['name']]))
    {
        header("location:gamelist.php?error=notexist");
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
    <script src="js/player.js"></script>
    <script>
        username = "<?php echo $_POST['name']; ?>";
    </script>

</head>
<body>

<div data-role="page" class="type-index">

    <div data-role="header" data-theme="b">
        <h1>Egg Hunter</h1>
    </div>

    <span id='gamestat' size=4 style='font-weight:bold; background-color:rosybrown '>status:not start,please wait</span>
    <div data-role="content">

        <div id="map-canvas" style="height:200px; width:200px; margin:auto"></div>

        <a href="#popupDialog" id="popupButton" data-rel="popup" data-position-to="window" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-c">
            <span class="ui-btn-inner ui-btn-corner-all">
                <span class="ui-btn-text">Answer The Question</span>
            </span>
        </a>

    </div>

    <div class="ui-popup-screen ui-overlay-a ui-screen-hidden" id="popupDialog-screen"></div>
    <div class="ui-popup-container pop ui-popup-hidden" id="popupDialog-popup"><div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="c" style="max-width:640px;" class="ui-corner-all ui-popup ui-body-c ui-overlay-shadow" aria-disabled="false" data-disabled="false" data-shadow="true" data-corners="true" data-transition="none" data-position-to="origin">
        <div data-role="header" data-theme="a" class="ui-corner-top ui-header ui-bar-a" role="banner">
            <h1 class="ui-title" role="heading" aria-level="1">question</h1>
        </div>
        <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content ui-body-d" role="main">
            <h4>you must answer a question</h4>
            <label id="question" class="ui-input-text">question</label>
            <input type="text" name="question" id="answer" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">

            <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-c">
                <span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Cancel</span></span>
            </a>
            <a href="#" onclick="checkAnswer()" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-b">
                <span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">OK</span></span>
            </a>
        </div>
    </div></div>

</body>
</html>
