<?php
    include '../DbConfig.php';  /* Class file for database connection */    
    $obj=new Connection(); /* Connection Object */
    
    $result=$obj->getData("select ID,name from page");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            <h2> Add Page </h2>
            <pre>
                    Page       : <select name="PageID">
                                 <?php
                                    foreach ($result as $page)
                                    {
                                 ?>
                                    <option value="<?=$page['ID'];?>"><?=$page['name'];?></option>
                                 <?php
                                    }
                                 ?>
                                 </select>

                    Post Title : <input type="text" name="PostTitle" required>
                    
                    Post Body  : 
                                 <textarea name="PostBody" rows="20" cols="100"></textarea>

                                    
                                 <input type="submit" name="submit">
            </pre>
        </form>
    </body>
</html>

<?php
if(isset($_POST['submit']))
{
    $PageID=$_POST['PageID'];
    $PostTitle=$_POST['PostTitle'];
    $PostBody=$_POST['PostBody'];
    $PostBody=  addslashes($PostBody);
    $qry=" INSERT INTO post (`PageID`,`PostTitle`,`PostBody`) VALUES ($PageID,'$PostTitle','$PostBody') ";
    $obj->putData($qry);
}?>