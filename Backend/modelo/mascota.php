<?php
include ('../Controlador/Conexion.php');

class mascotas
{

    private $id;
    private $nombre;
    private $raza;

    public function __construct($nombre, $raza, $id = null)
    {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->id = $id;
    }


    public function listar()
    {
        $pdo = new Conexion();
        
        $sql = $pdo->prepare("SELECT * FROM masc");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetchAll();
    } 


    public function guardar($datos)
    {
        $pdo = new Conexion();
       
            $sql = "INSERT INTO masc (id, nombre, raza) VALUES(:id, :nombre, :raza )";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $datos['id']);
            $stmt->bindValue(':nombre', $datos['nombre']);
            $stmt->bindValue(':raza', $datos['raza']);
            $stmt->execute();
           
       
    }

    public function actualizar($datos)
    {
        $pdo = new Conexion();
         
            $sql = "UPDATE masc SET nombre=:nombre, raza=:raza WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nombre', $datos['nombre']);
            $stmt->bindValue(':raza', $datos['raza']);
            $stmt->bindValue(':id', $datos['id']);
            $stmt->execute();
        
    }

   

    public function eliminar()
    {
        $pdo = new Conexion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "DELETE FROM masc WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();
        }
    }
}
