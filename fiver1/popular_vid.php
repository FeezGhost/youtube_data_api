<?php

include 'functions.php';

$popular_vids = VideoList($youtube, 'snippet,contentDetails,statistics', array(
    'chart' => 'mostPopular',
    'maxResults' => 20));
// var_dump($popular_vids);
$pop_vids = $popular_vids->items;

foreach ($pop_vids as $key => $item) {
    $uploadedby = $item->snippet->channelTitle;
    echo "<span>".$uploadedby."</span><br>";
    $thumbnail = $item->snippet->thumbnails->maxres->url;
    echo '<img src="'.$thumbnail.'" alt="thumbnail_yt" style="width:200px;">';
    $title = $item->snippet->title;
    $videoid= $item->id;
    echo '<a href="https://www.youtube.com/watch?v='.$videoid.'"  target="_blank"><h1>'.$title .' </h1></a><br>';
    $views = $item->statistics->viewCount;
    $likes = $item->statistics->likeCount;
    $dislikes = $item->statistics->dislikeCount;
    echo "<span> Views : ".$views."</span>";
    echo "<span> Likes : ".$likes."</span>";
    echo "<span> Dislikes : ".$dislikes."</span><br>";
    $des = $item->snippet->description;
    // echo "<span>" .$des . "</span><br><br> ";
}
?>