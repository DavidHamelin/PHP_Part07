<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <title> Php Partie 07 </title>
        
    </head>
    <body>
        <!-- Ex 01 -->
        <!-- <form id="methodGet" method="get" action="user.php">
            <div class="row">
                <div class="col s6 offset-s3">
                    <label for="lastname">Entrez votre Nom</label>
                    <input type="text" name="lastname" id="lastname" width="10"/>
                </div>
                <div class="col s6 offset-s3">
                    <label for="firstname">Entrez votre Prénom</label>
                    <input type="text" name="firstname" id="firstname" width="10"/>
                </div>
            </div>
            <div class="row">
            <button class="btn col offset-s3" type="submit"> Envoyer<i class="material-icons left">send</i></button>
            </div>
        </form> -->
        <!-- Ex 02 -->
        <!-- <form id="methodPost" method="post" action="user.php">
            <div class="row">
                <div class="col s6 offset-s3">
                    <label for="lastname">Entrez votre Nom</label>
                    <input type="text" name="lastname" id="lastname" width="10"/>
                </div>
                <div class="col s6 offset-s3">
                    <label for="firstname">Entrez votre Prénom</label>
                    <input type="text" name="firstname" id="firstname" width="10"/>
                </div>
            </div>
            <div class="row">
            <button class="btn col offset-s3" type="submit"> Envoyer<i class="material-icons left">send</i></button>
            </div>
        </form> -->

        <!-- Ex 05 -->
        <?php
            if ((isset($_POST['lastname']) === false) 
            || (isset($_POST['firstname']) === false) 
            || (isset($_POST['gender']) === false))
            {
        ?>   
        <h4 class="center-align" style="color:red;">
        Il faut renseigner une civilité, un nom et un prénom !
        </h4>
        <form id="methodPostIndex" method="post" action="index.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col s2 offset-s3">
                <label for="gender">Civilité</label>
                <select name="gender" id="gender" required >
                    <option value="" disabled selected>Civilité</option>
                    <option value="Mme">Madame</option>
                    <option value="M.">Monsieur</option>
                </select>
            </div>
        </div>
            <div class="row">
                <div class="col s6 offset-s3">
                    <label for="lastname">Entrez votre Nom</label>
                    <input type="text" name="lastname" id="lastname" width="10" required/>
                </div>
                <div class="col s6 offset-s3">
                    <label for="firstname">Entrez votre Prénom</label>
                    <input type="text" name="firstname" id="firstname" width="10" required/>
                </div>
            </div>
            <div class="row">
            <input type="file" class="btn col s6 offset-s3" name="monfichier" />
            </div>
            <div class="row">
            <button class="btn-floating btn-large cyan pulse col offset-s3" type="submit"><i class="material-icons left">send</i></button>
            <button type="reset" class="btn-floating btn-large cyan col offset-s5">RESET</button>
            </div>
        </form>
        
        <?php
        }
        else
        {
            echo '<h4 class="center-align"> Bonjour ' . htmlspecialchars($_POST['gender']). ' ' 
            . htmlspecialchars($_POST['firstname']) . ' ' 
            . htmlspecialchars($_POST['lastname']) . ' ! </h4>';
        }
        
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
        {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['monfichier']['size'] <= 1000000)
                {
                        // Testons si l'extension est autorisée
                        $infosfichier = pathinfo($_FILES['monfichier']['name']);
                        $extension_upload = $infosfichier['extension'];
                        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'pdf');
                        if (in_array($extension_upload, $extensions_autorisees))
                        {
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($_FILES['monfichier']['tmp_name'], '/home/davidh/Téléchargements/uploads/' . basename($_FILES['monfichier']['name']));
                                echo "L'envoi a bien été effectué !";
                        }
                }
        }
        ?>
        
        <!-- jQuery -->
        <script
			  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
			  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
			  crossorigin="anonymous">
        </script>
        <!-- Materialize -->
        <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
        </script>
        <!-- Script pour dropdownList Materialize -->
        <script>
            $(document).ready(function(){
            $('select').formSelect();
            });
        </script>
    </body>
</html>