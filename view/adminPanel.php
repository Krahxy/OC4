<?php include("./view/_header.php"); ?>
<?php include("./view/_navbar.php"); ?>

<?php
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 1) { ?>
            <section class="main">
                <h3>Administration</h3>
                <p>Vous pouvez créer un nouvel article en remplissant le formulaire ci-dessous.<br /></p>

                <form action="index.php?action=adminPanelPost" method="post">
                    <div class="page_title">
                        <input type="text" placeholder="Titre" name="title" class="form-control title" />
                    </div></br></br>
                    <textarea id="mytextarea" placeholder="Racontez-nous une histoire" name="content" cols="50" rows="8"></textarea></br>
                    <input type="submit" class="btn btn-primary" />
                </form></br>

                <p>Vous trouverez ci-dessous les commentaires ayant été signalés.</p></br>

                <?php
            
            while ($comment = $comments -> fetch(PDO::FETCH_OBJ)) { ?>
                    <div class="commentBloc">
                        <img src="public\img\man.png" alt="Logo de profil'" id="infoLogo" />
                        <div class="contentCommentBloc">
                            <p><strong><span><?php echo htmlspecialchars_decode($comment -> author); ?> </span></strong><span class="commentDate">- <?php echo htmlspecialchars_decode($comment -> date); ?></span></p>
                            <p><?php echo htmlspecialchars_decode($comment -> comments); ?></p>
                        </div>
                    </div><?php
                }?>
            </section>

            <script>
                tinymce.init({
                    selector: '#mytextarea'
                });
            </script>
<?php   }
    }?>

<?php include("./view/_footer.php"); ?>