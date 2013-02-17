<?php include "includes/header.php"; ?>

<article id="full">

    <h1> <?php echo $pageTitle ?></h1>

    <?php
    
        $db_host = $_POST['db_host'];
        $db_user = $_POST['db_user'];
        $db_pass = $_POST['db_pass'];
        $db_name = $_POST['db_name'];
        
        $catch = 0;

    ?>

    <a href="javascript:showHide('advancedOptions');" class="showHide"><span>Toggle Log</span><img src="images/showhide.png" alt=""></a>

    <div id="advancedOptions" class="showHide">

    <?php

        try {
            $db_conn = new PDO("mysql:host=$db_host", $db_user, $db_pass);
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<div class=\"alert\">Failed to connect to server.<br>" . $e->getMessage() . "</div>";
            echo "</div><p class=\"centered\">Setup has failed.</p><p>&nbsp;</p><p class=\"centered\"><a href=\"index.php\" class=\"btn\">Retry Setup</a></p></article>";
        }

        echo "<h2>Database</h2>";

        if (isset($_POST['dropExisting']) && $_POST['dropExisting'] == "Yes") {
            $query = "DROP DATABASE $db_name";
            try {
                $stmt = $db_conn->prepare($query);
                $stmt->execute();
                echo "<div class=\"alert alert-success\">Database \"" . $db_name . "\" was successfully dropped.</div>";
            } catch (PDOException $f) {
                echo "<div class=\"alert\">Database \"" . $db_name . "\" could not be dropped.<br>" . $f->getMessage() . "</div>";
            }
        }

        $createDatabaseQuery = "CREATE DATABASE $db_name";
        $projectsTableQuery = "CREATE TABLE projects (
                            project_ID int unsigned NOT NULL auto_increment,
                            project_name varchar(100) NOT NULL,
                            PRIMARY KEY (project_ID)
                            );";
        $recordsTableQuery = "CREATE TABLE records (
                            record_ID int unsigned NOT NULL auto_increment,
                            record_name varchar(100) NOT NULL,
                            record_start_date DATETIME NOT NULL,
                            record_end_date DATETIME NOT NULL,
                            record_priority int unsigned NULL,
                            project_ID int unsigned NOT NULL,
                            PRIMARY KEY (record_ID)
                            );";

        try {
            $stmt = $db_conn->query($createDatabaseQuery);
            echo "<div class=\"alert alert-success\">Database was successfully created.</div>";
        } catch (PDOException $e) {
            echo "<div class=\"alert\">Database could not be created.<br>" . $e->getMessage() . "</div>";
        }

        try {
            $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<div class=\"alert\">Failed to connect to server.<br>" . $e->getMessage() . "</div>";
        }

        echo "<h2>Tables</h2>";

        try {
            $stmt = $db_conn->query($projectsTableQuery);
            echo "<div class=\"alert alert-success\">Projects table was successfully created.</div>";
            $stmt = $db_conn->query($recordsTableQuery);
            echo "<div class=\"alert alert-success\">Records table was successfully created.</div>";
        } catch (PDOException $e) {
            echo "<div class=\"alert\">Tables could not be created.<br>" . $e->getMessage() . "</div>";
        }
        
        if(!isset($e)) {

            $config[] = "<?php\r\n";
            $config[] = "    \$db_host = \"$db_host\";";
            $config[] = "    \$db_user = \"$db_user\";";
            $config[] = "    \$db_pass = \"$db_pass\";";
            $config[] = "    \$db_name = \"$db_name\";";
            $config[] = "    define(\"PP_SETUP\", true);\r\n";
            $config[] = "?>";

            file_put_contents("setup/config.php", implode("\r\n", $config));
            echo "<h2>Configuration</h2><div class=\"alert alert-success\">Configuration file written successfully.</div>";

            $_SESSION['user_ID'] = 1;

        } else {

            echo "<h2>Configuration</h2><div class=\"alert\">Configuration file not written.</div>";

        }

        echo "</div>";

        if(!isset($e)) {
            echo "<p class=\"centered\">Setup has successfully finished.</p><p>&nbsp;</p><p class=\"centered\"><a href=\"index.php\" class=\"btn\">Continue To Project Planner</a></p>";
        } else {
            echo "<p class=\"centered\">Setup has failed.</p><p>&nbsp;</p><p class=\"centered\"><a href=\"index.php\" class=\"btn\">Retry Setup</a></p>";
        }

    ?>

</article>

<?php include "includes/footer.php"; ?>