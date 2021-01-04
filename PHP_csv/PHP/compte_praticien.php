<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
    <link rel="stylesheet" href="CSS/index.css">
    <?php include("dao.php"); ?>
    
    <script type="text/javascript" src="config.js"></script>
    <script type="text/javascript" src="util.js"></script>
    <title>compte praticien</title>
   
		
    </head>
    <body>
        <header>
        <div id="overlay3">
                <div class="popup_block">
                    <a class="close" href="#"><img alt="Fermer" title="Fermer la fenêtre" class="btn_close" src="#"></a>
                    <img style="float: right; margin: 0 0 0 20px;" alt="" src="image/doctor2.png">          
                    <div>
                    <h2>Edition du profil</h2>
                    <div>
                        <form method="POST" action="" enctype="multipart/form-data">
                        <label>Name :</label>
                        <input type="text" name="newname" placeholder="Name" value="<?php print $tableaux["nom_praticien"]; ?>" />
                        
                        <label>Prénom :</label>
                        <input type="text" name="newprenom" placeholder="Prénom" value="<?php print $tableaux["prenom_praticien"]; ?>" />

                        <label>Date de naissance :</label>
                        <input type="text" name="newnaissance" placeholder="Date de naissance" value="<?php print $tableaux["naissance_praticien"]; ?>" />

                        <label>Mail :</label>
                        <input type="text" name="newmail" placeholder="Email" value="<?php print $tableaux["email_praticien"]; ?>" />
                        
                        <label>Adresse :</label>
                        <input type="text" name="newadresse" placeholder="Adresse" value="<?php print $tableaux["adresse_praticien"]; ?>" />

                        <label>Code postal :</label>
                        <input type="text" name="newcodepostal" placeholder="Code postal" value="<?php print $tableaux["code_postal_praticien"]; ?>" />

                        <label>Ville :</label>
                        <input type="text" name="newville" placeholder="Ville" value="<?php print $tableaux["ville_praticien"]; ?>" />

                        <label>Mot de passe :</label>
                        <input type="password" name="newmdp1" placeholder="Mot de passe"/>
                        
                        <label>Confirmation - mot de passe :</label>
                        <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" />
                        <input type="submit" value="Mettre à jour mon profil !" />
                        
                        </form>
                        
                    </div>
                </div> 
                </div>
            </div>

            <div id="flexheader" class="text-center"id="banniere" >
                <nav id="buttonsearch" class="d-flex align-items-end" class="navbar navbar-light bg-light">
                <form  action="recherche.php" method="post" class="form-inline">
                    <input id="special" name="special" class="form-control mr-sm-2" type="search" placeholder="Spécialité" aria-label="Spécialité">     
                    <input id="departement" name="departement"class="form-control mr-sm-2" type="search" placeholder="Département" aria-label="Département">
                    <input id="ville" name="ville"class="form-control mr-sm-2" type="search" placeholder="Ville" aria-label="Ville">
                    <button  class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="javascript:switchDisplay();">Search</a></button>
                </form>
                </nav>
            </div>
        </header>
        <main>
        <div class="card mb-3" style="max-width: 100%; height:200px">
        <div class="row no-gutters">
            <div class="col-md-4"style="max-width: 200px;height:200px">
            <img src="image/doctor.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8" style="height:200px">
            <div class="card-body">
            <div aligne="center">
         <h2>Information du compte</h2>
         <b>Nom : </b><?php print $tableaux["nom_praticien"]."&nbsp;&nbsp;"; ?>
         <b>Prénom : </b><?php  print $tableaux["prenom_praticien"]."<br>"; ?>
         <b>Date de naissance : </b><?php  print $tableaux["naissance_praticien"]."<br>"; ?>
         <b>Email : </b><?php print $tableaux["email_praticien"]."<br>"; ?>
         <b>Adresse : </b><?php  print $tableaux["adresse_praticien"]."&nbsp;&nbsp;"; ?>
         <b>Code postal :</b> <?php  print $tableaux["code_postal_praticien"]."&nbsp;&nbsp;"; ?>
         <b>ville :</b> <?php  print $tableaux["ville_praticien"]."<br>"; ?>
         <b>Téléphone : </b><?php print $tableaux["telephone_praticien"]."&nbsp;&nbsp;"; ?>
         
         <a href="#overlay3">Editer mon profil &nbsp&nbsp</a>
         <a href="deconnecte.php">&nbsp&nbspSe déconnecter</a>

      </div>
            </div>
            </div>
        </div>
        </div>
        <!----------------------------NAVIGATION---------------------------->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">RDV du jour</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Gérer mes RDV</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Calendrier</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">sdesfsedfsdfsdfsdf</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">fsdffffffffffffffffffffff.</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">aaaaaaaaaaaaaaaaaaaaaaaaa</div>
        </div>
        </main>
        <footer>
        <?php include("footer.php"); ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
