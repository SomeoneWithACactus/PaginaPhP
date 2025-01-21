<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina PHP</title>
</head>
<body>
    <h1>Pagina de pruebas php</h1>
    <br>

    <table border = "1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>

        <?php

        $_registros = array();

        $_registros = [

            ['id' => '1','Nombre' => 'Rachel', 'Edad' => '20'],
            ['id' => '2','Nombre' => 'Rachel2', 'Edad' => '21'],
            ['id' => '3','Nombre' => 'Rachel3', 'Edad' => '22'],
            ['id' => '4','Nombre' => 'Rachel4', 'Edad' => '23'],

        ];

        foreach ($_registros as $_registro){?>

            <tr>
                <td><?php echo $_registro['id'];?></td>
                <td><?php echo $_registro['Nombre'];?></td>
                <td><?php echo $_registro['Edad'];?></td>
            </tr>

        <?php } ?>

        


        </tbody>
    </table>

</body>
</html>