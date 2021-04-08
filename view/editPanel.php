<?php include("./view/_header.php"); ?>
<?php include("./view/_navbar.php"); ?>

        <section class="main">
            <h3>Administration</h3>
            <p>Vous pouvez modifier votre article ci-dessous.<br /></p>

            <form action="index.php?action=editPanelPost&article=<?php echo $articleOnce['id']?>" method="post">
                </br></br>
                <div class="page_title">
                    <input type="text" placeholder="Titre" value="<?php echo $articleOnce['title']?>" name="title" class="form-control title" />
                </div></br></br>
                <textarea id="mytextarea" placeholder="Racontez-nous une histoire" name="content" cols="50" rows="8"><?php echo $articleOnce['content']?></textarea> </br>
                <input type="submit" class="btn btn-primary" />
            </form>

        </section>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

<?php include("./view/_footer.php"); ?>