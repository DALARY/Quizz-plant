<?php
require_once("dao.php"); 

$dao=new DAO();
if ($dao->getError()) {
    print "Une erreur s'est produite";
}
//print 'ok';

$tableau = $dao->getPraticiens();
//print_r ($tableau);
// print "<br>";
print "<div id=\"choix\">";
foreach ($tableau as $tableaux) {

}



// print "<br>";

// if(isset($_POST['maj'])){
//     $valid=
// }
    


// SE CONNECTER 

if(isset($_POST['formconnexion'])) {
  $bdd = new PDO('mysql:host=localhost;dbname=doctolib', 'bdpays', 'Popodu1213');
    $mailconnectpat = htmlspecialchars($_POST['email']);
    $mdpconnectpat = MD5($_POST['mdp']);
    
    if(!empty($mailconnectpat) AND !empty($mdpconnectpat)) {
       //print "SELECT id_patient, nom_patient, email_patient, mot_de_passe_patient FROM patients WHERE email_patient = '".$mailconnectpat."' AND mot_de_passe_patient = '".$mdpconnectpat."'";
       $requser = $bdd->prepare("SELECT id_patient, nom_patient, email_patient, mot_de_passe_patient FROM patients WHERE email_patient = ? AND mot_de_passe_patient = ?");
       $requser->execute(array($mailconnectpat, $mdpconnectpat)); 
       $userexist = $requser->rowCount();
       if($userexist == 1) {
          $userinfo = $requser->fetch();
          //print_r($userinfo);
          $_SESSION['id_patient'] = $userinfo['id_patient'];
          $_SESSION['nom_patient'] = $userinfo['nom_patient'];
          $_SESSION['email_patient'] = $userinfo['email_patient'];
          header("Location: compte_patient.php?id_patient=".$_SESSION['id_patient']);
       } else {
          $erreur = "Mauvais mail ou mot de passe !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
   }     
   if(isset($_SESSION['id_patient'])){
      print $_SESSION['id_patient'];
      $tableaux2 = $dao->getPatient($_SESSION['id_patient']);
   }
   print_r($tableaux2);
    // EDITION PROFIL PATIENT
    
if(isset($_SESSION['id_patient'])) { 
   $bdd = new PDO('mysql:host=localhost;dbname=doctolib', 'bdpays', 'Popodu1213');
   $requser = $bdd->prepare("SELECT id_patient, nom_patient, prenom_patient, naissance_patient, email_patient, telephone_patient, adresse_patient, code_postal_patient, ville_patient FROM patients WHERE id_patient = ?");
    $requser->execute(array($_SESSION['id_patient']));
    $user = $requser->fetch();
    if(isset($_POST['newname']) AND !empty($_POST['newname']) AND $_POST['newname'] != $user['nom_patient']) {
       $newname = htmlspecialchars($_POST['newname']);
      
       $insertname = $bdd->prepare("UPDATE patients SET nom_patient = ? WHERE id_patient = ?");
       $insertname->execute(array($newname, $_SESSION['id_patient']));
       header('Location: compte_patient.php?id_patient='.$_SESSION['id_patient']);
    }
    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom_patient']) {
       $newpprenom = htmlspecialchars($_POST['newprenom']);
       $insertprenom = $bdd->prepare("UPDATE patients SET prenom_patient = ? WHERE id_patient = ?");
       $insertprenom->execute(array($newprenom, $_SESSION['id_patient']));
       header('Location: compte_patient.php?id_patient='.$_SESSION['id_patient']);
    }
    if(isset($_POST['newnaissance']) AND !empty($_POST['newnaissance']) AND $_POST['newnaissance'] != $user['naissance_patient']) {
        $newnaissance = htmlspecialchars($_POST['newnaissance']);
        $insertnaissance = $bdd->prepare("UPDATE patients SET naissance_patient = ? WHERE id_patient = ?");
        $insertnaissance->execute(array($newnaissance, $_SESSION['id_patient']));
        header('Location: compte_patient?id_patient='.$_SESSION['id_patient']);
     }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email_patient']) {
       $newmail = htmlspecialchars($_POST['newmail']);
       $insertmail = $bdd->prepare("UPDATE patients SET email_patient = ? WHERE id_patient = ?");
       $insertmail->execute(array($newmail, $_SESSION['id_patient']));
       header('Location: compte_patient?id_patient='.$_SESSION['id_patient']);
    }
    if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse_patient']) {
        $newadresse = htmlspecialchars($_POST['newadresse']);
        $insertadresse = $bdd->prepare("UPDATE patients SET adresse_patient = ? WHERE id_patient = ?");
        $insertadresse->execute(array($newadresse, $_SESSION['id_patient']));
        header('Location: compte_patient?id_patient='.$_SESSION['id_patient']);
     }
     if(isset($_POST['newcodepostal']) AND !empty($_POST['newcodepostal']) AND $_POST['newcodepostal'] != $user['code_postal_patient']) {
        $newcodepostal = htmlspecialchars($_POST['newcodepostal']);
        $insertcodepostal = $bdd->prepare("UPDATE patients SET code_postal_patient = ? WHERE id_patient = ?");
        $insertcodepostal->execute(array($newcodepostal, $_SESSION['id_patient']));
        header('Location: compte_patient?id_patient='.$_SESSION['id_patient']);
     }
     if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville_patient']) {
        $newville = htmlspecialchars($_POST['newville']);
        $insertville = $bdd->prepare("UPDATE patients SET ville_patient = ? WHERE id_patient = ?");
        $insertville->execute(array($newville, $_SESSION['id_patient']));
        header('Location: compte_patient?id_patient='.$_SESSION['id_patient']);
     }

    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
       $mdp1 = MD5($_POST['newmdp1']);
       $mdp2 = MD5($_POST['newmdp2']);
       if($mdp1 == $mdp2) {
          $insertmdp = $bdd->prepare("UPDATE patients SET mot_de_passe_patient = ? WHERE id_patient = ?");
          $insertmdp->execute(array($mdp1, $_SESSION['id_patient']));
          header('Location: compte_patient.php?id_patient='.$_SESSION['id_patient']);
       } else {
          $msg = "Vos deux mdp ne correspondent pas !";
       }
    }
}
// EDITION PROFIL praticien
if(isset($_SESSION['id_praticien'])) {
$requser = $bdd->prepare("SELECT id_praticien, nom_praticien, prenom_praticien, naissance_praticien, email_praticien, adresse_praticien, code_postal_praticien, ville_praticien  FROM praticiens WHERE id_praticien = ?");
$requser->execute(array($_SESSION['id_praticien']));
$user = $requser->fetch();
if(isset($_POST['newname']) AND !empty($_POST['newname']) AND $_POST['newname'] != $user['nom_praticien']) {
   $newname = htmlspecialchars($_POST['newname']);
   $insertname = $bdd->prepare("UPDATE praticiens SET nom_praticien = ? WHERE id_praticien = ?");
   $insertname->execute(array($newname, $_SESSION['id_praticien']));
   header('Location: compte_praticien.php?id_praticien='.$_SESSION['id_praticien']);
}
if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom_praticien']) {
   $newpprenom = htmlspecialchars($_POST['newprenom']);
   $insertprenom = $bdd->prepare("UPDATE praticiens SET prenom_praticien = ? WHERE id_praticien = ?");
   $insertprenom->execute(array($newprenom, $_SESSION['id_praticien']));
   header('Location: compte_praticien.php?id_praticien='.$_SESSION['id_praticien']);
}
if(isset($_POST['newnaissance']) AND !empty($_POST['newnaissance']) AND $_POST['newnaissance'] != $user['naissance_praticien']) {
    $newnaissance = htmlspecialchars($_POST['newnaissance']);
    $insertnaissance = $bdd->prepare("UPDATE praticiens SET naissance_praticien = ? WHERE id_praticien = ?");
    $insertnaissance->execute(array($newnaissance, $_SESSION['id_praticien']));
    header('Location: compte_praticien?id_praticien='.$_SESSION['id_praticien']);
 }
if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['email_praticien']) {
   $newmail = htmlspecialchars($_POST['newmail']);
   $insertmail = $bdd->prepare("UPDATE praticiens SET email_praticien = ? WHERE id_praticien = ?");
   $insertmail->execute(array($newmail, $_SESSION['id_praticien']));
   header('Location: compte_praticien?id_praticien='.$_SESSION['id_praticien']);
}
if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse_praticien']) {
    $newadresse = htmlspecialchars($_POST['newadresse']);
    $insertadresse = $bdd->prepare("UPDATE praticiens SET adresse_praticien = ? WHERE id_praticien = ?");
    $insertadresse->execute(array($newadresse, $_SESSION['id_praticien']));
    header('Location: compte_praticien?id_praticien='.$_SESSION['id_praticien']);
 }
 if(isset($_POST['newcodepostal']) AND !empty($_POST['newcodepostal']) AND $_POST['newcodepostal'] != $user['code_postal_praticien']) {
    $newcodepostal = htmlspecialchars($_POST['newcodepostal']);
    $insertcodepostal = $bdd->prepare("UPDATE praticiens SET code_postal_praticien = ? WHERE id_praticien = ?");
    $insertcodepostal->execute(array($newcodepostal, $_SESSION['id_praticien']));
    header('Location: compte_praticien?id_praticien='.$_SESSION['id_praticien']);
 }
 if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville_praticien']) {
    $newville = htmlspecialchars($_POST['newville']);
    $insertville = $bdd->prepare("UPDATE praticiens SET ville_praticien = ? WHERE id_praticien = ?");
    $insertville->execute(array($newville, $_SESSION['id_praticien']));
    header('Location: compte_praticien?id_praticien='.$_SESSION['id_praticien']);
 }

if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
   $mdp1 = MD5($_POST['newmdp1']);
   $mdp2 = MD5($_POST['newmdp2']);
   if($mdp1 == $mdp2) {
      $insertmdp = $bdd->prepare("UPDATE praticiens SET mot_de_passe_praticien = ? WHERE id_praticien = ?");
      $insertmdp->execute(array($mdp1, $_SESSION['id_praticien']));
      header('Location: compte_praticien.php?id_praticien='.$_SESSION['id_praticien']);
   } else {
      $msg = "Vos deux mdp ne correspondent pas !";
   }
}
}

    ?>