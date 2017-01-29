<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class='container'>
        <div class='row'>

            <div class='col-sm-4 col-sm-offset-4 padding-right'>

                <?php if (isset($result)): ?>
                    <p>You were registered!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?> </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <h2>Sign up to post comments</h2>
                            <form role="form" action='#' method='post'>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type='text' name='name' class="form-control" placeholder="Name" value='<?php echo $name; ?>' />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type='email' name='email' class="form-control" placeholder="Email" value='<?php echo $email; ?>' />
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type='password' class="form-control" name='password' placeholder="Password" value='<?php echo $password; ?>' />
                                </div>
                                <input type='submit' name='submit' class='btn btn-default' value='Sign up' />
                            </form>
                        
                    <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT. '/views/layouts/footer.php'; ?>


