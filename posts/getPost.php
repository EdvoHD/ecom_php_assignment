<?php
include("../object/posts.php");
$posts_object = new Posts($databaseHandler);

$postID = ( !empty($_GET['id'] ) ? $_GET['id'] : -1 );


if($postID > -1) {

    $posts_object->setPostId($postID);
    print_r( $posts_object->fetchSinglePost() );


} else {

    echo "Error: Missing parameter id!";

}

?>
