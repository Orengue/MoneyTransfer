<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #000;">
    <div style="text-align: center; padding: 50px;">
        <video id="myVideo" playbackRate = "3" width="700" height="500" autoplay muted loop >
            <source src="imgs/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
    </div>
    
    
<script>
    var vid = document.getElementById("myVideo");
    vid.playbackRate = 0.6;
    setTimeout(function() {
                    location.href = "index.php";
                }, 9000);
  </script>
</body>
</html>