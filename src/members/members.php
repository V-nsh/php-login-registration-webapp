<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    require_once(ROOT . '/assets/data/members/members.php');
    ?>
    <title>Members</title>
</head>
<body>
    <?php 
    foreach($membersData as $member) {
        echo $member['firstName'] . ' ' . $member['lastName'] . '<br>';
    }
    ?>
</body>
</html>