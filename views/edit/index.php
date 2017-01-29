<?php include_once(ROOT . '/views/layouts/header.php'); ?>  

<section>
    <div class='container'>
        <div class='row'>

            <div class='col-sm-4 col-sm-offset-2 padding-right'>

                <?php if ($result): ?>
                <p> Данные отредактированы! </p>
                <?php endif; ?>
                
                <?php if ($user['admin'] == 1): ?>

                <div class='signup-form'>
                    <h2>Data editing</h2>
                    <form action='#' method='post'>
                        <p>title:</p>
                        <textarea name="title" cols="100" rows="2"> <?php echo $title ?> </textarea>
                        
                        <p><br/>content:</p>
                        <textarea name="content" cols="100" rows="10"> <?php echo $content ?> </textarea>
                        <br/>
                        <input type='submit' name='submit' class='btn btn-default' value='Save' />
                        
                    </form>
                </div>
                
                <?php else: ?>
                <p> Only site administrator can edit news </p>
                <?php endif; ?>
                
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>  