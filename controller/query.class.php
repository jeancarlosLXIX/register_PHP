<?php

class Query {
    private $host = "127.0.0.1";
    private $user = "root";
    private $pwd = "";
    private $dbName = "indrhi";

    public $conn = null;

    public function __construct()
    {
        //connection
        $this->conn = mysqli_connect($this->host, $this->user, $this->pwd, $this->dbName);
        
    }

  #https://www.w3schools.com/php/php_mysql_insert_multiple.asp
    public function insertD(){
        
        $codigo = $_POST['codigo'];

        $sql = "INSERT INTO 
       bienes(tipo, modelo, marca, serial, codigo, registrado_por, estado) 
       VALUES('$_POST[tipo]','$_POST[modelo]','$_POST[marca]',
       '$_POST[serial]','$codigo', '$_SESSION[user]', '$_POST[estado]');";

        if ($this->conn->query($sql) === TRUE) {
            //if everything was fine now we add the departament 
            $sql = "INSERT INTO  
            entregado_en(direcciones, departamentos, item_codigo, comentarios) 
            VALUES('$_POST[direccion]','$_POST[departamento]','$codigo', '$_POST[comments]');";

            if ($this->conn->query($sql) === TRUE) {
                
                header("Location: index.php");
            }else {
                echo "Lo mismo: " . $sql . "<br>" . $this->conn->error;
                }

            } else {
        echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }


    #ADDING NEW USER
    public function insertUser(){
        
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios(name, lastname, password, user) 
                VALUES('$_POST[name]','$_POST[lastname]','$password','$_POST[user]');";

        if ($this->conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario agregado exitosamente.')</script>";
        }else {
            echo "user: " . $sql . "<br>" . $this->conn->error;
            }

    }

    public function verifyUser(){
        $userName = $_POST['user'];
        $password = $_POST['password'];

        //ojo
	$sql = "SELECT * FROM usuarios WHERE user='$userName'";

    $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    }

    if (password_verify($password, $row['password'])) {
		$_SESSION['name'] = $row['name'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['user'] = $row['user'];
		header("Location: index.php");
    
    }
}

}