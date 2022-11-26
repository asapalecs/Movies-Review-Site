<?php require_once('./includes/header.php');?>

<div class="list-group list-group-numbered">
 <?php foreach ($genres as $genre){ ?>
    <a href="movies.php?genre=<?php echo($genre);?>" 
        class="list-group-item list-group-item-action flex-column align-items-start">
            <div 
                class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                    <?php echo($genre);?>
                </h5>
            </div>
    </a>
 <?php } ?>
</div>
<?php require_once('./includes/footer.php');?>