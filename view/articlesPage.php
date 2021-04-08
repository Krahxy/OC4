<?php include("./view/_header.php"); ?>
<?php include("./view/_navbar.php"); ?>

<table class="table">
    <thead>
        <tr>
        <th scope="col">Titre</th>
        <th scope="col">Lecture</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    while ($article = $articles -> fetch()) {
    ?>
        <tr>
        <th scope="col"><p><?php echo $article['title'] ?></p></th>
        <th scope="col">
            <a href="index.php?action=commentairesPage&article=<?php echo $article['id']; ?>" class="btn btn-success"><i class="far fa-eye"></i></a>
<?php       if (isset($_SESSION['status'])) {
                if ($_SESSION['status'] == 1) { ?>
                    <a href="index.php?action=articleUpdate&article=<?php echo $article['id']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                    <a href="index.php?action=articleDelete&article=<?php echo $article['id']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a><?php
                }
            }?>
        </th>
        </tr>

<?php
    } ?>
    </tbody>
</table>

<?php include("./view/_footer.php"); ?>


