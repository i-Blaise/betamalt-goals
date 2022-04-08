<?php
session_start();
$post_tweets = $_SESSION['response'];
$id = $post_tweets->id;
?>
<html>
<body>
<h1>Good Job</h1>
<h5><a target="_blank" href="https://twitter.com/MrMennia/status/<?php echo $id ?>"> click here to view tweet.</a> </h5>
</body>
<?php
session_destroy();
?>
</html>