<?php
#error_reporting(E_ERROR | E_PARSE);
require_once "./includes/session.inc.php"; #Check if the user is log in
require_once "../controller/dbconection.php"; #db connection
$_SESSION['title'] = "Mostrar equipos"; #title page
$i=0;
$opt = $_GET['opt'] ?? '';
$estado = $_GET['estado'] ?? '';

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

if ($opt != '') {

    $restante = $estado != ''
    //if it's different to an empty string it'll add extra info to the query 
    ? "AND estado='$estado' LIMIT  $start_from,$num_per_pages" 
    : "LIMIT  $start_from,$num_per_pages";

    $result = $mysqli->query("SELECT * FROM bienes, entregado_en
    WHERE (bienes.codigo = entregado_en.item_codigo)AND 
    tipo = '$opt'". $restante); 

    }else if($estado != '') {
        $restante = $opt != ''
        ? "AND tipo='$opt' LIMIT  $start_from,$num_per_pages" 
        : "LIMIT  $start_from,$num_per_pages";

        $result = $mysqli->query("SELECT * FROM bienes, entregado_en
        WHERE (bienes.codigo = entregado_en.item_codigo)AND 
        estado = '$estado'". $restante);
    }else{
        $result = $mysqli->query("SELECT * FROM bienes, entregado_en
        WHERE bienes.codigo = entregado_en.item_codigo LIMIT $start_from,$num_per_pages");
    }
?>
    <!-- ADDING NAVBAR/HEADER -->
    <?php require_once "./includes/partials/header.partial.php"; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" style="margin-top: 15px;">
        
            <select name="opt" id="category" class="form-select" style="width: 10%; display: inline;">
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
            echo "<a href='showPC.php?page=".($page-1) . "&opt=$opt&estado=$estado'class='btn btn-danger'>Previos</a>";
        }

        for ($i=1; $i <= $total_pages; $i++) { 
            echo "<a href='showPC.php?page=$i&opt=$opt&estado=$estado' class='btn m-2' data-nav='$i'>$i</a>";
        }

        //next btn
        if ($i>$page) {
            echo "<a href='showPC.php?page=".($page+1) . "&opt=$opt&estado=$estado'class='btn btn-danger'>Next</a>";
        }
        ?>
        </div>
     <script src="js/pagButtons.js"></script>
</body>
</html>