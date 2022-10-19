<?php
require_once('conexion.class.php');
    class Save
    {
        private static $instancia;
        private $dbh;
        private function __construct()
        {
     
            $this->dbh = Conexion::singleton_conexion();
     
        }
     
        public static function singleton_guardar()
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
        public function guardar_experiencia_laboral($f_idexperiencia,$_idusuario,$_descripcion,$_empresa,$_periodo)
        {        
            try {
                
                $sql="insert into tbl_experiencia_laboral(id_experiencia,id_usuario,descripcion_puesto,empresa,periodo)
                                    values(:id_experiencia,:id_usuario,:descripcion_puesto,:empresa,:periodo)";
                
                $query = $this->dbh->prepare($sql);
                
                $query->bindParam(':id_experiencia',$f_idexperiencia);
                $query->bindParam(':id_usuario',$_idusuario);
                $query->bindParam(':descripcion_puesto',$_descripcion);
                $query->bindParam(':empresa',$_empresa);
                $query->bindParam(':periodo',$_periodo);
                $query->execute();
                $this->dbh = null;
                    
              
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            return TRUE;
        }
        public function guardar_usuario($_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio)
        {        
            try {
               
                $sql="insert into tbl_usuario(id_usuario, nombre, apellido, correo, fecha_nac, no_identificacion, password, sexo, region, telefono, domicilio)
                                    values(:id_usuario, :nombre, :apellido, :correo, :fecha_nac, :no_identificacion, :password, :sexo, :region, :telefono, :domicilio)";
                    
                $query = $this->dbh->prepare($sql);
                    
                $query->bindParam(':id_usuario',$_id_usuario);
                $query->bindParam(':nombre',$_nombre);
                $query->bindParam(':apellido',$_apellido);
                $query->bindParam(':correo',$_correo);
                $query->bindParam(':fecha_nac',$_fecha_nac);
                $query->bindParam(':no_identificacion',$_no_identificacion);
                $query->bindParam(':password',$_password);
                $query->bindParam(':sexo',$_sexo);
                $query->bindParam(':region',$_region);
                $query->bindParam(':telefono',$_telefono);
                $query->bindParam(':domicilio',$_domicilio);
                $query->execute();
                $this->dbh = null;
            }
            catch(PDOException $e){
                   
                print "Error!: " . $e->getMessage();
            }        
            return TRUE;
        } 
        public function guardar_formacion($id_usuario,$id_formacion,$descripcion,$ubicacion,$periodo)
        {        
            try {
                
                $sql="INSERT into tbl_formacion_academica(id_formacion,id_usuario,descripcion,ubicacion,periodo)
                                    values(:id_formacion,:id_usuario,:descripcion,:ubicacion,:periodo)";
                
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':id_formacion',$id_formacion);
                $query->bindParam(':id_usuario',$id_usuario,);
                $query->bindParam(':descripcion',$descripcion,);
                $query->bindParam(':ubicacion',$ubicacion);
                $query->bindParam(':periodo',$periodo);
                $query->execute();
                $this->dbh = null;
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            return TRUE;
        }
        public function guardar_interes($id_di, $diusuario, $didesc )
            {        
                try 
                {
                    
                    $sql="insert into tbl_dinteres(id_di, id_usuario, descripcion)
                                        values(:id_di, :id_usuario, :descripcion)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':id_di',$id_di);
                    $query->bindParam(':id_usuario',$diusuario);
                    $query->bindParam(':descripcion',$didesc);
                    $query->execute();
                   // $this->dbh = null;
                        
                   
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }

            public function Guardar_id_pasatiempo($_id_Pasatiempo,$_id_usuario,$_Desripcion)
            {        
                try {
                    
                    $sql="INSERT into Aficiones(IdPasatiempo,IdUsusrio,Descripcion
                                        values(:IdPasatiempo,:IdUsusrio,:Descripcion";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':IdPasatiempo',$_id_Pasatiempo);
                    $query->bindParam(':IdUsusrio',$_id_usuario);
                    $query->bindParam(':Descripcion',$_Desripcion);
                    $query->execute();
                    $this->dbh = null;
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage(); 
                    
                }        
                return TRUE;
            }
    }
   
?>