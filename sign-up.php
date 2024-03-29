<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Inscription Cinefa</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
      <link rel="icon" href="./assets/Cinefa-logo-black.png" />
   <body>
      <div class="container">
      <div class="card">
         <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">S'enregistrer</h4>
            <hr>
            <form method="post" action="sign-up.php">
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                     </div>
                     <input name="pseudo" class="form-control" placeholder="Pseudo" type="text" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i> </span>
                     </div>
                     <input name="mail" class="form-control" placeholder="Email" type="text" required>
                  </div>
               </div>
               <div class="form-group">
               <div class="input-group">
                  <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                  </div>
                  <textarea class="form-control" name="address" placeholder="Adresse" required></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                     </div>
                     <input name="phone" class="form-control" placeholder="Tél." type="tel" required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                     </div>
                     <input class="form-control" placeholder="mot de passe" type="password" name='password'required>
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                     </div>
                     <input class="form-control" placeholder="confirmation de mot de passe" type="password" name='passwordconf' required>
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block" name="submit"> S'enregistrer  </button>
                  <a class="btn btn-danger btn-block" href="index.php"> Annuler  </a>
               </div>
               <p class="text-center"><a href="./sign-in.php" class="btn">Deja un compte ?</a></p>

<?php
  
  require 'connectmysql.php';


  if(isset($_POST['submit'])){

   $pseudo = $_POST['pseudo'];
   $mail = $_POST['mail'];

   $address = str_replace("'", " ", $_POST['address']);
   $phone= $_POST['phone'];
   $password = $_POST['password'];
   $passwordconf = $_POST['passwordconf'];

   $sqlsign_in = "INSERT INTO Users (`pseudo`,`address`, `mail`, `phone`, `password`) VALUES ('" . $pseudo . "' , '" . $mail . "' , '" . $address . "' , '" . $phone . "' , '" . $password . "')";

      if(isset($pseudo) || isset($mail) || isset($addresse) || isset($phone) || isset($password) || isset($passwordconf)){
         if(($passwordconf) != ($password)){
            echo '<p class="text-center text-danger">les mots de passes ne correspondent pas !</p>';
         }else{
            $insert_user_pseudo = mysqli_query($db_handle, $sqlsign_in);

            echo '<div class="message_reussi text-success"> Inscription réussie ! </div>';

            if($insert_user_pseudo){
               
            session_start();
               $_SESSION['pseudo'] = $pseudo;
               $_SESSION['address'] = $address;
               $_SESSION['mail'] = $mail;
               $_SESSION['phone'] = $phone;
         
                        echo '
               <script LANGUAGE="JavaScript">
                document.location.href="my-account.php" 
               </script>
               '; 
               }


                     
         }
      } 
   }

?>
       </form>
         </article>
      </div>
      <!-- card.// -->
      </aside> <!-- col.// -->
      </div> <!-- row.// -->
      </div> 
      <!--container end.//-->


   </body>

</html>