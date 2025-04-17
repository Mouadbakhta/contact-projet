<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gestion des contacts</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
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
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>téléphone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
            $sql="select * from contacts ";
            $contacts=$pdo->query($sql)->fetchAll();          
            
            foreach($contacts as $contact){
                echo"<tr>";
                echo"<td>" . htmlspecialchars($contact['id']) . "</td>";
                echo"<td>" .htmlspecialchars($contact['nom']). "</td>";
                echo"<td>" .htmlspecialchars($contact['prenom']). "</td>";
                echo"<td>" .htmlspecialchars($contact['tel']). "</td>";
                echo"<td>".htmlspecialchars($contact['email']). "</td>";
                echo"</tr>";  
            }          
                   
            ?>
        </tbody>
    </table>
    <button name="add"><a href="add.php">ajoute une contact</a></button>
    <button name="edit"><a href="edit.php">Mise à jour d'un contact</a></button>

    
</body>
</html>