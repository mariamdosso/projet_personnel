<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Membres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Gestion des Membres</h1>
        <a href="ajouter_membre.php" class="btn btn-primary mb-3">Ajouter un membre</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Date d'adhésion</th>
                    <th>genre</th>
                    <th>ville</th>
                    <th>commune</th>
                    <th>quartier</th>
                </tr>
            </thead>
            <tbody>
            
                <tr>
                    <td>1</td>
                    <td>Dupont</td>
                    <td>Jean</td>
                    <td>2025-01-01</td>g
                    <td>2025-01-01</td>
                    <td>feminin</td>
                    <td>abidjan</td>
                    <td>yopougon</td>
                    <td>gesco</td>
                    <td>
                        <a href="modifier_membre.php?id=1" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="supprimer_membre.php?id=1" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $date_adhesion = $_POST['date_adhesion'];
    $genre = $_POST['genre'];
    $ville = $_POST['ville'];
    $commune = $_POST['commune'];
    $quartier = $_POST['quartier'];

    $sql = "INSERT INTO Membre (nom_memb, pren_memb, date_nais_memb, date_adhes_memb, genre_memb, ville_memb, commune_memb, quartier_memb)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom_memb, $pren_memb, $date_nais_memb, $date_adhes_memb, $genre_memb, $ville_memb, $commune_memb, $quartier_memb]);
    echo "Membre ajouté avec succès.";
}
$id_membre = $_GET['id'];
$sql = "DELETE FROM Membre WHERE id_memb = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_memb]);
echo "Membre supprimé avec succès.";


session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Utilisateur WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['id_util'] = $user['id_util'];
        header('Location: tableau de bord.php');
    } else {
        echo "Identifiants incorrects.";
    }
}
?>
<?php require_once __DIR__ . "/config/db.php"; ?>
