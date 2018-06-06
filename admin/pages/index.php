<!DOCTYPE html>

<?php
include 'lib/php/adm_liste_include.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="lib/js/js_validation/dist/jquery.validate.js" />
        <script src="lib/js/gt_function.js"></script>
        <script src="lib/js/gt_functionval.js"></script>
        <script src="lib/js/gt_functionAjax.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/pinguin_style.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/lib/css/style.css" />
        <link rel="stylesheet" href="/lib/css/pinguin_style.css" />
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="/lib/js/gt_functionUpload.js"></script>
        <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        
        <meta charset:="UTF-8">
        <title>Projet Pingouin</title>
        
    </head>
    <body>
        <div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        if (isset($_SESSION['admin'])) {

                            if (file_exists("./lib/php/a_gt_menu.php")) {
                                include ("./lib/php/a_gt_menu.php");
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>    
            <div class="container fond">
                <div class="row">

                    <div class="col-sm-10">
                        <div class="row">

                            <div class="col-sm-10">
                                <?php if (isset($_SESSION['admin'])) {
                                    ?>
                                    <a href="index.php?page=disconnect" class="float-right btn btn-danger" type="button">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                        D&eacute;connexion
                                    </a>    
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <section>
                            <?php
                            /* le contenu change en fonction de la navigation */
                            if (!isset($_SESSION['admin'])) {
                                $_SESSION['page'] = "admin_login";
                            } else {

                                if (!isset($_SESSION['page'])) {
                                    $_SESSION['page'] = "accueil_admin";
                                } else {

                                    if (isset($_GET['page'])) {
                                        //print $_GET['page'];
                                        $_SESSION['page'] = $_GET['page'];
                                    }
                                }
                            }
                            $path = "./pages/" . $_SESSION['page'] . ".php";

                            //print $_SESSION['page'];  
                            if (file_exists($path)) {
                                include $path;
                            } else {
                                print "ICI OUPS!!!!!";
                            }
                            ?>
                        </section>
                        <footer>
                            <?php
                            if (file_exists("../lib/php/p_footer.php")) {
                                include ("../lib/php/p_footer.php");
                            }
                            ?>

                        </footer>
                    </div>
                </div>
            </div>

            <div class="scroll-top-wrapper">
                <span class="scroll-top-inner">
                    <i class="fa fa-2x fa-arrow-circle-up"></i>
                </span>
            </div>

        </div>
    </body>
</html>