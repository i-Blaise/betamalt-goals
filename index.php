<?php
session_start();
require_once "vendor/autoload.php";
 
use Abraham\TwitterOAuth\TwitterOAuth;
 
define('CONSUMER_KEY', 'SSvBzV2AYWXL4xvmz1clHmRYs');
define('CONSUMER_SECRET', 'BSWluqr4Hf0nHrbA1b5mngz7FKedDrwljJqWJ9p0ApWl90RVk4');
define('ACCESS_TOKEN', '358875468-Qwsj0qII9wCkohdcrQ6g7Oik0xJPAX3SHnQ5UUAY');
define('ACCESS_TOKEN_SECRET', 'g3onYFOihJXlPlwldrzSBs5yjrYOiam1xDPvoA1QfFABU');
 
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
 

if(isset($_POST['submit']) &&  $_POST['submit'] == 'submit')
{

$status = 'Hurray! @'.$_POST['handle'].'. Way to go on your first step to achieving your goals which is "'.$_POST['goal'].'". We will remind u as requested.';
$media1 = $connection->upload('media/upload', ['media' => 'Screenshot.PNG']);
$parameters = [
    'status' => 'Meow Meow Meow',
    'media_ids' => implode(',', [$media1->media_id_string, $media2->media_id_string])
];
$post_tweets = $connection->post('statuses/update', $parameters);
// $post_tweets = $connection->post("statuses/update", ["status" => $status], "geo", ["place_id" => "5a110d312052166f"]);
// $_SESSION['response'] = $post_tweets;
print_r($post_tweets);
// echo $post_tweets->id;
// echo $post_tweets[0]->id;
// var_dump($post_tweets);
// echo '<script type="text/javascript">
//            window.location = "done.php"
//       </script>';
die();
}


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Beta Malt Goals Prototype</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 38px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 25px 0 #892e9b; 
      }
      .banner {
      position: relative;
      height: 210px;
      background-image: url("/uploads/media/default/0001/01/b42dddca6e6a31b300c6ce26cb9dcac565b2f869.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.3); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #892e9b;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #892e9b;
      color: #892e9b;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid #892e9b;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid #892e9b;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #892e9b;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #b52ed1;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
        <div class="banner">
          <h1>Beta Malt Goals Prototype</h1>
        </div>
        <div class="item">
          <p>Name</p>
          <div class="name-item">
            <input type="text" name="name" placeholder="First" />
            <!-- <input type="text" name="name" placeholder="Last" /> -->
          </div>
        </div>
        <div class="item">
          <p>Twitter handle</p>
          <div class="name-item">
            <input type="text" name="handle" placeholder="First" />
            <!-- <input type="text" name="name" placeholder="Last" /> -->
          </div>
        </div>
        <div class="item">
          <p>Select Reminder Date</p>
          <input type="date" name="rdate" required/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Your Goal</p>
          <textarea rows="3" name="goal"></textarea>
        </div>
        <div class="btn-block">
          <button type="submit" name="submit" value="submit">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>