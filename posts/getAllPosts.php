<?php
include('../object/posts.php');
include('../object/users.php');

$posts_object = new Posts($databaseHandler);
$user_handler = new User($databaseHandler);


if($user_handler->validateToken('b443e1b437004c122e64c5f85344e12d') === false) {
    echo "Invalid token!";
    die;
}

echo "<pre>";
print_r($posts_object->fetchAllPosts());
echo "</pre>";



?>