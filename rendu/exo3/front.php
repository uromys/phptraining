

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Also">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container">



<?php
require_once 'functiondatabase.php';
?>

<br>


<div id="8" class="div_form" style="padding-top: 100px">
    <h3>Object register</h3>
    <div id="notification_div"></div>
    <form id=objetform>
        <div>
            <label class="lab">objet :
            <input type="text" name="objet" onclick= class="textInput" id="objet" value="montre" required>
            </label>

        </div>
        <div>
          <label class="lab">description :
            <input type="text" name="description" class="textInput" id="description" value="or" required>
              </label>
        </div>


        <div>
            <input name="register"  type="submit" onclick="insertObject()" Value="Enregistrer" >
        </div>
            </form>
        <div>
           <form class="2">
 <input  type="text" placeholder="Recherche"  id="search" onkeydown="showSearch(this.value)">

  </div>
  <div>
    <table><tr>
    <?php

  affichage($_GET['value']);

    ?>
  </tr></table>
      </div>

    </form>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<script type="text/javascript">


function showSearch(searchValue) {

    if (event.keyCode === 13) {//touche entrée 


window.location.href="front.php?value=" + searchValue;


          alert("???");



    }




}

  function insertObject(){

        var objet = document.getElementById("objet").value;
        var description=document.getElementById("description").value;

        //console.log(objet);
        //console.log(description);

        document.getElementById("objetform").submit();

        xmlhttp=new XMLHttpRequest();

try{
        if(objet.length != 0 && description.length != 0) {
            xmlhttp.open("GET","insert.php?objet=" + objet + "&description=" + description, true);
            xmlhttp.send();
        }
        alert(objet+"  "+description +"  a était inséré ");
    }
    catch(err ){
alert("Il y a eu problème");

    }
    }

</script>
</body>
</html>
