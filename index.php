<?php
session_start();
require_once "vendor/autoload.php";
 
use Abraham\TwitterOAuth\TwitterOAuth;
 
define('CONSUMER_KEY', 'YOUR-API-KEY');
define('CONSUMER_SECRET', 'SECRET-KEY');
define('ACCESS_TOKEN', 'TOKEN');
define('ACCESS_TOKEN_SECRET', 'SECRET-TOKEN');
 
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
      @font-face {
    font-family: 'Signika';
    src: url('Signika-Regular.eot');
    src: local('Signika Regular'), local('Signika-Regular'),
        url('Signika-Regular.eot?#iefix') format('embedded-opentype'),
        url('Signika-Regular.woff2') format('woff2'),
        url('Signika-Regular.woff') format('woff'),
        url('Signika-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Signika';
    src: url('Signika-Bold.eot');
    src: local('Signika Bold'), local('Signika-Bold'),
        url('Signika-Bold.eot?#iefix') format('embedded-opentype'),
        url('Signika-Bold.woff2') format('woff2'),
        url('Signika-Bold.woff') format('woff'),
        url('Signika-Bold.ttf') format('truetype');
    font-weight: bold;
    font-style: normal;
}

@font-face {
    font-family: 'Signika';
    src: url('Signika-Light.eot');
    src: local('Signika Light'), local('Signika-Light'),
        url('Signika-Light.eot?#iefix') format('embedded-opentype'),
        url('Signika-Light.woff2') format('woff2'),
        url('Signika-Light.woff') format('woff'),
        url('Signika-Light.ttf') format('truetype');
    font-weight: 300;
    font-style: normal;
}

@font-face {
    font-family: 'Signika';
    src: url('Signika-SemiBold.eot');
    src: local('Signika SemiBold'), local('Signika-SemiBold'),
        url('Signika-SemiBold.eot?#iefix') format('embedded-opentype'),
        url('Signika-SemiBold.woff2') format('woff2'),
        url('Signika-SemiBold.woff') format('woff'),
        url('Signika-SemiBold.ttf') format('truetype');
    font-weight: 600;
    font-style: normal;
}


      html, body {
      min-height: 100%;
      background-color: #BE2738;
      /* background: url('images/beta-bg.png');
      background-repeat: no-repeat;
      background-size: cover; */
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: 'Signika';
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
      width: 80%;
      margin: auto;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #ffffff2e;
      }
      .beta-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: start;
      align-items: start;
      margin: auto;
      width: 80%;
      }
      .beta-wrapper h2{
        font-size: 48px;
        color: #fff;
        margin-top: 120px;
      }
      .beta-wrapper p{
        font-size: 24px;
        color: #fff;
        line-height: 120%;
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
      height: 40px;
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
      height: 300px;
      border: 2px solid #be2738;
      border-radius: 15px;
      }
     .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #892e9b;
      }
      .item p{
        font-size: 18px;
        color: #fff;
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
      width: 250px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #be2738;
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
      height: 35px;
      }
      .city-item select {
      height: 35px;
      }
      .tab {
      overflow: hidden;
      }
      .tabcontent {
      display: none;
      padding: 6px 12px;
      border-top: none;
      }
      }
    </style>
  </head>
  <body>
    <div class="beta-wrapper">
      <h2>Beta Goals</h2>
      <p style="padding-bottom: 15px;">Feeling like you’ve wasted a lot of time without achieving any particular goal set? Beta goals will keep you updated by sending reminders of set goals by tweet or email.</p>
      <p style="padding-bottom: 40px;">Become #theBetaAchiever you’ve always wanted to be!</p>
    </div>
    <div class="testbox">
      <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
      <div class="item">
          <p style="padding-bottom: 15px;">Set a goal here!</p>
          <textarea rows="3" name="goal"></textarea>
        </div>
        <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'London')">Remind me via Twitter</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Remind me via other channel</button>
      </div>
      <div id="London" class="tabcontent">
      <div class="item">
          <p>Choose a Reminder Date</p>
          <input type="date" name="rdate" required/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Your Name</p>
          <div class="name-item">
            <input type="text" name="name" />
            <!-- <input type="text" name="name" placeholder="Last" /> -->
          </div>
        </div>
        <div class="item">
          <p>Your Twitter handle</p>
          <div class="name-item">
            <input type="text" name="handle" />
            <!-- <input type="text" name="name" placeholder="Last" /> -->
          </div>
        </div>
        </div>
        <div id="Paris" class="tabcontent">
      <div class="item">
          <p>Choose a Reminder Date</p>
          <input type="date" name="rdate" required/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Your Name</p>
          <div class="name-item">
            <input type="text" name="name" />
            <!-- <input type="text" name="name" placeholder="Last" /> -->
          </div>
        </div>
        <div class="item">
          <p>Your instagram handle</p>
          <div class="name-item">
            <input type="text" name="handle" />
            <!-- <input type="text" name="name" placeholder="Last" /> -->
          </div>
        </div>
        </div>
        <div class="btn-block">
          <button type="submit" name="submit" value="submit">Remind me of this goal!</button>
        </div>
      </form>
    </div>
  </body>
  <script>
    function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
  </script>
</html>
