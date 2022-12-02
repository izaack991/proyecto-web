<?php
require_once('conexion.class.php');
    class Functions
    {
        private static $instancia;
        private $dbh;
        private function __construct()
        {
     
            $this->dbh = Conexion::singleton_conexion();
     
        }
     
        public static function singleton_functions()
        {
     
            if (!isset(self::$instancia)) {
     
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
     
            }
     
            return self::$instancia;
     
        }
        
        public function login($usuario, $password)
        {        
            try {
            $sql = "SELECT * FROM tbl_usuario where (password='$password' and correo='$usuario')";
            $query = $this->dbh->prepare($sql);
            $query->execute();

            $data = array();
            while ($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            return $data;
        }
        public function consec_experiencia()
        {
            try
            {
                $sql = "SELECT IFNULL(MAX(id_experiencia),0) + 1 AS CONSECUTIVO FROM tbl_experiencia_laboral";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() == 1)
                {
                    $fila = $query->fetch();
                    $f_idexperiencia = $fila['CONSECUTIVO'];
                    return $f_idexperiencia;
                }
            }
                
            catch(PDOExeption $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }
        function consec_usuario()
            {
                try
                {
                    $sql = "SELECT IFNULL(MAX(id_usuario), 0) + 1 AS CONSECUTIVO FROM tbl_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;

                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_id_usuario = $fila['CONSECUTIVO'];
                        return $f_id_usuario;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }
            function consec_vacantes()
            {
                try
                {
                    $sql = "SELECT IFNULL(MAX(id_vacante), 0) + 1 AS CONSECUTIVO FROM tbl_vacantes";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;

                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_id_usuario = $fila['CONSECUTIVO'];
                        return $f_id_usuario;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }
            public function __clone()
            {
                trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
            }
            function consec_formacion()
            {
                try
                {
                    $sql = "SELECT IFNULL(max(id_formacion),0) + 1 AS CONSECUTIVO FROM tbl_formacion_academica";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;
                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_IdCitaDet = $fila['CONSECUTIVO'];
                        return $f_IdCitaDet;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }
            public function consecutivo_interes()
            {        
                try {
                    
                    $sql="SELECT IFNULL(MAX(id_di),0)+1 as consecutivo from tbl_dinteres";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    if ($query->rowcount()==1)
                    {
                        $fila = $query -> fetch();
                        $id_di = $fila['consecutivo'];
                        return $id_di;
                        

                    }
                    $this->dbh = null;
                        
                   
                }
                catch(PDOException $e)
                {
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            function consec_pasatiempo()
            {
                try
                {
                    $sql = "SELECT IFNULL(max(id_aop),0) + 1 AS CONSECUTIVO FROM tbl_aop";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;
                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_Id_Pasatiempo = $fila['CONSECUTIVO'];
                        return $f_Id_Pasatiempo;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }

            
            function buscaPaises()
            {
                try
                {
                    $sql = "Select id_paises, nombre from tbl_paises";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            function buscarVacante2()
            {
                try
                {
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,2) = 0";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            function buscarVacante1()
            {
                try
                {
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,2) = 1 ";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            function buscarPostulacion()
            {
                try
                {
                    $sql = "SELECT tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario, tbl_usuario.correo, tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }

            function buscarNota()
            {
                try
                {
                    $sql = "SELECT * FROM tbl_noticia";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }

            public function seleccionar_vacantes($id_vacante)
            {        
                try {
                    
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE id_vacante = :id_vacante";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_vacante',$id_vacante);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_experiencia($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_experiencia_laboral WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_formacion($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_formacion_academica WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_aficiones($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_aop WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_interes($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_dinteres WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_postulacion($id_postulacion)
            {        
                try {
                    
                    $sql = "SELECT tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario,tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE id_postulacion=:id_postulacion";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_postulacion',$id_postulacion);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            function consec_postulacion()
            {
                try
                {
                    $sql = "SELECT IFNULL(max(id_postulacion),0) + 1 AS CONSECUTIVO FROM tbl_postulacion";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;
                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_Id_Pasatiempo = $fila['CONSECUTIVO'];
                        return $f_Id_Pasatiempo;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }
    }

