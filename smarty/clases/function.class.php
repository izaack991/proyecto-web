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
            function _vacantes()
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
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,2) = 0 and datediff(datefin,dateInicio) <3 group by id_vacante";
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
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,2) = 1 and datediff(datefin,dateInicio) <3 group by id_vacante ";
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
            function buscarPostulacion($_idusuario)
            {
                try
                {
                    $sql = "SELECT tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario, tbl_usuario.correo, tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE tbl_postulacion.id_vacante=$_idusuario;";
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
                    $data;
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
                    $data;
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
                    $data;
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
                    $data;
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
            public function verif_aficion($_idusuario,$_descripcion)
            {        
            try {
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

        public function guardar_respuestasRAVEN($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12,$preg13,$preg14,$preg15,$preg16,$preg17,$preg18,$preg19,$preg20,$preg21,$preg22,$preg23,$preg24,$preg25,$preg26,$preg27,$preg28,$preg29,$preg30,$preg31,$preg32,$preg33,$preg34,$preg35,$preg36,$preg37,$preg38,$preg39,$preg40,$preg41,$preg42,$preg43,$preg44,$preg45,$preg46,$preg47,$preg48,$preg49,$preg50,$preg51,$preg52,$preg53,$preg54,$preg55,$preg56,$preg57,$preg58,$preg59,$preg60)
        {        
                try 
                {
                    
                    $sql="INSERT INTO tbl_respuestas_MOSS(preg1,preg2,preg3,preg4,preg5,preg6,preg7,preg8,preg9,preg10,preg11,preg12,preg13,preg14,preg15,preg16,preg17,preg18,preg19,preg20,preg21,preg22,preg23,preg24,preg25,preg26,preg27,preg28,preg29,preg30,preg31,preg32,preg33,preg34,preg35,preg36,preg37,preg38,preg39,preg40,preg41,preg42,preg43,preg44,preg45,preg46,preg47,preg48,preg49,preg50,preg51,preg52,preg53,preg54,preg55,preg56,preg57,preg58,preg59,preg60,id_usuario)
                                                            VALUES(:preg1,:preg2,:preg3,:preg4,:preg5,:preg6,:preg7,:preg8,:preg9,:preg10,:preg11,:preg12,:preg13,:preg14,:preg15,:preg16,:preg17,:preg18,:preg19,:preg20,:preg21,:preg22,:preg23,:preg24,:preg25,:preg26,:preg27,:preg28,:preg29,:preg30,preg31,:preg32,:preg33,:preg34,:preg35,:preg36,:preg37,:preg38,:preg39,:preg40,:preg41,:preg42,:preg43,:preg44,:preg45,:preg46,:preg47,:preg48,:preg49,:preg50,:preg51,:preg52,:preg53,:preg54,:preg55,:preg56,:preg57,:preg58,:preg59,:preg60,:id_usuario)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    
                    $query->bindParam(':preg1',$preg1);
                    $query->bindParam(':preg2',$preg2);
                    $query->bindParam(':preg3',$preg3);
                    $query->bindParam(':preg4',$preg4);
                    $query->bindParam(':preg5',$preg5);
                    $query->bindParam(':preg6',$preg6);
                    $query->bindParam(':preg7',$preg7);
                    $query->bindParam(':preg8',$preg8);
                    $query->bindParam(':preg9',$preg9);
                    $query->bindParam(':preg10',$preg10);
                    $query->bindParam(':preg11',$preg11);
                    $query->bindParam(':preg12',$preg12);
                    $query->bindParam(':preg13',$preg13);
                    $query->bindParam(':preg14',$preg14);
                    $query->bindParam(':preg15',$preg15);
                    $query->bindParam(':preg16',$preg16);
                    $query->bindParam(':preg17',$preg17);
                    $query->bindParam(':preg18',$preg18);
                    $query->bindParam(':preg19',$preg19);
                    $query->bindParam(':preg20',$preg20);
                    $query->bindParam(':preg21',$preg21);
                    $query->bindParam(':preg22',$preg22);
                    $query->bindParam(':preg23',$preg23);
                    $query->bindParam(':preg24',$preg24);
                    $query->bindParam(':preg25',$preg25);
                    $query->bindParam(':preg26',$preg26);
                    $query->bindParam(':preg27',$preg27);
                    $query->bindParam(':preg28',$preg28);
                    $query->bindParam(':preg29',$preg29);
                    $query->bindParam(':preg30',$preg30);
                    $query->bindParam(':preg31',$preg31);
                    $query->bindParam(':preg32',$preg32);
                    $query->bindParam(':preg33',$preg33);
                    $query->bindParam(':preg34',$preg34);
                    $query->bindParam(':preg35',$preg35);
                    $query->bindParam(':preg36',$preg36);
                    $query->bindParam(':preg37',$preg37);
                    $query->bindParam(':preg38',$preg38);
                    $query->bindParam(':preg39',$preg39);
                    $query->bindParam(':preg40',$preg40);
                    $query->bindParam(':preg41',$preg41);
                    $query->bindParam(':preg42',$preg42);
                    $query->bindParam(':preg43',$preg43);
                    $query->bindParam(':preg44',$preg44);
                    $query->bindParam(':preg45',$preg45);
                    $query->bindParam(':preg46',$preg46);
                    $query->bindParam(':preg47',$preg47);
                    $query->bindParam(':preg48',$preg48);
                    $query->bindParam(':preg49',$preg49);
                    $query->bindParam(':preg50',$preg50);
                    $query->bindParam(':preg51',$preg51);
                    $query->bindParam(':preg52',$preg52);
                    $query->bindParam(':preg53',$preg53);
                    $query->bindParam(':preg54',$preg54);
                    $query->bindParam(':preg55',$preg55);
                    $query->bindParam(':preg56',$preg56);
                    $query->bindParam(':preg57',$preg57);
                    $query->bindParam(':preg58',$preg58);
                    $query->bindParam(':preg59',$preg59);
                    $query->bindParam(':preg60',$preg60);
                    $query->bindParam(':id_usuario',$_idusuario);
                    $query->execute();
                    $this->dbh = null;

                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
        }
                        
}