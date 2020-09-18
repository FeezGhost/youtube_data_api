<?php
include 'functions.php';

$popular_vids = VideoList($youtube, 'snippet,contentDetails,statistics', array(
    'chart' => 'mostPopular',
    'maxResults' => 50));
// var_dump($popular_vids);
$pop_vids = $popular_vids->items;
$vid_data = new ArrayObject(array('a'));
foreach ($pop_vids as $key => $item) {
    $uploadedby = $item->snippet->channelTitle;
    $thumbnail = $item->snippet->thumbnails->high->url;
    $title = $item->snippet->title;
    $videoid= $item->id;
    $views = $item->statistics->viewCount;
    $likes = $item->statistics->likeCount;
    $dislikes = $item->statistics->dislikeCount;
    $des = $item->snippet->description;
    // echo "<span>" .$des . "</span><br><br> ";
    $vid_data->append(array($likes, $title, $videoid,$thumbnail, $uploadedby, $views, $dislikes));
}
for($i=0;$i<sizeof($vid_data)-1;$i++)
  {
     for($j=$i+1;$j<sizeof($vid_data);$j++)
     {
        if($vid_data[$i][0]<$vid_data[$j][0])
        {
           $temp=$vid_data[$i];
           $vid_data[$i]=$vid_data[$j];
           $vid_data[$j]=$temp;
        }   
     }
   }
for ($i=1 ; $i<21; $i++){
    echo "<span>".$vid_data[$i][4]."</span><br>";
    echo '<img src="'.$vid_data[$i][3].'" alt="thumbnail_yt" style="width:200px;">';
    echo '<a href="https://www.youtube.com/watch?v='.$vid_data[$i][2].'"  target="_blank"><h1>'.$vid_data[$i][1] .' </h1></a><br>';
    echo "<span> Views : ".$vid_data[$i][5]."</span>";
    echo "<b> Likes : ".$vid_data[$i][0]."</b>";
    echo "<span> Dislikes : ".$vid_data[$i][6]."</span><br><br>";
}
// var_dump($vid_data);
?>