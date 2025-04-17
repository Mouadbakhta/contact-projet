<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edition</title>
    <style>
        .container {
            width: 400px;
            margin: auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
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
        <h2>Mise à jour d'un contact</h2>
        <form action="edit.php">
            <label for="id">ID</label>
            <input type="number" name="id" required>
            
        </form>
        <button><a href="index.php">HOME</a></button>

    </div>
    <div class="resultat">


    </div>
</body>
</html>