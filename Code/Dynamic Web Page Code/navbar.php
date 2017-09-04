<?php
include './DbConfig.php';
$obj=new Connection();
$result=$obj->getData("select ID,name from page");
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Content Management System</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav pull-right">
        
        <?php
        foreach ($result as $page)
        {
        ?>
              <li><a href="page.php?pageID=<?=$page['ID'];?>"><?=$page['name'];?></a></li> 
        <?php
        }
        ?>
      </ul>
      
    </div> 
  </div> 
</nav>