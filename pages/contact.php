<section id="contact">
    <div class="container">
        <?php
        if (isset($_GET['submit'])) {
            extract($_GET, EXTR_OVERWRITE);
            if (empty($name) || empty($email) || empty($tel) || empty($texte)) {
                $erreur = "Veuillez remplir tous les champs";
                print $erreur;
            } else {
                $client = new ContactDB($cnx);
                $client->addClient($_GET);
            }
        }
        ?>   
        <div class="row">
            <div class="col-md-2"></div>    
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.776730612375!2d3.950509715440088!3d50.463882179477196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2501e686ddc07%3A0x1a9b1af43f1902b3!2sHEPH-Condorcet+%2F%2F+Mons+(Economique%2C+P%C3%A9dagogique%2C+Param%C3%A9dical)!5e0!3m2!1sfr!2sbe!4v1512471811618" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>    
            <div class="col-md-4">
                <h4><strong>Contactez nous</strong></h4>
                <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_contact">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name"  placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email"  placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="tel"  placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="texte" rows="3" placeholder="Message"></textarea>
                    </div>
                    <button class="btn btn-default" type="submit" name="submit" id="submit">
                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
                    </button>
                </form>
            </div>
            <div class="col-md-2">
                Mail : Pingouin@gmail.be
                Adresse : Adresse
            </div>    
        </div>
    </div>
</section>

