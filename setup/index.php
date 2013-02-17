<?php

    $step = isset($_GET['step']) ? $_GET['step'] : "";

    switch ($step) {
        case 1:
            step1();
            break;
        case 2:
            step2();
            break;
        default:
            setupHome();
    }

    function setupHome() {

        $pageTitle = "Setup";

        if (PP_SETUP == false) {
            step1();
        } else {
            error();
        }
        
    }

    function step1() {

        if (PP_SETUP == false) {
            $pageTitle = "Step 1 &raquo; Setup";
            require_once "setup/step1.php";
        } else {
            error();
        }

    }

    function step2() {

        if (PP_SETUP == false) {
            $pageTitle = "Step 2 &raquo; Setup";
            require_once "setup/step2.php";
        } else {
            error();
        }

    }

    function error() {

        $pageTitle = "Setup";
        require_once "setup/error.php";

    }

?>