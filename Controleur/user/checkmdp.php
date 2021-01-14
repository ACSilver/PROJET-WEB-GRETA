<?php 
	//on peut appeler cette fonction quand on a besoin avec ( incluced )



  function mdpcheck($id,$mdp,$bdd){ 


  	// after connecting with the data base


  	//1. get the salt 
  	//2. add it to the hash of the mdp 
  	//3. get the correct hash by adding the right mdp and salt
  	//4. compaire both hashs 
  	//5. if the hashs are the same 
  	//6. give $valide the value true 
  	//7. if not give $valide the value false 




    $goodmdp = true;  //returns the second argument passed into the function
    $_SESSION['goodmdp'] = $goodmdp;

  }






?>