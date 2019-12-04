<?php
//connexion

function connexion() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=listeobjet;charset=utf8','admin','admin');
        return $connexion;
        //echo 'Connexion etabli';
    }
    catch(Exception $ex) {
        die("Erreur " . $ex->getMessage());
    }
}






// insert les donnée dans la BDD  pdo, du coup résistant aux injections sql
function insert($objet, $description) {

  echo $objet;
  echo  $description;


    $con = connexion();
    $query = 'INSERT INTO listeobjet(objet,description) VALUES (?,?)';
    $request = $con->prepare($query);
    try {
        $request->execute(array($objet,$description));
        echo 'Enregistrement réussi';
    }
    catch(Exception $ex) {
        die('Erreur : ' . $ex->getMessage());
    }
}

function search($search_value) {
$con = connexion();
//echo $search_value;
    if(strlen(trim($search_value))==0){// si recherche tous


        $query = 'SELECT objet,description FROM listeobjet';

        $request=$con->query($query);
        return $request;




    }
    //idealement faudrait créer une fonction permettant de factoriser avec n'importe quelle diviseur de chaine
    //to do fonction pour faire ça

    // l'ordre des if est important , sinon on rentre dans un avec moins de spécificité .


        $pos = strpos($search_value,'-');// recherche specifique
       // test l'existence de "
         if($pos !==false){


           $chainedecaracteres = explode('-',$search_value);// explode divise en plusieurs chaines
     $chainedecaracteres2 = explode('"', $search_value);

            echo $chainedecaracteres[0];
                echo "hein";
            echo  $chainedecaracteres2[1];

           $query = 'SELECT objet,description FROM listeobjet WHERE (objet like "%"?"%"OR description like "%"?"%" )and( objet not like "%"?"%" and description not like "%"?"%")';
           $request = $con->prepare($query);

           $request->execute(array($chainedecaracteres[0],$chainedecaracteres[0],$chainedecaracteres2[1],$chainedecaracteres2[1]));
           //$request->execute(array(kettle,kettle,stainless,stainless));
    return $request;
         }
         else
         {
           //DOESN'T EXIST IN THE CHAIN
        }



    $pos = strpos($search_value,'"');
   // test l'existence de "
     if($pos !==false){

       $chainedecaracteres = explode('"', $search_value);
       //echo $chainedecaracteres[1];
       $query = 'SELECT objet,description FROM listeobjet WHERE objet like "%"?"%"OR description like "%"?"%"';
       $request = $con->prepare($query);
//mot séparé par 1
       $request->execute(array($chainedecaracteres[1],$chainedecaracteres[1]));

return $request;
     }
     else
     {
       //DOESN'T EXIST IN THE CHAIN
    }



    $pos = strpos($search_value,'%');
   // test l'existence de "
     if($pos !==false){

       $chainedecaracteres = explode('%', $search_value);
       //echo $chainedecaracteres[1];
       $query = 'SELECT objet,description FROM listeobjet WHERE objet like "%"?"%"OR description like "%"?"%"';
       $request = $con->prepare($query);
  //mot séparé par %
       $request->execute(array($chainedecaracteres[1],$chainedecaracteres[1]));

  return $request;
     }
     else
     {
       //DOESN'T EXIST IN THE CHAIN
    }



    $pos = strpos($search_value,' ');

    if($pos == TRUE){
      $chainedecaracteres = explode(" ", $search_value);
//echo "1";
    $query = 'SELECT objet,description FROM listeobjet WHERE objet like "%"? "%" OR description like "%" ? "%" OR  objet like "%"? "%"OR description like "%"?"%"';
    $request = $con->prepare($query);

    try{
    $request->execute(array($chainedecaracteres[0],$chainedecaracteres[0],$chainedecaracteres[1],$chainedecaracteres[1]));
    //$request->execute(array(32,32,inch,inch));
    return $request;
    }
    catch(Exception $ex) {
        die('Erreur : ' . $ex->getMessage());
    }
  }


$query = 'SELECT objet,description FROM listeobjet WHERE objet like "%"? "%"OR description like "%"?"%"';
$request = $con->prepare($query);
//echo $search_value;
try{
$request->execute(array($search_value,$search_value));

return $request;
}
catch(Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}


}


function affichage($query){

  //echo $query;
     $request=search($query);


while($result = $request->fetch()) {
      echo '<a href="#">' . $result['objet'] . ' ' . $result['description'] . '</a></br>';

  }
  return;
}
