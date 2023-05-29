<?php 
require_once(ROOT . '/repositories/MembersRepository.php');
$membersRepository = new MembersRepository();

$membersData = $membersRepository->getMembersData();
?>