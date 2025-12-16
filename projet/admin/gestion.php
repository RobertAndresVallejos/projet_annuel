<!---->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/gestion.css">
</head>
<body>
    <?php require_once("../php/database.php"); ?><!--inclusion connexion BD-->
    <?php require_once("../php/header.php"); ?><!--Inclusion du header-->
    <main id="main_gestion">
    <table>
        <!-- Légende du tableau -->
        <caption>
            Front-end web developer course 2021
        </caption>
        <!-- En tête du tableau contenant les colonnes -->
        <thead>
            <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Email</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Chris</th>
                <td>chris@example.com</td>
                <td>Chris</td>
                <td>Evans</td>
                <td>********</td>
                <td><button>Modifier</button></td>
                <td><button>Supprimer</button></td>
            </tr>
            <tr>
                <th scope="row">Dennis</th>
                <td>dennis@example.com</td>
                <td>Dennis</td>
                <td>Rodman</td>
                <td>********</td>
                <td><button>Modifier</button></td>
                <td><button>Supprimer</button></td>
            </tr>
            <tr>
                <th scope="row">Sarah</th>
                <td>sarah@example.com</td>
                <td>Sarah</td>
                <td>Connor</td>
                <td>********</td>
                <td><button>Modifier</button></td>
                <td><button>Supprimer</button></td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    </main>
    <?php require_once ("../php/footer.php"); ?>
</body>
</html>