
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            <h2> Add Page </h2>
            <pre>
                    
                    Name : <input type="text" name="name" required>
                    
             Description : 
                           <textarea name="description"></textarea>

                           <input type="submit" name="submit">
            </pre>
        </form>
    </body>
</html>

<?php
if(isset($_POST['submit']))
{
    include '../DbConfig.php';  /* Class file for database connection */
    $obj=new Connection(); /* Connection Object */
    
    $name=$_POST['name'];
    $description=$_POST['description'];
    
    $qry="INSERT INTO page (`Name`, `Description`) VALUES ('$name', '$description')";
    $obj->putData($qry);
}?>