<?php 



//j'ai créé une fonction appelée (mdpcheck), cette fonction prend 4 paramètres

//premier paramètre: est l'id de l'utilisateur

//second paramètre: est le mdp tapé par l'utilisateur

//troisième paramètre: est le $salt que nous avons obtenu de checkid, nous l'utiliserons pour vérifier si l'utilisateur a tapé le bon mdp

//quatrième paramètre: est la connexion, qui nous permettra de nous connecter à la base de données

//on peut appeler cette fonction quand on a besoin avec ( incluced )
  function mdpcheck($id,$mdp,$salt,$connexion){ 



    $hash_verif="non généré";
    //j'ai créé une valeur que j'utiliserai plus tard dans la fonction
    
    $getcorrectmdp = "SELECT mdp FROM securité where IDsecurité = $id";
    //j'ai créé une requête SQL appelée ($getcorrectmdp) pour obtenir le mot de passe correct de la base de données

    //Prépare une requête à l'exécution
    $query = $connexion->prepare($getcorrectmdp);

    //echo $mdp;

    //exécuter la requête
    $query->execute();

    //enregistrer les résultats dans un objet appelé ($ resultat).
    $resultat = $query->fetchAll();

    $correctmdp = $resultat['0']['mdp'];
    // on sauvegarde le bon mdp.

    //echo "<p>got the correct password</p>";
    //echo $correctmdp;


    //j'ai créé un hachage de vérification composé du md5 du mot de passe correct + le $ salt.
    $hash_verif=md5($correctmdp.$salt);

    //echo $hash_verif;
    //echo "<p>above is the correct hash</p>";


    //j'ai créé un deuxième hachage composé du md5 du mot de passe tapé par l'utilisateur + le $ salt.
    $hash_v1 = md5($mdp.$salt);



    //echo $mdp;
    //echo $hash_v1;
    //echo "<p>above is the acctual hash</p>";

    
    //je vais comparer les deux hachages. 

    //s'il y a les mêmes, cela signifie que l'utilisateur a tapé le bon mot de passe.
    if( $hash_verif == $hash_v1 ){
        $this_password=true;
        //j'ai créé un objet appelé ce mot de passe et je lui donnerai la valeur (vrai).
      //echo $this_password;
      //echo "<p>the password is good</p>";

    }
    //s'il n'y a pas la même chose, cela signifie que l'utilisateur a tapé le mauvais mot de passe
    else{

      $this_password = false;
      //j'ai créé un objet appelé ce mot de passe et je lui donnerai la valeur (faux).

      //echo $this_password;

    }

    $_SESSION['this_password'] = $this_password;
    //créer une valeur visible par toutes les pages.

}






?>