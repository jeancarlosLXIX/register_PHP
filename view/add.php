<?php
ini_set("display_errors",true);
  require_once "../model/printClass.class.php";
  require_once "./../model/session.inc.php";
  $_SESSION['title'] = "Agregar equipo";
?>
    
    <!-- ADDING HEADER/NAV -->
    <?php require_once "./partials/header.partial.php"; ?>
    

    <div class="content">
    <form action="../model/send.php" method="post">

        <!--DIRECCIONES-->
        <?php $obj = new PrintClass();
        $obj->direccionesOptions('DIRECCIONES');
        ?>

        <!-- DEPARTAMENTOS -->
        <br>
    <label for="departament"class="form-label">Departamento:</label>
    <select name="departamento" id="departament" required class="form-select form-select-sm prueba">
    <option selected disabled hidden> Selectionar Departamento</option>

     <!-- DEPARTAMENTOS DIRECCION ADMINISTRATIVA Y FINANCIERA -->
     <optgroup label="DIRECCION ADMINISTRATIVA Y FINANCIERA" class="DAF">
        <option value="Administrativo">Administrativo</option>
        <option value="Financiero">Financiero</option>
        <option value="Acceso Libre A La Informacion">Acceso Libre A La Informacion</option>
        <option value="Compras Y Concurso">Compras Y Concurso</option>
        <option value="Electricidad">Electricidad</option>
        <option value="Taller">Taller</option>
      </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE TECNOLOGIAS Y COMUNICACIÓN -->
    <optgroup label="DIRECCION DE TECNOLOGIAS Y COMUNICACIÓN"  class="DTIC">
        <option value="Administracion de Servicos">Administracion de Servicos</option>
        <option value="Operaciones Tic">Operaciones Tic</option>
        <option value="Programacion" >Programacion</option>
        <option value="Proyectos TIC">Proyectos TIC</option>
      </optgroup>


      <!-- DEPARTAMENTOS DIRECCION EJECUTIVA -->
      <optgroup label="DIRECCION EJECUTIVA" class="DE">
          <option value="CEHICA.">CEHICA</option>
          <option value="Cultura Del Agua.">Cultura Del Agua</option>
          <option value="Sala Del Agua.">Sala Del Agua</option>
          <option value="Direccion Ejecutiva.">Direccion Ejecutiva</option>
      </optgroup>

      <!-- DEPARTAMENTOS DIRECCION JURIDICA -->
      <optgroup label="DIRECCION JURIDICA"class="DJ">
        <option value="Elaboracion De Documentos Legales">Elaboracion De Documentos Legales</option>
        <option value="LITIGIOS">LITIGIOS</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION OPERATIVA DE EJECUCION Y CUMPLIMIENTO -->
    <optgroup label="DIRECCION OPERATIVA DE EJECUCION Y CUMPLIMIENTO" class="DOEC">
        <option value="Adm. De Contratos En Eje." >Adm. De Contratos En Eje</option>
        <option value="Seg. De Acuerdos Nac. E Int." >Seg. De Acuerdos Nac. E Int</option>
        <option value="Direccion Operativa De Ejec. Y Cumplimiento">Direccion Operativa De Ejec. Y Cumplimiento</option>
    </optgroup>

    <!-- DEPARTAMENTOS SUBDIRECCION -->
    <optgroup label="SUBDIRECCION"class="SUB">
        <option value="SUBDIRECCION">SUBDIRECCION</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE COMUNICACIONES -->
    <optgroup label="DIRECCION DE COMUNICACIONES" class="DC">
        <option value="Centro De Documentacion">Centro De Documentacion</option>
        <option value="Eventos Y Protocolo">Eventos Y Protocolo</option>
        <option value="Redes Sociales Y Medios Digitales">Redes Sociales Y Medios Digitales</option>
        <option value="Relaciones Publicas Y Prensa">Relaciones Publicas Y Prensa</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE RECURSOS HUMANOS -->
    <optgroup label="DIRECCION DE RECURSOS HUMANOS"class="DRH">
        <option value="Evaluacion Del Desempeño Y Capacitacion">Evaluacion Del Desempeño Y Capacitacion</option>
        <option value="Organizacion Del Trabajo Y Compensaciones">Organizacion Del Trabajo Y Compensaciones</option>
        <option value="Registro,Control Y Nominas">Registro,Control Y Nominas</option>
        <option value="Relaciones Laborales Y Sociales">Relaciones Laborales Y Sociales</option>
        <option value="Dispensario Medico" data-area="DRHA">Dispensario Medico</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE PROYECTOS Y OBRAS -->
    <optgroup label="DIRECCION DE PROYECTOS Y OBRAS"class="DPO">
        <option value="Analisis De Costo Y Reclamaciones De Obras" data-divi="DPOH">Analisis De Costo Y Reclamaciones De Obras</option>
        <option value="Diseño">Diseño</option>
        <option value="Ejecucion De Proyectos">Ejecucion De Proyectos</option>
        <option value="Supervision Y Cubicacion">Supervision Y Cubicacion</option>
        <option value="GUAIGUI">GUAIGUI</option>
        <option value="Los Toros">Los Toros</option>
        <option value="MONTEGRANDE">MONTEGRANDE</option>
        <option value="Proyecto Azua II">Proyecto Azua II</option>
        <option value="Proyecto La Piña">Proyecto La Piña</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE PLANIFICACION Y DESARROLLO HIDRICO -->
    <optgroup label="DIRECCION DE PLANIFICACION Y DESARROLLO HIDRICO" class="DPDH">
        <option value="Geomatica">Geomatica</option>
        <option value="Gestion Ambiental">Gestion Ambiental</option>
        <option value="Hidrologia" >Hidrologia</option>
        <option value="Planificacion Y Des. Hidrico">Planificacion Y Des. Hidrico</option>
        <option value="Taller De Hidrologia" >Taller De Hidrologia</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE OPERACIONES Y CONS. DE SISTEMA DE RIEGO -->
    <optgroup label="DIRECCION DE OPERACIONES Y CONS. DE SISTEMA DE RIEGO" class="DOCSR">
        <option value="Servicio Al Usuario De Riego">Servicio Al Usuario De Riego</option>
        <option value="Presas Y Embases">Presas Y Embases</option>
        <option value="Direccion Regionales De Sistemas De Riego">Direccion Regionales De Sistemas De Riego</option>
        <option value="Direcciones Regionales De Sistemas De Riego">Direcciones Regionales De Sistemas De Riego</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE PLANIFICACION PARA EL DESARROLLO INSTITUCIONAL -->
    <optgroup label="DIRECCION DE PLANIFICACION PARA EL DESARROLLO INSTITUCIONAL" class="DPDI">
        <option value="Cooperacion Internacional">Cooperacion Internacional</option>
        <option value="Calidad En La Gestion">Calidad En La Gestion</option>
        <option value="Planif. Para El Desarrollo Inst.">Planif. Para El Desarrollo Inst.</option>
    </optgroup>

    <!-- DEPARTAMENTOS DIRECCION DE FISCALIZACION Y REVISION -->
    <optgroup label="DIRECCION DE FISCALIZACION Y REVISION" class="DFR">
        <option value="Direccion De Fiscalizacion Y Revision">Direccion De Fiscalizacion Y Revision</option>
    </optgroup>
    
</select>


    <br>
            <label for="code" class="form-label">Codigo: </label>
            <input type="text" id="code" placeholder="Codigo" class="form-control" name="codigo" >
            
            <br>
            <label for="serial" class="form-label">Serial: </label>
            <input type="text" id="serial" class="form-control" placeholder="Serial" required name="serial"> 
            
            <br><br>
            <label for="marca"class="form-label">Marca: </label>
            <input type="text" id="marca" class="form-control" placeholder="Marca" name="marca" required> 
            
            <br><br>
            <label for="model"class="form-label">Modelo: </label>
            <input type="text" id="model" class="form-control"  placeholder="Modelo" name="modelo"> 
            
            
            <br><br>
            <label for="tipo"class="form-label">Tipo:</label>
            <select name="tipo" id="tipo" class="form-select form-select-sm">
            <option value="Monitor">Monitor</option>
            <option value="UPS">UPS</option>
            <option value="Desktop">Desktop</option>      
            <option value="Laptop">Laptop</option>      
            <option value="Impresora">Impresora</option>
        </select>

        <br>
        <label for="estado"class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-select form-select-sm">
            <option value="Nuevo">Nuevo</option>
            <option value="Usado">Usado</option>
            <option value="Descargado">Descargado</option>      
        </select>
        <br>
        <label for="comments">Informacion extra (opcional):</label>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea> 
            <div id="contador" style="display:none;"></div>
        <br>  
        <div class="texto alert alert-danger" role="alert" style="display:none;">Limite de caracteres excedido</div> 
        <br><br> 
            <input type="submit"  name="addPC" value="Enviar" class="btn btn-outline-primary">
</form>
</div>

<!-- ADDING FOOTER -->
<?php require_once "./partials/footer.partial.php"; ?>