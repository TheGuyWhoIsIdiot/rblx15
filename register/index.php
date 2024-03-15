<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST["Username"]) ?? isset($_POST["Password"])){
    $req = Auth::register($_POST["Username"], $_POST["Password"], $_POST["invitekey"]);
    if($req == 1){
      exit(header("Location: /"));
    }elseif($req == 2){
      pageBuilder::buildAlert();
      exit("user is already registered");
	  }elseif($req == 3){
	  pageBuilder::buildAlert();
      exit("invite key is invalid");
	  }elseif($req == 4){
	  pageBuilder::buildAlert();
      exit("invite key is already used");
    }else{
      pageBuilder::buildAlert();
      exit("unable to create the account");
    }
  }
  exit(header("Location: /"));
}
pageBuilder::buildHeader();
// btw hadi, do the code please, i alr did some backend codes too.
?>                
  <main class="pt-5 container"> 
        <br>    <br>
  <div class="card">
  <div class="card-body">
    <h1>
      <h1 style="font-size: 50px;">Sign Up</h1>
    </h1>
    <form method="post" action="/register/" id="clientform">
  <input type="username" name="Username" class="form-control" placeHolder="Username">
  <input type="password" name="Password" class="form-control" placeHolder="Password">
  <input type="text" id="invitekey" name="invitekey" class="form-control" placeHolder="Invite key (RBLX-XXXXXX-XXXXXX">
  <button type="submit" class="btn btn-primary">Create account!</button>
</form>
 </div>
</div>  

<?php pageBuilder::buildFooter(); 
// some commented shit

/*<div class="form-group">
  <label for="confirm">Confirm Password</label>
  <input type="password" class="form-control" id="confirm" placeholder="Confirm Password">
</div>*/
/*<div class="form-group">
    <label for="invitekey">Invite Key</label>
    <input type="text" class="form-control" id="invitekey" placeholder="Invite key (RBLX-XXXXXXXX)">
  </div>*/
?>