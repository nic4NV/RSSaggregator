<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class='container'>
        <div class='row'>

            <div class='col-sm-4 col-sm-offset-4 padding-right'>


                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?> </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class='signup-form'>
                    <h4>Enter Email and password to log in</h4>
                    <form action='#' method='post'>
                        <input type='email' name='email' placeholder="Email" value='<?php echo $email; ?>' />
                        <input type='password' name='password' placeholder="password" value='<?php echo $password; ?>' />
                        <input type='submit' name='submit' class='btn btn-default' value='Log in' />
                    </form>
                </div>

                
                
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT. '/views/layouts/footer.php'; ?>


