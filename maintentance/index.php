
      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">

      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">

      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">

      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css">
<?php 
  include_once($_SERVER['DOCUMENT_ROOT'] . "/config/config.php"); // using main.php will break this page
  if (!config["site"]["maintenance"])
  {
   header("Location: /");
   exit();
  }
  if (isset($_POST["pass"]))
  {
    if ($_POST["pass"] == config["site"]["key"])
    {
      session_start();
      echo "kewl!";
      $_SESSION["devpass"] = true;
      header("Location: /");
      exit();
    }
  }
  
  // put this into body under text-align // overflow: hidden;
?>
<!DOCTYPE html>
<html><head>

    <title>RBLX15 Maintenance</title>
    <style type="text/css">
        html {
            height: 100%;
        }

        body {
            background-color: #000;
            color: #fff;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 24px;
            font-weight: 300;
            height: auto;
            line-height: 24px;
            margin: 0;
            min-width: 320px;
            text-align: center;
        }

        .header {
            padding: 50px 0 20px;
        }

        .header img {
            width: auto;
            margin: 0 auto;
        }

        @media screen and (max-width: 768px) {
            .header img {
                width: 100%;
                height: auto;
            }
        }

        .content {
            text-align: center;
        }

        .notification {
            width: auto;
            height: auto;
            padding: 12px 20px;
            margin: 0 auto;
            line-height: 36px;
            font-style: normal;
            font-weight: 300;
            color: #fff;
        }

        .count-down {
            color: #f68802;
            font-weight: 300;
        }

            .count-down h1 {
                font-weight: 300;
            }

                .count-down h1.timer {
                    font-weight: 600;
                }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,regular,600">
</head>
<body>
    <div class="header">
        <img src="https://rb15.us.to/images/errors/img_ohnoes.png" alt="We're making things more awesome. Be back soon.">
    </div>
        <div class="content">
        <p>We're making things more awesome. Be back soon.</p>
          <i class="fa-solid fa-timer count-down"></i><div id="countDown" class="count-down">
        </div>
      <br>
    </div>
    <script>
// Set the date we're counting down to
var countDownDate = new Date("Mar 2, 2024 21:24:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("countDown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countDown").innerHTML = "Back on Track. Please refresh the page to return back to RBLX15."; 
  }
}, 1000);
</script>
        </div>
    </div>
    <form method="POST" action=""><input id="pass" for="pass" name="pass" type="password"></input><input type="submit"></input></form>
<br></br>

</body></html>
