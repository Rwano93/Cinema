<?php
$bdd = new PDO('mysql:host=localhost;dbname=cinemaproject;charset=utf8', 'root', '');

$res = $bdd->query('SELECT * FROM films');
$films = $res->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="path/to/select2.min.css" rel="stylesheet" />
    <script src="path/to/select2.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <table>
        <?php foreach($films as $film): ?>
            <tr>
                <td><img src="<?php echo $film['image']; ?>" alt="<?php echo $film['nom']; ?>"></td>
                <td><?php echo $film['nom']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>