<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact</title>
    <style>
        .container {
            width: 400px;
            margin: auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
        }
        input, label {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button a {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter un contact</h2>
        <form action="" method="POST">
            <label for="nom">NOM</label>
            <input type="text" name="nom" required>

            <label for="prenom">PRENOM</label>
            <input type="text" name="prenom" required>

            <label for="tel">Téléphone</label>
            <input type="text" name="tel" placeholder="ex: 0612345678" max="10" required>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="ex: exemple@domaine.com" required>

            <input type="submit" value="Envoyer">
        </form>
    </div>
    <div class='results'>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["tel"]) && !empty($_POST["email"])) {

                    
                    $nom = htmlspecialchars($_POST["nom"]);
                    $prenom = htmlspecialchars($_POST["prenom"]);
                    $email = htmlspecialchars($_POST["email"]);
                    $tel = htmlspecialchars($_POST["tel"]);

                   
                    try {
                        $pdo = new PDO(
                            "mysql:host=localhost;dbname=projetchat;charset=utf8mb4",
                            "root",
                            "",
                            [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                            ]
                        );
                       
                    } catch (PDOException $e) {
                        die("Erreur de connexion : " . $e->getMessage());
                    }

                    
                    $sql = "INSERT INTO contacts (nom, prenom, tel, email) VALUES (?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$nom, $prenom, $tel, $email]);

                    echo "<p style='color:green;'>Contact ajouté avec succès !</p>";
                } else {
                    echo "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
                }
            }
            ?>
        </div>
        <button><a href="index.php">HOME</a></button>
</body>
</html>
