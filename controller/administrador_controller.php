<?php 
    require_once('modelo/administrador_model.php');
    //clase para el controlador de administrador
    class administrador_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new administrador_model();
        }
        //funcion para mostrar la vista principal de administrador
        function index(){
            $query =$this->model_e->get();

            include_once('vistas/headerLogin.php');
            include_once('vistas/administrador/login.php');
            include_once('vistas/footer.php');
        }
        //funcion para mostrar la vista de la tabla de administradores
        function inicio(){
            $query =$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/administrador/index.php');
            include_once('vistas/footer.php');
        }
        //funcion para mostrar la vista de login
        function login(){
            $query =$this->model_e->get();

            include_once('vistas/headerLogin.php');
            include_once('vistas/administrador/login.php');
            include_once('vistas/footer.php');
        }
        //funcion para mostrar la vista de registro
        function registro(){
            $query =$this->model_e->get();

            include_once('vistas/headerLogin.php');
            include_once('vistas/administrador/registro.php');
            include_once('vistas/footer.php');
        }
        //funcion para validar el login del administrador y trabajar con sesiones
        function loginAdministrador(){
            //obtener los datos del formulario
            $data['usuario'] = $_REQUEST['usuario'];
            $data['contrasena'] = $_REQUEST['contrasena']; 
            //llamar al metodo del modelo para validar el administrador
            $id_administrador = $this->model_e->validar($data);
            //validar si se encontró el administrador
            if ($id_administrador) {
                session_start();
                $_SESSION['id_administrador'] = $id_administrador;
                
                //Llamar al mtodo del modelo para obtener el nombre del administrador
                $nombre_administrador = $this->model_e->obtenerNombreAdministrador($id_administrador);
                
                //validar si se encontró el nombre del administrador
                if ($nombre_administrador) {
                    $_SESSION['nombre_administrador'] = $nombre_administrador;
                }
                //redireccionar a la vista principal del administrador
                header("Location: index.php?m=inicio");
                exit(); 
            }
            else {
                //si no se encontró el administrador, mostrar mensaje de error
                include_once('vistas/headerLogin.php');
                echo "Usuario o contraseña incorrectos";
                include_once('vistas/administrador/login.php');
                include_once('vistas/footer.php');
            
            }
        }
        //funcion para registrar un nuevo administrador
        function registroAdministrador(){
            $data['usuario'] = $_REQUEST['usuario'];
            $data['contrasena'] = $_REQUEST['contrasena']; 
            $this->model_e->create($data);
            header("Location:index.php?m=login");
        }
        //funcion para obtener los datos de un administrador y poder editar

        function get_datosE(){

            
            $data['id']=$_REQUEST['txt_id'];
            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            //validar si se envia un id
            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php");

        }
        //funcion para cerrar la sesion un administrador
        function cerrarSesion(){
            //destruir la sesion
            session_start();
            session_destroy();
            //redireccionar a la vista de login
            header("Location:index.php?m=login");
            exit();
        }


    }
?>