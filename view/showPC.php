<?php
#error_reporting(E_ERROR | E_PARSE);
require_once __DIR__."/../model/session.inc.php"; #Check if the user is log in
require_once __DIR__."/../model/dbconection.php"; #db connection
$i=0;
$category = $_GET['category'] ?? '';
$estado = $_GET['estado'] ?? '';
$place = $_GET['direccion'] ?? '';

//pagination
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
}else{
    $page = 1;
}


//number of pages 
$num_per_pages = 10;

//where it'll start
$start_from = ($page-1)*$num_per_pages;

$sql = sqlReturn($place,$category,$estado) . " LIMIT  $start_from,$num_per_pages";

$result = $mysqli->query($sql);



    function sqlReturn($lugar,$categoria, $est): string{
        $counter = 0;


        $counter += $categoria != '' ? 1 : 0;
        $counter += $est != '' ? 1 : 0;
        $counter += $lugar != '' ? 1 : 0;

        if($counter === 3){
        return "SELECT * FROM bienes, entregado_en 
        WHERE (bienes.codigo = entregado_en.item_codigo) AND 
        (direcciones = '$lugar' and estado='$est' and tipo = '$categoria')";}

        if($counter === 0){
            return "SELECT * FROM bienes, entregado_en
            WHERE bienes.codigo = entregado_en.item_codigo";
        }

        if($lugar != ''){

        return validaciones($lugar,$categoria,$est,'direcciones','tipo','estado');

        }  else if($categoria != ''){
            
        return validaciones($categoria,$lugar,$est,'tipo','direcciones','estado');

        } else {
            return validaciones($est,$lugar,$categoria,'estado','direcciones','tipo');
        }
        
    }

     function validaciones($principal, $complemento1, $complemento2,$col1, $col2,$col3): string{
        $nivel =1;

            if($complemento1 != '' && $complemento2 === '')
            $nivel = 2;
        
            if($complemento1 === '' && $complemento2 != '')
            $nivel = 3;
        

        
        switch ($nivel) {
            case 1:
                # if($principal != '' && ($complemento1==='' && $complemento2 === ''))
                return "SELECT * FROM bienes, entregado_en 
                WHERE bienes.codigo = entregado_en.item_codigo AND
                $col1 = '$principal'";
                break;

            case 2:
                # if($principal != '' && ($complemento1==='' && $complemento2 === ''))
                return "SELECT * FROM bienes, entregado_en 
                WHERE bienes.codigo = entregado_en.item_codigo AND
                $col1 = '$principal' AND $col2='$complemento1'";
                break;

            case 3:
                # if($principal != '' && ($complemento1==='' && $complemento2 != ''))
                return "SELECT * FROM bienes, entregado_en 
                WHERE bienes.codigo = entregado_en.item_codigo AND
                $col1 = '$principal' AND $col3='$complemento2'";
                break;
            
            default:
                return "Y esa basura que hiciste?";
                break;
        }
        
        }
?>
    <!-- ADDING NAVBAR/HEADER -->
    <?php require_once "./partials/header.partial.php"; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" style="margin-top: 15px;">
        <?php
        require_once "../pruebas/localPrint.php";
        $obj = new PrintClass();
        $obj->direccionesOptions("DIRECCIONES");
        ?>
            <select name="category" class="form-select" style="width: 10%; display: inline;">
                <option value="" hidden>Categoria</option>
                <option value="desktop">Desktop</option>
                <option value="laptop">Laptop</option>
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
    <div class="container">
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
        $pr_result = $mysqli->query("SELECT direcciones,departamentos,tipo,estado,marca,modelo,serial,codigo FROM bienes 
        INNER JOIN entregado_en 
        ON bienes.codigo = entregado_en.item_codigo");
        //getting the numbers of records to see how many links we need
        $total_records = $pr_result->num_rows;
        $total_pages = ceil($total_records/$num_per_pages);
        
        //previos button
        if ($page>1) {
            echo "<a href='showPC.php?page=".($page-1) . "&category=$category&estado=$estado&direccion=$place'class='btn btn-danger'>Previos</a>";
        }

        for ($i=1; $i <= $total_pages; $i++) { 
            echo "<a href='showPC.php?page=$i&category=$category&estado=$estado&direccion=$place' class='btn m-2' data-nav='$i'>$i</a>";
        }

        //next btn
        if ($i>$page) {
            echo "<a href='showPC.php?page=".($page+1) . "&category=$category&estado=$estado&direccion=$place'class='btn btn-danger'>Next</a>";
        }
        ?>
        </div>
     <script src="./js/pagButtons.js"></script>
</body>
</html>