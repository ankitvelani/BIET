
<?php
include './header.php';
include './navbar.php';
?>

<?php
$PageID=$_GET['pageID'];
$result = $obj->getData("select post.ID,Name,PostTitle,PostBody from page LEFT JOIN post ON page.ID=post.pageID  WHERE page.ID=$PageID");

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="page-header"><?=$result[0][1];?></h2>

<?php
foreach ($result as $post) {
    ?>
                <a href="post.php?postID=<?=$post[0];?>"><h3><?=$post[2]; ?></h3> </a>
                <p>
                <?=substr($post[3],0,300);?> <a href=""></a>
                    
                </p>
                <br>

    <?php
}
?>

        </div>
    </div>
</div>

<?php
include './footer.php';
?>
