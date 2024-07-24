
<?php

// Se connecter à la base de données
$db = new mysqli('127.0.0.1:3306', 'uvnzfcnjj_nawHGLuDV', 'password', 'vnzfcnjj_mabasa');

// Vérifier la connexion à la base de données
if ($db->connect_error) {
    die('Erreur de connexion à la base de données : ' . $db->connect_error);
}

// Définir les variables
$numero = $_POST['email'];
$motDePasse = $_POST['password'];

// Hacher le mot de passe
//$motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);

// Vérifier si le numéro existe déjà dans la base de données
$sql = "SELECT * FROM vnzfcnjj_mabasa WHERE email = '$email'";
$resultat = $db->query($sql);

if ($resultat->num_rows > 0) {
    echo "This number is already used.";
} else {
    // Insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO vnzfcnjj_mabasa (email, mot_de_passe) VALUES ('$email', '$password')";

    if ($db->query($sql) === TRUE) {
        echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur d'inscription : " . $db->error;
    }
}

// Fermer la connexion à la base de données
$db->close();

?>

