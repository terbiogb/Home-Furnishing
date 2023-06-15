<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM team_member LIMIT 4");
$stmt->execute();

$team_member = $stmt->get_result();

?>