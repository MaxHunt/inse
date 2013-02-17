<?php

	include "setup/config.php";

	function db_connect() {

	    global $db_host, $db_user, $db_pass, $db_name;
	    
	    try {
	        $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
	        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        return $db_conn;
	    } catch (PDOException $e) {
	        echo "<div class=\"alert\">Failed to connect to server.<br>" . $e->getMessage() . "</div>";
	    }

	}

?>