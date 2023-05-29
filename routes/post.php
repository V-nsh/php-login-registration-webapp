<?php 
require_once "../config/config.php";
require_once __DIR__ . "/router.php";

// all files under API/
route('/api/members', 'api/members.php');
?>