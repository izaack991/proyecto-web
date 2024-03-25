<?php
    session_start();
    require_once('conexion.class.php');
    class Login
    {
     
        private static $instancia;
        private $dbh;
     
        private function __construct()
        {
     
            $this->dbh = Conexion::singleton_conexion();
     
        }
     
        public static function singleton_login()
        {
     
            if (!isset(self::$instancia)) {
     
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
     
            }
     
            return self::$instancia;
     
        }
    
        public function login_users($_correo,$_password,$_tipo)
        {
            
            try {
                
                $sql = "SELECT * from tbl_usuario WHERE correo = :us_mail AND password = :us_pass AND rol = :us_tipo";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(":us_mail",$_correo);
                $query->bindParam(":us_pass",$_password);
                $query->bindParam(":us_tipo",$_tipo);
                $query->execute();
                
                //si existe el usuario
                if($query->rowCount() == 1)
                {
                     $fila  = $query->fetch();
                     $_SESSION['iusuario'] = $fila['id_usuario'];
                     $_SESSION['nomusuario'] = $fila['nombre'];
                     $_SESSION['razonsocial'] = $fila['razon_social'];
                     $_SESSION['irol']= $fila['rol'];                                      
                     return TRUE;
                }
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            
        }

        public function login_status($_correo,$_password,$_tipo)
        {
            
            try {
                
                $sql = "SELECT * from tbl_usuario WHERE correo = :us_mail AND password = :us_pass AND rol = :us_tipo AND status=1";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(":us_mail",$_correo);
                $query->bindParam(":us_pass",$_password);
                $query->bindParam(":us_tipo",$_tipo);
                $query->execute();
                $this->dbh = null;
                
                //si existe el usuario
                if($query->rowCount() == 1)
                {
                     $fila  = $query->fetch();
                     $_SESSION['iusuario'] = $fila['id_usuario'];
                     $_SESSION['nomusuario'] = $fila['nombre'];
                     $_SESSION['irol']= $fila['rol'];                                      
                     return TRUE;
                }
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            
        }
        
        public function rst_pass($_correo,$_tipo)
        {
            
            try {
                
                $sql = "SELECT * from usuarios WHERE US_EMAIL = :us_mail AND US_TIPO = :us_tipo";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(":us_mail",$_correo);
                $query->bindParam(":us_tipo",$_tipo);
                $query->execute();
                $this->dbh = null;
                
                //si existe el usuario
                if($query->rowCount() == 1)
                {
                     $fila  = $query->fetch();
                                                 
                     return TRUE;
                }
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            
        }
 
        // Evita que el objeto se pueda clonar
        public function __clone()
        {
     
            trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
     
        }
 
    }
?>