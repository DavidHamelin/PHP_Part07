<?php
// Ex 03
if (isset($_GET['lastname']) AND isset($_GET['firstname'])) // On a le nom et le prénom
{
	echo 'Bonjour ' . $_GET['firstname'] . ' ' . $_GET['lastname'] . ' !';
}
else // Il manque des paramètres, on avertit le visiteur
{
	echo 'Il faut renseigner un nom et un prénom !';
}

// Ex 04
if (isset($_POST['lastname']) AND isset($_POST['firstname'])) // On a le nom et le prénom
{
	echo 'Bonjour ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ' !';
}
else // Il manque des paramètres, on avertit le visiteur
{
	echo 'Il faut renseigner un nom et un prénom !';
}

// Ex 03

?>