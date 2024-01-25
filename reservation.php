<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        h1 {
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .actions {
            display: flex;
            
            justify-content: space-around;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        #searchInput {
            border-radius: 15px;
        }
        .btn-small {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
    </style> 
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("reservationTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
</script>   
</head>
<body>
    <div class="container">
        <h1>Réservations</h1>
        <div class="search-container">
            <button onclick="location.href='ajouter_reservation.php'" class="btn btn-primary btn-small">Ajouter</button>
           

            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher" class="form-control">
            <button onclick="location.href='index.php'" class="btn btn-primary">Retour</button>
        </div>
        <table id="reservationTable">
            <tr>
                <th>ID Réservation</th>
                <th>Date</th>
                <th>Prix</th>
                <th>Moyen de Paiement</th>
                <th>Référence Utilisateur</th>
                <th>Référence Film</th>
                <th>Actions</th>
            </tr>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT * FROM reservations');
            while ($donnees = $reponse->fetch()) {
                echo '<tr>';
                echo '<td>' . $donnees['id_reservations'] . '</td>';
                echo '<td>' . $donnees['date'] . '</td>';
                echo '<td>' . $donnees['prix'] . '</td>';
                echo '<td>' . $donnees['moyen_paiement'] . '</td>';
                echo '<td>' . $donnees['ref_user'] . '</td>';
                echo '<td>' . $donnees['ref_film'] . '</td>';
                echo '<td><button onclick="location.href=\'modifier_reservation.php?id=' . $donnees['id_reservations'] . '\'" class="btn btn-primary">Modifier</button>';
                echo ' ';
                echo ' ';
                echo '<button onclick="location.href=\'supprimer_reservation.php?id=' . $donnees['id_reservations'] . '\'" class="btn btn-danger">Supprimer</button>';
                echo '</tr>';
            }
            ?>
        </table>
        
    </div>
</body>
