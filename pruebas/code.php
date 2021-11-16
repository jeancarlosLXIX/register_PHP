<?php
#error_reporting(E_ERROR | E_PARSE);
require_once __DIR__."/localDB.php"; #db connection
$_SESSION['title'] = "Mostrar equipos"; #title page
$_SESSION['name'] = "Pruebas";
$_SESSION['lastname'] = "Local"; 
$i=0;
$category = $_GET['category'] ?? '';
$estado = $_GET['estado'] ?? '';
$place = $_GET['direccion'] ?? '';



#sqlReturn($place,$category,$estado);

//pagination
if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
}else{
    $page = 1;
}


//number of pages 
$num_per_pages = 2;

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