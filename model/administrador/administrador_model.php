<?php


require_once __DIR__ . '/../model/Conexion.php';
//
class administrador_model
{
    private $DB;
    private $administradors;


    function __construct()
    {
        $this->DB = new conexion();
    }
    //funcion para obtener los datos de la tabla administradores
    function get()
    {
        $sql = 'SELECT * FROM administradores ORDER BY id_administrador DESC';
        $fila = $this->DB->conectar()->query($sql);
        $this->administradors = $fila;
        return  $this->administradors;
    }

    //funcion para insertar un nuevo administrador
    function create($usuario, $contasena)
    {
        $sql = "INSERT INTO administradores(usuario, contrasena)VALUES (?,?)";
        $this->DB->conectar()->bind_param("iiiii", ...$colaciones);
        $query = $this->DB->prepare($sql);
        $query->execute(array($data['usuario'], $data['contrasena']));
        Database::disconnect();
    }
    //funcion para validar el login del administrador
    function validar($data)
    {
        // Conectar a la base de datos
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_administrador FROM administradores WHERE usuario = ? AND contrasena = ?";
        $query = $this->DB->prepare($sql);
        $query->execute(array($data['usuario'], $data['contrasena']));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $result ? $result['id_administrador'] : null;
    }
    //funcion para obtener los datos de un administrador
    function get_id($id)
    {
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM administradores where id_administrador = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //funcion para actualizar los datos de un administrador
    function update($data, $date)
    {
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE administradores  set  usuario=?, contrasena =?,  WHERE id_administrador = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['usuario'], $data['contrasena']));
        Database::disconnect();
    }
    //funcion para eliminar un administrador
    function delete($date)
    {
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM administradores where id_administrador=?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($date));
        Database::disconnect();
    }
    //funcion para obtener el nombre de un administrador
    public function obtenerNombreAdministrador($id_administrador)
    {
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT usuario FROM administradores WHERE id_administrador = ?";
        $q = $this->DB->prepare($sql);
        $q->execute([$id_administrador]);

        //obtener el resultado de la consulta
        $nombre_administrador = $q->fetch(PDO::FETCH_ASSOC);

        //verificar si se encontró el nombre del administrador
        if ($nombre_administrador) {
            //devolver el nombre del administrador
            return $nombre_administrador['usuario'];
        } else {
            //si no se encontró el nombre del administrador, devolver null
            return null;
        }
    }
}
