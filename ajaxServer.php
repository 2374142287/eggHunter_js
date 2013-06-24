<?php
    session_start();
    if ($_POST['todo'] == 'makepath'){
        $paths = file_get_contents("kml.json");
        $paths = json_decode($paths, true);
        $paths[$_POST['username']][] = $_POST['data'];
        file_put_contents("kml.json", json_encode($paths));
        echo "True";
    }
    else if ($_POST['todo'] == 'getPath')
    {
        $paths = file_get_contents("kml.json");
        $paths = json_decode($paths, true);
        if (count($paths[$_POST['username']]) <= $_SESSION['pathId'])
        {
            echo "End";
        }
        else
        {
            if ($_POST['isNext'] == "true")
            {
                echo json_encode($paths[$_POST['username']][$_SESSION['pathId']]);
                $_SESSION['pathId'] ++;
            }
            else
            {
                echo json_encode($paths[$_POST['username']][0]);
                $_SESSION['pathId'] = 1;
            }
        }
    }
    else if ($_POST['todo'] == 'checkAnswer')
    {
        $paths = file_get_contents("kml.json");
        $paths = json_decode($paths, true);
        if ($_POST['answer'] == $paths[$_POST['username']][$_SESSION['pathId'] - 1]['answer'])
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }

?>