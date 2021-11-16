<?php require_once "./code.php"; 
require_once "./localPrint.php";
?>
    <!-- ADDING NAVBAR/HEADER -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="style/i.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['title']; ?></title>
    <link rel="stylesheet" href="../view/style/style.css">
    <script src="../view/JS/selects.js" defer></script>
</head>
<body>
<a href="./addP.php">ADD</a>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" style="margin-top: 15px;">
            <!--DIRECCIONES-->
        <?php $obj = new PrintClass();
        $obj->direccionesOptions('DIRECCIONES');
        ?>
            <select name="category" class="form-select" style="width: 10%; display: inline;">
                <option value="" hidden>Categoria</option>
                <option value="desktop">Desktop</option>
                <option value="impresora">impresora</option>
                <option value="ups">UPS</option>
                <option value="monitor">Monitor</option>
            </select>
            <!-- ESTADO -->
            <select name="estado" id="state" class="form-select" style="width: 10%; display: inline;">
                <option value="" selected hidden>Estado</option>
                <option value="nuevo">Nuevo</option>
                <option value="usado">Usado</option>
                <option value="descargado">Descargado</option>
                <option value="">Todos</option>
            </select>
            <button class="btn btn-danger">enviar</button>
    </form>
    <div class="">
        <table class='table caption-top'>
        <caption >Listado de equipos</caption>
            <tr class='table-dark'>
                <th>#</th>
                <th>Direcciones</th>
                <th>Departamento</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serial</th>
                <th>Codigo</th>
            </tr>
            <tr>
                <?php
                while($row = $result->fetch_assoc())
                {
                ?> 
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['direcciones'] ?></td>
                    <td><?php echo $row['departamentos'] ?></td>
                    <td><?php echo $row['tipo'] ?></td>
                    <td><?php echo $row['estado'] ?></td>
                    <td><?php echo $row['marca'] ?></td>
                    <td><?php echo $row['modelo'] ?></td>
                    <td><?php echo $row['serial'] ?></td>
                    <td><?php echo $row['codigo'] ?></td>
                    
            </tr>
            <?php } ?>
        </table>
        <?php 
        $pr_result = $mysqli->query("SELECT * FROM bienes 
        INNER JOIN entregado_en 
        ON bienes.codigo = entregado_en.item_codigo");
        //getting the numbers of records to see how many links we need
        $total_records = $pr_result->num_rows;
        $total_pages = ceil($total_records/$num_per_pages);
        
        //previos button
        if ($page>1) {
            echo "<a href='localShow.php?page=".($page-1) . "&category=$category&estado=$estado&direccion=$place'class='btn btn-danger'>Previos</a>";
        }

        for ($i=1; $i <= $total_pages; $i++) { 
            echo "<a href='localShow.php?page=$i&category=$category&estado=$estado&direccion=$place' class='btn m-2' data-nav='$i'>$i</a>";
        }

        //next btn
        if ($i>$page) {
            echo "<a href='localShow.php?page=".($page+1) . "&category=$category&estado=$estado&direccion=$place'class='btn btn-danger'>Next</a>";
        }
        ?>
        </div>
     <script src="../view/js/pagButtons.js"></script>
</body>
</html>