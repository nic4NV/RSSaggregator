
<?php include_once(ROOT . '/views/layouts/header.php'); ?>  
<div class="row"> <!-- hello block -->
    <div class="col-md-8 col-md-offset-2">
        <h4 class="text-center">Hello, 
            <?php 
            if (!isset($_SESSION['user'])) {echo ("guest");}
                else {echo $user['name'];}
                    ?>!
        </h4>
    </div>
</div> <!-- end hello block -->

<div class="row">
    <div class="col-md-1 col-md-offset-9"
         <h1 class="text-right">
            <form action="news/update/">
                <button type="submit" class="btn btn-primary btn-md">Upload table</button>
            </form>

        </h1>
    </div>
</div>
</div> 

<div class="row"> <!-- main table -->
    <div class="col-md-8 col-md-offset-2">
            <div class="table-responsive">
                <table class="table table-bordered table table-hover table-condensed" >
                    <thead>
                        <tr class="info">
                            <th>ID</th>
                            <th>Actions</th>
                            <th>Title</th>
                            <th>Publication date</th>
                            <th>Upload date</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($user['admin'] == 1): ?>
                            <?php foreach ($newsList as $newsItem): ?>
                                <tr>
                                    <td><?php echo $newsItem['id']; ?></td>

                                    <td><a href="/edit/<?php echo $newsItem['id']; ?>">Edit</a> or <a href="/delete/<?php echo $newsItem['id']; ?>">Remove</a></td>

                                    <td><a href="/news/<?php echo $newsItem['id']; ?>"><?php echo $newsItem['title']; ?></a></td>
                                    <td><?php echo $newsItem['public_date']; ?></td>
                                    <td><?php echo $newsItem['upload_date']; ?></td>
                                    <td><?php echo $newsItem['comments']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php foreach ($newsList as $newsItem): ?>
                                <tr>
                                    <td><?php echo $newsItem['id']; ?></td>

                                    <td>Edit or Remove</td>

                                    <td><a href="/news/<?php echo $newsItem['id']; ?>"><?php echo $newsItem['title']; ?></a></td>
                                    <td><?php echo $newsItem['public_date']; ?></td>
                                    <td><?php echo $newsItem['upload_date']; ?></td>
                                    <td><?php echo $newsItem['comments']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
    </div>
</div> <!-- end main table -->

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>    


        
           


