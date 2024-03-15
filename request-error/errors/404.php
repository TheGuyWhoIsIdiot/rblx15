
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/navbar.php';
  ?>       </div>
                             
  <main class="pt-5 container">                              
<div id="ErrorPage">
    <img src='/images/errors/not-found.png' width="400" height="310" alt="Alert" class="ErrorAlert" />

    <h1>Requested page not found</h1>
    <h3>You may have clicked an expired link or mistyped the address</h3>
    <p>If you continue to receive this page, please contact customer service at our <span class="SL_swap" id="CsEmailLink"><a href="https://discord.gg/9vhBrVavXh">Discord</a></span>.</p>

    <div class="divideTitleAndBackButtons">&nbsp;</div>

    <div class="CenterNavigationButtonsForFloat">
        <a class="btn-small btn-neutral" title="Go to Previous Page Button" onclick="history.back();return false;" href="#">Go to Previous Page</a>
        <a class="btn-neutral btn-small" title="Return Home" href="/">Return Home</a>
        <div style="clear:both"></div>
    </div>
</div>
</main>
</body>
</html>
<br>
<br>
<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';
  ?>
