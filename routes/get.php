<?php
require_once "../config/config.php";
require_once __DIR__ . "/router.php";

// All files under src/members/
route('/', 'src/members/members.php');