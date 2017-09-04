
<?php
include './header.php';
include './navbar.php';
?>
<?php
$postID=$_GET['postID'];
$result = $obj->getData("select * from page LEFT JOIN post ON page.ID=post.pageID  WHERE post.ID=$postID ");
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2><?=$result[0]['PostTitle'];?></h2>
            <small class="pull-right">
                <a href="/">Home</a> > <?=$result[0]['Name'];?>
            </small>
            <br><br>
            
            <?php
            foreach ($result as $post) {
                ?>
                    <p>
                        <?=$post['PostBody'];?>
                    </p>    
            <?php
                }
            ?>
                
             
        </div>
    </div>
</div>

<?php
include './footer.php';
?>