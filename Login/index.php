<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST["Username"]) ?? isset($_POST["Password"])){
    Auth::login($_POST["Username"], $_POST["Password"]);
    exit(header("Location: /"));
  }else{
    header("Location: /");
    exit();
  }
}
  pageBuilder::buildHeader();
  // btw hadi, do the code please, i alr did some backend codes too
  ?>                
  <main class="pt-5 container"> 
        <br>    <br>
  <div class="card">
  <div class="card-body">
    <h1>
      <h1 style="font-size: 50px;">Login</h1>
    </h1>
    <form method="post" action="/login/" id="clientform">

  <input type="username" name="Username" class="form-control" placeHolder="Username">
  <small id="information1" class="form-text text-muted">We'll never share your information with anyone else.</small>
  <input type="password" name="Password" class="form-control" placeHolder="Password">
  <button type="submit" class="btn btn-primary">Login</button>
</form>
 </div>
</div>  
  
  
  
<?php
  pageBuilder::buildFooter();
  ?>