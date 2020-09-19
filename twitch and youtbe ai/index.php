<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IP2</title>
    <meta name="keywords" content="ip2 ice_poseidon2 network cx ice poseidon">
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        :root{--ip2always-primary-color: #6b4580;--ip2always-bright-color: #875ea0;--ip2always-hover-color: #fdfbff;--ip2always-white-color: #d8d8d8;--ip2always-transition-time: 0.15s;--banner-image-desktop: url("/images/banner_desktop.jpg");--bg-color: #292929}.navigation-bar{color:var(--ip2always-white-color);text-decoration:none;display:flex;font-size:15px;box-shadow:0 9px 12px 0 #131313}.badge_txt{font-size:var(--badge_txt_size_desktop)}.navigation-links{justify-content:space-between;margin:0 auto;cursor:pointer;-webkit-tap-highlight-color:transparent}.navigation-links .navigation-link{padding:13px 18px 11px}.nav-main .navigation-link{display:block;color:#fff;padding:10px;user-select:none;text-transform:uppercase}.navigation-links .navigation-link:hover{background-color:#242424;color:#fff;white-space:nowrap}a{text-decoration:none;color:inherit}.navigation-bar{background-color:#000;height:40px;width:100%;border-top:1px solid #000;border-bottom:1px solid #000;display:flex;justify-content:center;align-items:center;overflow:hidden;margin-bottom:5px}*,::after,::before{box-sizing:border-box}.navigation-banner{padding:0;margin:0;width:100%;height:165px;background-position:center;background-repeat:no-repeat;background-image:var(--banner-image-desktop);box-shadow:0 4px 2px -2px rgba(0,0,0,.3)}div{display:block}html{font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;-webkit-tap-highlight-color:transparent}html body{background-color:var(--bg-color);font-family:Arial,helvetica neue,Helvetica,sans-serif}body{margin:0;font-family:-apple-system,BlinkMacSystemFont,segoe ui,Roboto,helvetica neue,Arial,noto sans,sans-serif,apple color emoji,segoe ui emoji,segoe ui symbol,noto color emoji;font-size:1rem;font-weight:400;line-height:1.5;color:#292929;background-color:#292929}.stream-container{text-align:center;overflow:hidden;width:70%;margin:0 auto;position:initial;padding:25px}.table-row{display:flex;background-color:#121212}.table-row:hover{cursor:pointer;opacity:.8}.offline-row{margin-top:2px;max-height:50px;display:flex;background-color:#121212}.online-row{margin-top:5px;display:flex;background-color:#121212}.badge_youtube{border:2px solid #121212;border-right:5px solid red}.badge_twitch{border:2px solid #121212;border-right:5px solid #6441a4}.badge_bitwave{border:2px solid #121212;border-right:5px solid #0d84dc}.stream-icon{align-self:center;justify-self:center;position:relative;background-color:#000}.stream-info{text-align:left;width:100%;display:flex;flex-direction:column;justify-content:center;margin-left:12px;min-height:0;max-height:55px;overflow:hidden}.name{color:#fff;white-space:nowrap}.offline-name{color:#d3d3d3;white-space:nowrap}.video-title{color:#a9a9a9;font-size:.9rem;white-space:nowrap}.section-title{font-size:30px;color:#fff}.viewer-count{width:30%;display:flex;flex-direction:row;justify-content:flex-end;align-items:center;margin-right:12px;font-weight:700;color:var(--ip2always-hover-color);text-align:right}.offline-time{width:30%;display:flex;flex-direction:row;justify-content:flex-end;align-items:center;margin-right:12px;white-space:nowrap;font-size:.9rem;color:#a9a9a9;text-align:right}.unhide-btt{background-color:#404040;border:none;color:#fff;padding:5px 10px;text-align:center;font-size:16px;width:100%;margin:auto;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.offline-streamers{margin-top:30px}
        body{
            color: white;
        }
    </style>
</head>
<body>

<nav class="navigation">
    <div class="navigation-banner"></div>
    <div class="navigation-bar">
        <div class="navigation-links">
            <a href="index.php" target="_self" rel="noopener" class="navigation-link">
                HOT
            </a>
            <a href="https://ip2always.win/new" target="_self" rel="noopener" class="navigation-link">
                NEW
            </a>
            <a href="https://ip2always.win/rising" target="_self" rel="noopener" class="navigation-link">
                RISING
            </a>
            <a href="top.php" target="_self" rel="noopener" class="navigation-link">
                TOP
            </a>
        </div>
    </div>
</nav>

<div class="stream-container">
<?php

    // PUT STREAMER USER NAME HERE
    $names[0] = "kektheking";
    $names[1] = "danucd";
    $names[2]= "ael_gamingleague";
    $names[3]= "duckmanzch";
    $names[4]= "esl_csgo";
    $names[5]= "boyminoru";

    $url = 'https://api.twitch.tv/helix/streams?user_login=' . implode('&user_login=', $names);
    $url1 = 'https://id.twitch.tv/oauth2/token';

    // PUT CLIENT ID HERE
    $client_id = "fl4d435nwyq9i2ca17hwmiloasxsbc";

    // PUT CLIENT SECRET HERE
    $secret = "375jm6ewikk1qtg5xugimzx2dact1b";

    $data = array('client_id' => $client_id, 'client_secret' => $secret, 'grant_type' => 'client_credentials');

    $ch1 = curl_init($url1);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    $result1 = curl_exec($ch1);
    echo curl_error($ch1);
    $result1 = json_decode($result1, true);
    $token = $result1['access_token'];


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Client-ID: ' . $client_id,
        'Authorization: Bearer ' . $token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    echo curl_error($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    curl_close($ch1);
    if ($info['http_code'] == 200) {
        $result2= json_decode($result);
        $result = json_decode($result, true);
        for ($i=0; $i <sizeof($result['data']) ; $i++) {
            $username =  $result['data'][$i]['user_name'];
            $id =  $result['data'][$i]['id'];
            $user_id =  $result['data'][$i]['user_id'];
            $game_id =  $result['data'][$i]['game_id'];
            $type =  $result['data'][$i]['type'];
            $title =  $result['data'][$i]['title'];
            $viewer_count =  $result['data'][$i]['viewer_count'];
            $language =  $result['data'][$i]['language'];
            $thumbnail_url =  $result['data'][$i]['thumbnail_url'];
            $search = '-{width}x{height}' ;
            $trimmed = str_replace($search, '', $thumbnail_url) ;
            echo ('<h1>'.$username.'</h1>');
            echo('<img src="'.$trimmed.'" alt="thumbnail" style="width: 300px;" ><br><br>');
            echo ('<a href="http://www.twitch.tv/'.$username.'" target="_blank">'.$title.'</a><br>');
            echo ('<b>Type :  </b><span>'.$type.'</span><br>');
            echo ('<b>Viewrs :  </b><span>'.$viewer_count.'</span><br>');
            echo ('<b>Language :  </b><span>'.$language.'</span><br>');
        }
        if (json_last_error() == JSON_ERROR_NONE) {
        } else {
            echo 'Failed to decode JSON';
        }
    } else {
        echo 'Failed with ' . $info['http_code'];
    }
?>
</div>

<script src="js/streamlist.js" type="text/javascript"></script>

</body>

<footer>
    <a href="https://ip2.online/old">click for old theme</a>
</footer>
</html>
