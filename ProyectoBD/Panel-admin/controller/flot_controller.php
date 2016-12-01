<?php
	
        session_start();
        
        if (!isset($_SESSION['Usuario'])) {
            header(("Location:../index.php"));
        }

	require_once("../../Panel-admin/pages/flot.php");
 ?>