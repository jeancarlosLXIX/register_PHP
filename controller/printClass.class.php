<?php

/**
 * just to print from the DB
 * SELECT direcciones,departamentos,tipo,estado,marca,modelo,serial,codigo FROM bienes 
    INNER JOIN entregado_en 
    ON bienes.codigo = entregado_en.item_codigo
 */


class PrintClass {
    private $host = "127.0.0.1";
    private $user = "root";
    private $pwd = "";
    private $dbName = "indrhi";
    

    public function __construct()
    {
        //connection
        $this->conn = new mysqli ($this->host, $this->user, $this->pwd, $this->dbName);
    }

    public function direccionesOptions($place){
        switch ($place) {
            case 'DIRECCIONES':
                $sql = "SELECT * FROM direcciones";
                $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<label for='direction'class='form-label'>Direccion:</label>
                  <select name='direccion' id='direction' required class='form-select form-select-sm'>
                  <option value'Empty' selected hidden> Seleccionar direccion</option>";
            while($row = $result->fetch_assoc()) {
              echo "<option value='$row[siglas]' data-departamento ='$row[siglas]'>$row[nombre]</option>";
            }
            echo "</select>";
        }
            #warning
            $this->conn->close();
                break;
            
            default:
                # code...
                break;
        }
}

public function printData(){
    /*
    * Gettind data  */
    $i = 1;
    $sql = "SELECT * FROM bienes 
    INNER JOIN entregado_en 
    ON bienes.codigo = entregado_en.item_codigo";
    $result = $this->conn->query($sql);
    /*
    * ******* END ********/
    if ($result->num_rows > 0) {
        echo " <table class='table caption-top'>
        <caption >Listado de equipos</caption>
        <thead class='table-dark'>
            <tr style='font-size:1.5vw;'>
              <th>#</th>
              <th>Direcciones</th>
              <th>Departamentos</th>
              <th>Tipo</th>
              <th>Estado</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serial</th>
              <th>Codigo</th>
              <th>Fecha</th>
            </tr>
        </thead>";

        while($array = $result->fetch_assoc()) {
            $date = new DateTime($array['ingreso']);
            echo " <tbody>
            <tr>
              <td>". $i++ ."</td>
              <td>$array[direcciones]</td>
              <td>$array[departamentos]</td>
              <td>$array[tipo]</td>
              <td>$array[estado]</td>
              <td>$array[marca]</td>
              <td>$array[modelo]</td>
              <td>$array[serial]</td>
              <td>$array[codigo]</td>
              <td>". $date->format('d/m/y')."</td>
            </tr>
      </tbody>";
        }
        echo "</table>";
    }
    $this->conn->close();
}

}