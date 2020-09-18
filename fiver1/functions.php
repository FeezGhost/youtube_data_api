<?php
include 'config.php';

function VideoList($youtub, $parts, $parameters){
    $response = $youtub->videos->listVideos(
        $parts,
        $parameters);
    return $response;
}

?>