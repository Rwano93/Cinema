<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($films as $film): ?>
                    <tr>
                    <td><img src="<?php echo $film['image']; ?>" alt="<?php echo $film['nom']; ?>"></td>
                    <td><?php echo $film['nom']; ?></td>
                    <td><?php echo $film['auteur']; ?></td>
                    <td><?php echo $film['resume']; ?></td>
                    <td><?php echo $film['date_sortie']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>