<?php
$stmt = $db->query("SELECT * FROM users
WHERE id = {$_SESSION["user_id"]}";);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$tag_name = $row['tag_name']; 
}
echo json_encode(array($tag_name,$client_id));