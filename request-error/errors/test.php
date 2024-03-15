
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/navbar.php';
  ?>       </div>
                             
  <main class="pt-5 container">                              
<div id="ErrorPage">
    <img src='/Images/Icons/img-alert-crop.png' alt="Alert" class="ErrorAlert" />

    <h1>@Model.ErrorTitle</h1>
    <h3>@Model.ErrorDescription</h3>
    <p>@Html.Raw(string.Format(Model.Resources["Description.ErrorPageLetUsKnow"], "<span class=\"SL_swap\" id=\"CsEmailLink\"><a href=\"mailto:info@roblox.com\">info@roblox.com</a></span>"))</p>
    <pre><span>@Model.ErrorMessage</span></pre>

    <div class="divideTitleAndBackButtons">&nbsp;</div>

    <div class="CenterNavigationButtonsForFloat">
        <a class="btn-small btn-neutral" title="Go to Previous Page Button" onclick="history.back();return false;" href="#">@Model.Resources["Action.PreviousPage"]</a>
        <a class="btn-neutral btn-small" title="Return Home" href="/Default.aspx">@Model.Resources["Action.ReturnHome"]</a>
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
