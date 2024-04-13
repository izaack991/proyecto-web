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
      
        public function __clone()
        {
            trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
        }

 // Funcion para el login de usuario
        public function login($usuario, $password)
        {        
            try {
            $sql = "SELECT * FROM tbl_usuario where (password='$password' and correo='$usuario')";
            $query = $this->dbh->prepare($sql);
            $query->execute();
            $data = array();
            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }}catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
               
            }        
            return $data;
        }

// Funciones para los consecutivos
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
                
            catch(PDOException $e)
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
            public function consecutivo_vid_curriculum()
            {        
                try {
                    
                    $sql="SELECT IFNULL(MAX(id_vid_curriculum),0)+1 as consecutivo from tbl_vid_curriculum";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    if ($query->rowcount()==1)
                    {
                        $fila = $query -> fetch();
                        $id_vid_curriculum = $fila['consecutivo'];
                        return $id_vid_curriculum;
                        

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

            public function consec_merril()
            {
                try
                {
                    $sql = "SELECT IFNULL(MAX(id),0) + 1 AS CONSECUTIVO FROM tbl_terman_merril";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
        
                    if($query->rowCount() == 1)
                    {
                        $fila = $query->fetch();
                        $id_merril = $fila['CONSECUTIVO'];
                        return $id_merril;
                    }
                }
                    
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return TRUE;
                
            }
            
            

// Funcion para busquedas de campos
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

            function buscarimagenvacante()
            {
                try
                {

                   $sql = "SELECT v.puesto as puesto,v.id_vacante as idvacante, u.ruta_imagen as rutaimg FROM tbl_usuario as u INNER JOIN tbl_vacantes as v ON v.id_empresa=u.id_usuario ORDER BY v.id_vacante DESC LIMIT 5";
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


            function buscarVacante($_idusuario)
            {
                try
                {

<<<<<<< HEAD
                $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar = tbl_paises.region WHERE DATEDIFF( DATE(NOW()),dateInicio) <= 3 AND status = 1 GROUP BY id_vacante;";
=======
                $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais 
                FROM tbl_vacantes 
                INNER JOIN tbl_paises ON tbl_vacantes.lugar = tbl_paises.id_paises
                INNER JOIN tbl_postulacion on tbl_vacantes.id_vacante = tbl_postulacion.id_vacante
                WHERE DATEDIFF(datefin, dateInicio) >= 1 AND status = 1 AND tbl_postulacion.id_usuario != $_idusuario
                GROUP BY id_vacante";
>>>>>>> 836238c971a415b4686005d92cc75a54e8a1c36b
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

          /* function buscarVacante2()
            {
                try
                {
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,3) = 1 and datediff(datefin,dateInicio) <=3  AND status = 1
                    group by id_vacante";
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
            } */

          /*   function buscarVacante3()
             {
                try
                {
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,3) = 2 and datediff(datefin,dateInicio) <=3  AND status = 1
                    group by id_vacante";
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
            } */

            function buscarPostulacion($_idusuario)
            {
                try
                {
                    $sql = "SELECT COALESCE(tbl_vid_curriculum.id_vid_curriculum, '0') AS vid_status, tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario, tbl_usuario.correo, tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante LEFT JOIN tbl_vid_curriculum ON tbl_postulacion.id_usuario = tbl_vid_curriculum.id_usuario WHERE tbl_vacantes.id_empresa = $_idusuario AND tbl_postulacion.status = 1;";
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
            function buscarPostulacion2($iusuario)
            {
                try
                {
                    $sql = "SELECT tbl_postulacion.*, tbl_vacantes.* FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE  tbl_postulacion.id_usuario = $iusuario AND tbl_postulacion.status = 1;";
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
            function buscarEmpresa()
            {
                try
                {
                    $sql = "SELECT id_usuario,CONCAT(nombre,' ',apellido) AS nombreEmpresa, correo, telefono, razon_social FROM tbl_usuario WHERE status = 0 AND rol = 1;";
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

//Ajax
            function ajax_vacante()
            {
                try
                {

                $sql = "SELECT tbl_paises.nombre as pais, COUNT(tbl_vacantes.lugar) as vacantes  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE status = 1 group by tbl_paises.id_paises ORDER BY id_vacante DESC LIMIT 5";
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

//Funciones que sirve para seleccion de campos
            public function seleccionar_vacantes($id_vacante)
            {        
                try {
                    
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.region WHERE id_vacante = :id_vacante";
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
            public function seleccionar_vid_curriculum($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_vid_curriculum WHERE id_usuario=:id_usuario";
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
                    
                    $sql = "SELECT tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario,tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE id_postulacion=:id_postulacion LIMIT 5";
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

//Notificaciones
            function notificacionexperiencia($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_experiencia_laboral WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }
            function video_registrado($iusuario)
            {
                try
                {
                    $sql = "SELECT * FROM tbl_vid_curriculum where id_usuario ='$iusuario' ";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
        
                    if($query->rowCount() >= 1)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                    
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return TRUE;
                
            }

            function notificacionformacion($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_formacion_academica WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }
           
            function notificacionaficiones($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_aop WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }

            function notificacioninteres($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_dinteres WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }
            
            
            function notificacionpostulaciones($iusuario)
            {
                try
                {
                    $sql = "SELECT a.id_postulacion FROM tbl_postulacion AS a INNER JOIN tbl_vacantes AS b ON a.id_vacante = b.id_vacante WHERE b.id_empresa = :DU_ID AND a.status = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }
            function notificacionempresa()
            {
                try
                {
                    $sql = "SELECT id_usuario FROM tbl_usuario WHERE status = 0 AND rol = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }
            function total_usuarios()
            {
                try
                {
                    $sql = "SELECT id_usuario FROM `tbl_usuario` WHERE rol = 2;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }
            function total_empresas()
            {
                try
                {
                    $sql = "SELECT id_usuario FROM `tbl_usuario` WHERE rol = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }

            // function notificacionvacantes($iusuario)
            // {
            //     try
            //     {
                
            //         $sql = "SELECT id_usuario FROM tbl_vacantes WHERE id_usuario = :DU_ID LIMIT 1";
            //         $query = $this->dbh->prepare($sql);
            //         $query->bindParam(":DU_ID",$iusuario);
            //         $query->execute();
            //         //$this->dbh = null;
            //         $numeroDeFilas = $query->rowCount();
            //         //si existe el usuario
            //         $data;
            //         if($numeroDeFilas >= 1)
            //         {
            //             $data = 1;
            //         }
            //         else {
            //             $data = 0;
            //         } 
                    
            //     }
            //     catch(PDOException $e)
            //     {
                
            //         print "Error!: " . $e->getMessage();
                        
            //     }  
            //     return $data;
                
            // }

// verificaciones
        public function verif_aficion($_idusuario,$_descripcion)
        {        
            try 
            {
            $sql = "SELECT * FROM tbl_aop where (id_usuario = '$_idusuario' and descripcion = '$_descripcion')";
            $query = $this->dbh->prepare($sql);
            $query->execute();

            if($query -> rowCount() == 1)
                    {
                        return FALSE;
            } else {
                return TRUE;
            }
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            
        }

//Validaciones de los test
        public function val_merril($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_terman_merril where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_moss($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_moss where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_sjt($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_sjt where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_raven($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_raven where id_usuario = '$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_cleaver($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_cleaver where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

//Envio del test
        public function envio_test()
        {
            try
            {
                $sql = "SELECT * FROM tbl_envio_test";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;   
        }
        
// Comprobar tests
        public function comprobarRaven($_idusuario)
        {
            try
            {
                $sql = "SELECT test_raven FROM tbl_envio_test where id_usuario ='$_idusuario' and test_raven = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarMoss($_idusuario)
        {
            try
            {
                $sql = "SELECT test_moss FROM tbl_envio_test where id_usuario ='$_idusuario' and test_moss = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarMerril($_idusuario)
        {
            try
            {
                $sql = "SELECT test_merril FROM tbl_envio_test where id_usuario ='$_idusuario' and test_merril = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarSjt($_idusuario)
        {
            try
            {
                $sql = "SELECT test_sjt FROM tbl_envio_test where id_usuario ='$_idusuario' and test_sjt = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarCleaver($_idusuario)
        {
            try
            {
                $sql = "SELECT test_cleaver FROM tbl_envio_test where id_usuario ='$_idusuario' and test_cleaver = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function buscar_correo($_correo)
        {
            try
            {
                $sql = "SELECT correo FROM tbl_usuario where correo ='$_correo'";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

}