<?php
include('../object/posts.php');

$posts_object = new Posts($databaseHandler);

echo "<pre>";
print_r($posts_object->fetchAllPosts());
echo "</pre>";



?>