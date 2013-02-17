<?php

    include "setup/db.php";

    $action = isset($_GET['action']) ? $_GET['action'] : "";

    switch($action) {
        case 'setup':
            setup();
            break;
        case 'add':
            addProject();
            break;
        case 'edit':
            editProject();
            break;
        case 'delete':
            deleteProject();
            break;
        default:
            listProjects();
    }

    function indexHome() {

        if (PP_SETUP == false) {
        	header("Location: index.php?action=setup");
        }

        $pageTitle = "Home";
        require_once "library/home.php";

    }

    function listProjects() {

        $pageTitle = "Home";
        require_once "library/home.php";

    }

    function addProject() {

        $pageTitle = "Add New Project";

        if (isset($_POST['operation'])) {
            
            try {

                $db_conn = db_connect();
                $query = "ALTER TABLE projects AUTO_INCREMENT = 1;";
                $result = $db_conn->query($query);
                $stmt = $db_conn->prepare('INSERT INTO projects (project_name) VALUES (:project_name)');
                $stmt->bindValue(":project_name", $_POST['project_name']);
                $stmt->execute();
                $alert = "alert-success";
                $message = "New project successfully added!";
                $pageTitle = "Projects";
                require_once "library/home.php";

            } catch (PDOException $e) {

                $alert = "";
                $message = "Project couldn't be added, please try again.";
                $pageTitle = "Add New Project";
                require_once "library/add.php";

            }

        } else {

            require_once "library/add.php";

        }
        
    }

    function editProject() {

        $pageTitle = "Edit Existing Project";
        $pid = isset($_GET['pid']) ? $_GET['pid'] : "";

        if (isset($_POST['operation'])) {
            
            try {

                $db_conn = db_connect();
                $stmt = $db_conn->prepare('UPDATE projects SET project_name = :project_name WHERE project_ID = :project_ID');
                $stmt->bindValue(":project_name", $_POST['project_name']);
                $stmt->bindParam(":project_ID", $pid);
                $stmt->execute();
                $alert = "alert-success";
                $message = "Project successfully edited.";
                $pageTitle = "Projects";
                require_once "library/home.php";

            } catch (PDOException $e) {

                $alert = "";
                $message = "Project couldn't be edited, please try again.";
                require_once "library/edit.php";

            }

        } else {

            require_once "library/edit.php";

        }

    }

    function deleteProject() {

        $pageTitle = "Delete Existing Project";
        $alert = "Project deleted.";

    }

    function setup() {

        $pageTitle = "Database Setup";
        require_once "setup/index.php";

    }

?>