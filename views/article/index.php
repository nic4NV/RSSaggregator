<?php include_once(ROOT . '/views/layouts/header.php'); ?>  
<div class="row">
    <div class="col-md-8 col-md-offset-2"> <!-- Article -->
        <h3 class="text-center"><?php echo $newsItem['title']; ?> </h3>
    </div>  
    <div class="col-md-8 col-md-offset-2" >
        <img src="<?php echo $newsItem['preview']; ?>" class="img-rounded center-block img-responsive" alt="" >
    </div> 
    <div class="col-md-8 col-md-offset-2">
        <p> </br>  <?php echo $newsItem['content']; ?> <a href="/"> Back to main page...</a> </p>
        <a href=<?php echo $newsItem['link']; ?> target="_blank"><?php echo $newsItem['link']; ?></a>
    </div> <!-- END article -->

    <?php if (isset($_SESSION['user'])): ?>
        <div class="col-md-6 col-md-offset-3">  <!-- Comment form -->
            <form role="form" action='#' method='post'>
                <div class="form-group">
                        <textarea name="post" cols="100" rows="5"> Your post </textarea>
            </div>
            <input type='submit' name='submit' class='btn btn-default' value='Post' />
        </form>
    </div> <!-- END comment form -->
    <?php else:  ?>
    <div class="col-md-8 col-md-offset-2">
    <p></br>Please, log in to post comments</p>
    </div>
    <?php endif;  ?>

    <div class="col-md-6 col-md-offset-3">  <!-- Comments List -->
        <div class="col-md-6 col-md-offset-3"  >
            <table class="table" class="table table-condensed">
                <tbody>
                    <?php foreach ($commentsItem as $comment): ?>
                    <tr>
                        <td><?php echo $comment['name']; ?></td>
                        <td><?php echo $comment['date']; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><?php echo $comment['post']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> <!-- END comments List -->
</div>
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>  
