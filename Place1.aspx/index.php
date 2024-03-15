<?php
ob_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php'; 
pageBuilder::buildAlert();
$Guest_Name = "Guest" . rand(1, 9999);
$FindGames = $pdo->prepare('SELECT gameName, gameDesc, port, gameIp, owner, client FROM games WHERE gameId="' . $_GET['id'] . '"');
$FindGames->execute();
$gametype = null;

$row = $FindGames->fetchAll(PDO::FETCH_ASSOC)[0];
if ($row["client"] != "2015") {
    $gametype = "join2016()";
} else {
    $gametype = "join()";
}

if (!isset($row["gameName"]) || !isset($_GET['id'])) {
    // Just do a 404 page
    header("Location: /errors/404.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>body{background:#1b1e21 url('/images/bg.png')}</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,requiresActiveX=true"/>
    <title><?php echo htmlspecialchars($row['gameName']) ?> - RBLX15</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: Arial, sans-serif;
			margin-bottom: -100px;
        }

        .card {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
        }

        .play-button {
            margin-top: 20px;
        }

        .modal-content {
            background-color: #333;
            color: #fff;
            border: 1px solid #444;
        }

        .modal-header {
            border-bottom: 1px solid #222;
        }

        .modal-title {
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo htmlspecialchars($row['gameName']); ?></h1>
                    <h4>By: <?php echo htmlspecialchars($row['owner']) ?></h4>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo htmlspecialchars($row['gameDesc']); ?></p>
                    <button class="btn btn-primary play-button" data-toggle="modal" onclick="redirectToGame()" data-target="#exampleModal">Play</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer>
    function redirectToGame() {
        window.location.href = '/games/start?placeid=<?= $_GET["id"] ?>&username=robloxian1231&id=18';
    }
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Requesting Server...</h5>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                </div>
                <p>Join our Discord server to download the files!</p>
				<button class="btn btn-primary" id="joinButton">Join</button>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php pageBuilder::buildFooter(); ?>