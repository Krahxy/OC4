<?php include("./view/_header.php"); ?>
<?php include("./view/_navbar.php"); ?>

<section class="bodyArticle">
    <div class="articleContent">
        <div class="titleBloc">
            <img src="public\img\reading.png" alt="Logo d'information" id="infoLogo" />
            <div class="titleInfos">
                <h5><?php echo htmlspecialchars_decode($articleOnce['title']); ?></h5>
                <p>03 Avril 2021</p>
            </div>
        </div>

        <div class="contentBloc">
            <p><?php echo htmlspecialchars_decode($articleOnce['content']); ?></p>
        </div>
    </div>

    <div class="articleContent ">
        <div class="titleBloc">
            <img src="public\img\comments.png" alt="Logo d'information" id="infoLogo" />
            <div class="titleInfos">
                <h5>Commentaires</h5>
            </div>
        </div>

        <!-- Récupération des commentaires -->
        <?php
            while ($comment = $comments -> fetch(PDO::FETCH_OBJ)) { ?>

                <div class="commentBloc">
                    <img src="public\img\man.png" alt="Logo de profil'" id="infoLogo" />
                    <div class="contentCommentBloc">
                        <p><strong><span><?php echo htmlspecialchars_decode($comment -> author); ?> </span></strong><span class="commentDate">- <?php echo htmlspecialchars_decode($comment -> date); ?></span></p>
                        <p><?php echo htmlspecialchars_decode($comment -> comments); ?></p>
                        <a href="index.php?action=signalement&idarticle=<?php echo $articleOnce['id'] ?>&idcomment=<?php echo $comment -> id ?>"><span class="commentDate">Signaler ce commentaire</span></a>
                    </div>
                </div>

                <?php
            }
            $comments -> closeCursor();

            if (isset($_SESSION['pseudo'])) {?>
                <form action="index.php?action=commentsPost&article=<?php echo $articleOnce['id'] ?>" method="post"></br>
                <input type="text" readonly value="<?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : 'Veuillez vous connecter..' ?>" name="pseudo" class="form-control pseudo" /></br>
                <textarea id="mytextarea"  placeholder="Tapez votre commentaire ici.." name="comments"></textarea></br>
                <input type="submit" class="btn btn-primary" />
                </form><?php
            } else {?>
                <p>Veuillez vous connectez pour laisser un commentaire</p><?php
            }?>
    </div>
</section>

<a href="#"><img src="public\img\arrow-up.png" alt="Logo de flèche" id="arrowUp" /></a>


<?php include("./view/_footer.php"); ?>




