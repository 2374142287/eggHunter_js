<?php

    session_start();
    $_SESSION['userType'] = 'pathMaker';

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
    <script src="js/pathmaker.js"></script>
    <script>
        nowPathMaker = "<?php echo $_SESSION['isLogin']?>";
    </script>

</head>
<body>

<div data-role="page" class="type-index" id='main'>

    <div data-role="header" data-theme="b">
        <h1>Egg Hunter</h1>
    </div>

    <div data-role="content">

        <div id="map-canvas" style="width:200px; height:200px; margin:auto"></div>


        <fieldset class="ui-grid-a">
            <a href="#popupDialog" data-rel="popup" data-position-to="window">
                <div class="ui-block-a">
                    <button data-theme="c" class="ui-btn-hidden" aria-disabled="false" >Here</button>
                </div>
            </a>
            <a href='winner.php'>
                <div class="ui-block-b">
                    <button data-theme="a" class="ui-btn-hidden" aria-disabled="false" onclick="submitPath()">Done</button>
                </div>
            </a>
        </fieldset>

    </div>


    <div class="ui-popup-container pop ui-popup-hidden" id="popupDialog-popup">
        <div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="c" class="ui-corner-all ui-popup ui-body-c ui-overlay-shadow" >
            <div data-role="header" data-theme="a" class="ui-corner-top ui-header ui-bar-a" role="banner">
                <h1 class="ui-title" role="heading" aria-level="1">question</h1>
            </div>
            <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content ui-body-d" role="main">
                <h4>write a question</h4>

                <label for="question" class="ui-input-text">question:</label>
                <input type="text" name="question" id="question" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
                <label for="answer" class="ui-input-text">answer:</label>
                <input type="text" name="answer" id="answer" value="" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset">


                <a data-ajax="false" href="#main" data-theme="c" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-c">
                    <span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Cancel</span></span>
                </a>
                <a data-ajax="false" onclick="setQuestionHere()" href="#main" data-theme="b" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" class="ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-b">
                    <span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">ok</span></span>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
