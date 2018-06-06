<?php
//unset($_SESSION['admin']);
if (isset($_POST['submit_login'])) {
    print"inrenpe";
    $log = new AdminDB($cnx);
    $admin = $log->isAdmin($_POST['login'], $_POST['password']);
    if (is_null($admin)) {
        $message = "<br />Donnée incorrectes";
    } else {
        $_SESSION['admin'] = 1;
        $_SESSION['page'] = "accueil_admin";
        $message = "Authentifié!";
        ?>
        <meta http-equiv="refresh": content="0;url=index.php">
        <?php
    }
}
?>
<script src="https://use.fontawesome.com/fd9dba5260.js"></script>
<section id="message"><?php if (isset($message)) print $message; ?></section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth_"> 

                        <div class="form-group">
                            <label class="col-md-4 control-label">Login</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="login" id="login">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password-field" type="password" class="form-control" name="password" >
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><br/>
                                <button type="submit" name="submit_login" id="submit_login_" value="Login" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-log-in"></span> Login</button>  
                                <button type="reset" id="annuler" value="Annuler" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-arrow-left"></span> Annuler</button>
                            </div>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

