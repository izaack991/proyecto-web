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

        public function guardar_experiencia_laboral($f_idexperiencia,$_idusuario,$_descripcion,$_empresa,$_fechaInicio,$_fechaFin)
        {        
            try {
                
                $sql="insert into tbl_experiencia_laboral values(:id_experiencia,:id_usuario,:descripcion_puesto,:empresa,:fechaInicio,:fechaFin)";
                
                $query = $this->dbh->prepare($sql);
                
                $query->bindParam(':id_experiencia',$f_idexperiencia);
                $query->bindParam(':id_usuario',$_idusuario);
                $query->bindParam(':descripcion_puesto',$_descripcion);
                $query->bindParam(':empresa',$_empresa);
                $query->bindParam(':fechaInicio',$_fechaInicio);
                $query->bindParam(':fechaFin',$_fechaFin);
                $query->execute();
                //$this->dbh = null;
                    
              
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            return TRUE;
        }

        public function guardar_usuario($_id_usuario, $_nombre, $_apellido, $_correo, $_fecha_nac, $_no_identificacion, $_password, $_sexo, $_region, $_telefono, $_domicilio, $_irol, $_status, $ruta_img, $_cons, $_razon, $_token, $_universidad, $_carrera, $_ingreso)
        {        
            try {
               
                $sql="insert into tbl_usuario(id_usuario, rol, status, nombre, apellido, correo, fecha_nac, no_identificacion, password, sexo, region, telefono, domicilio, ruta_imagen, ruta_constancia, razon_social, token, universidad, carrera, ingreso)
                                    values(:id_usuario, :rol, :status, :nombre, :apellido, :correo, :fecha_nac, :no_identificacion, :password, :sexo, :region, :telefono, :domicilio, :ruta_imagen, :ruta_constancia, :razon_social, :token, :universidad, :carrera, :ingreso)";
                    
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
                $query->bindParam(':rol',$_irol);
                $query->bindParam(':status',$_status);
                $query->bindParam(':ruta_imagen',$ruta_img);
                $query->bindParam(':ruta_constancia',$_cons);
                $query->bindParam(':razon_social',$_razon);
                $query->bindParam(':token',$_token);
                $query->bindParam(':universidad',$_universidad);
                $query->bindParam(':carrera',$_carrera);
                $query->bindParam(':ingreso',$_ingreso);
                $query->execute();
                $this->dbh = null;
            }
            catch(PDOException $e){
                   
                print "Error!: " . $e->getMessage();
            }        
            return TRUE;
        } 

        public function guardar_formacion($_idusuario,$id_formacion,$descripcion,$ubicacion,$_fechaInicio,$_fechaFin)
        {        
            try {
                
                $sql="INSERT into tbl_formacion_academica(id_formacion,id_usuario,descripcion,ubicacion,fechaInicio,fechaFin)
                                    values(:id_formacion,:id_usuario,:descripcion,:ubicacion,:fechaInicio,:fechaFin)";
                
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':id_formacion',$id_formacion);
                $query->bindParam(':id_usuario',$_idusuario,);
                $query->bindParam(':descripcion',$descripcion,);
                $query->bindParam(':ubicacion',$ubicacion);
                $query->bindParam(':fechaInicio',$_fechaInicio);
                $query->bindParam(':fechaFin',$_fechaFin);
                $query->execute();
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            return TRUE;
        }

        public function guardar_interes($id_di, $_idusuario, $didesc )
            {        
                try 
                {
                    
                    $sql="INSERT INTO tbl_dinteres(id_di, id_usuario, descripcion)
                                        VALUES(:id_di, :id_usuario, :descripcion)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':id_di',$id_di);
                    $query->bindParam(':id_usuario',$_idusuario);
                    $query->bindParam(':descripcion',$didesc);
                    $query->execute();
                        
                   
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
        public function guardar_vid_curriculum($id_vid_curriculum,$iusuario,$ruta_video)
            {        
                try 
                {
                    
                    $sql="INSERT INTO tbl_vid_curriculum(id_vid_curriculum, id_usuario, ruta_video) VALUES(:id_vid_curriculum, :id_usuario, :ruta_video)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':id_vid_curriculum',$id_vid_curriculum);
                    $query->bindParam(':id_usuario',$iusuario);
                    $query->bindParam(':ruta_video',$ruta_video);
                    $query->execute();
                        
                   
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }

            public function Guardar_id_pasatiempo($f_id_Pasatiempo,$_idusuario,$_descripcion)
            {        
                try {
                    
                    $sql="INSERT into tbl_aop(id_aop,id_usuario,descripcion)
                                        values(:id_aop,:id_usuario,:descripcion)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':id_aop',$f_id_Pasatiempo);
                    $query->bindParam(':id_usuario',$_idusuario);
                    $query->bindParam(':descripcion',$_descripcion);
                    $query->execute();
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage(); 
                    
                }        
                return TRUE;
            }
            public function Guardar_id_vacantes($f_id_vacantes,$_idusuario,$_puesto,$_empresa,$_sueldo,$_lugar,$_datos,$_fechainicio,$_fechafin,$_region,$_ciudad)
            {        
                try {
                    
                    $sql="INSERT into tbl_vacantes(id_vacante,id_empresa,puesto,empresa,sueldo,lugar,datos_adicionales,dateInicio,dateFin,region,ciudad)
                                        values(:id_vacante, :id_empresa, :puesto, :empresa, :sueldo, :lugar, :datos_adicionales, :dateInicio, :dateFin, :region, :ciudad)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':id_vacante',$f_id_vacantes);
                    $query->bindParam(':id_empresa',$_idusuario);
                    $query->bindParam(':puesto',$_puesto);
                    $query->bindParam(':empresa',$_empresa);
                    $query->bindParam(':sueldo',$_sueldo);
                    $query->bindParam(':lugar',$_lugar);
                    $query->bindParam(':datos_adicionales',$_datos);
                    $query->bindParam(':dateInicio', $_fechainicio);
                    $query->bindParam(':dateFin',$_fechafin);
                    $query->bindParam(':region',$_region);
                    $query->bindParam(':ciudad',$_ciudad);
                    $query->execute();
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage(); 
                    
                }        
                return TRUE;
            }

        public function guardar_log_usuario($_idusuario,$_ubicacion,$_movimiento,$_fecha,$_hora)
            {        
                try 
                {
                    
                    $sql="INSERT INTO tbl_log_usuario(id_usuario,ubicacion,movimiento,fecha_mou,tiempo_sesion)
                                        VALUES(:id_usuario,:ubicacion,:movimiento,:fecha_mou,:tiempo_sesion)";
                    
                    $query = $this->dbh->prepare($sql);
                    
                    $query->bindParam(':id_usuario',$_idusuario);
                    $query->bindParam(':ubicacion',$_ubicacion);
                    $query->bindParam(':movimiento',$_movimiento);
                    $query->bindParam(':fecha_mou',$_fecha);
                    $query->bindParam(':tiempo_sesion',$_hora);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }

            public function guardar_postulacion($id_usuario,$id_vacante,$id_postulacion)
            {       $bguardar = false; 
                    try 
                    {
                        
                        $sql="INSERT INTO tbl_postulacion VALUES(:id_postulacion,:id_usuario,:id_vacante,1)";
                        
                        $query = $this->dbh->prepare($sql);
                        
                        $query->bindParam(':id_postulacion',$id_postulacion);
                        $query->bindParam(':id_usuario',$id_usuario);
                        $query->bindParam(':id_vacante',$id_vacante);
                        $query->execute();
                        $this->dbh = null;
                        $bguardar = true;    
                    
                    }
                    catch(PDOException $e){
                        
                        print "Error!: " . $e->getMessage();
                        $bguardar = false;
                    }        
                    return $bguardar;
                }

            public function guardar_respuestasMOSS($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12,$preg13,$preg14,$preg15,$preg16,$preg17,$preg18,$preg19,$preg20,$preg21,$preg22,$preg23,$preg24,$preg25,$preg26,$preg27,$preg28,$preg29,$preg30)
            {        
                    try 
                    {
                        
                        $sql="INSERT INTO tbl_respuestas_MOSS(preg1,preg2,preg3,preg4,preg5,preg6,preg7,preg8,preg9,preg10,preg11,preg12,preg13,preg14,preg15,preg16,preg17,preg18,preg19,preg20,preg21,preg22,preg23,preg24,preg25,preg26,preg27,preg28,preg29,preg30,id_usuario)
                                                                VALUES(:preg1,:preg2,:preg3,:preg4,:preg5,:preg6,:preg7,:preg8,:preg9,:preg10,:preg11,:preg12,:preg13,:preg14,:preg15,:preg16,:preg17,:preg18,:preg19,:preg20,:preg21,:preg22,:preg23,:preg24,:preg25,:preg26,:preg27,:preg28,:preg29,:preg30,:id_usuario)";
                        
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
                        $query->bindParam(':id_usuario',$_idusuario);
                        $query->execute();
                        $this->dbh = null;
                            
                    
                    }
                    catch(PDOException $e){
                        
                        print "Error!: " . $e->getMessage();
                        
                    }        
                    return TRUE;
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

            public function guardar_respuestasSJT($_idusuario,$preg1,$preg2,$preg3,$preg4,$preg5,$preg6,$preg7,$preg8,$preg9,$preg10,$preg11,$preg12)
            {        
                    try 
                    {
                        
                        $sql="INSERT INTO tbl_respuestas_sjt(preg1,preg2,preg3,preg4,preg5,preg6,preg7,preg8,preg9,preg10,preg11,preg12,id_usuario)
                                                                VALUES(:preg1,:preg2,:preg3,:preg4,:preg5,:preg6,:preg7,:preg8,:preg9,:preg10,:preg11,:preg12,:id_usuario)";
                        
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
                        $query->bindParam(':id_usuario',$_idusuario);
                        $query->execute();
                        $this->dbh = null;
                            
                    
                    }
                    catch(PDOException $e){
                        
                        print "Error!: " . $e->getMessage();
                        
                    }        
                    return TRUE;
            }
            public function guardar_respuestas($id_usuario,$p1_resp_pos,$p1_resp_neg,$p2_resp_pos,$p2_resp_neg,$p3_resp_pos,
            $p3_resp_neg,$p4_resp_pos,$p4_resp_neg,$p5_resp_pos,$p5_resp_neg,$p6_resp_pos,$p6_resp_neg,$p7_resp_pos,$p7_resp_neg,$p8_resp_pos,
            $p8_resp_neg,$p9_resp_pos,$p9_resp_neg,$p10_resp_pos,$p10_resp_neg,$p11_resp_pos,$p11_resp_neg,$p12_resp_pos,$p12_resp_neg,
            $p13_resp_pos,$p13_resp_neg,$p14_resp_pos,$p14_resp_neg,$p15_resp_pos,$p15_resp_neg,$p16_resp_pos,$p16_resp_neg,$p17_resp_pos,
            $p17_resp_neg,$p18_resp_pos,$p18_resp_neg,$p19_resp_pos,$p19_resp_neg,$p20_resp_pos,$p20_resp_neg,$p21_resp_pos,$p21_resp_neg,
            $p22_resp_pos,$p22_resp_neg,$p23_resp_pos,$p23_resp_neg,$p24_resp_pos,$p24_resp_neg,$p25_resp_pos,$p25_resp_neg)
            {        
                try 
                {
                    
                    $sql="INSERT into tbl_respuestas_cleaver(id_usuario,p1_resp_pos,p1_resp_neg,p2_resp_pos,p2_resp_neg,p3_resp_pos,p3_resp_neg,p4_resp_pos,p4_resp_neg,p5_resp_pos,p5_resp_neg,p6_resp_pos,p6_resp_neg,p7_resp_pos,p7_resp_neg,p8_resp_pos,p8_resp_neg,p9_resp_pos,p9_resp_neg,p10_resp_pos,p10_resp_neg,
                    p11_resp_pos,p11_resp_neg,p12_resp_pos,p12_resp_neg,p13_resp_pos,p13_resp_neg,p14_resp_pos,p14_resp_neg,p15_resp_pos,p15_resp_neg,p16_resp_pos,p16_resp_neg,p17_resp_pos,p17_resp_neg,p18_resp_pos,p18_resp_neg,p19_resp_pos,p19_resp_neg,p20_resp_pos,p20_resp_neg,
                    p21_resp_pos,p21_resp_neg,p22_resp_pos,p22_resp_neg,p23_resp_pos,p23_resp_neg,p24_resp_pos,p24_resp_neg,p25_resp_pos,p25_resp_neg)
                                        values(:id_usuario,:p1_resp_pos,:p1_resp_neg,:p2_resp_pos,:p2_resp_neg,:p3_resp_pos,:p3_resp_neg,:p4_resp_pos,:p4_resp_neg,:p5_resp_pos,:p5_resp_neg,:p6_resp_pos,:p6_resp_neg,:p7_resp_pos,:p7_resp_neg,:p8_resp_pos,:p8_resp_neg,:p9_resp_pos,:p9_resp_neg,:p10_resp_pos,:p10_resp_neg,
                                        :p11_resp_pos,:p11_resp_neg,:p12_resp_pos,:p12_resp_neg,:p13_resp_pos,:p13_resp_neg,:p14_resp_pos,:p14_resp_neg,:p15_resp_pos,:p15_resp_neg,:p16_resp_pos,:p16_resp_neg,:p17_resp_pos,:p17_resp_neg,:p18_resp_pos,:p18_resp_neg,:p19_resp_pos,:p19_resp_neg,:p20_resp_pos,:p20_resp_neg,
                                        :p21_resp_pos,:p21_resp_neg,:p22_resp_pos,:p22_resp_neg,:p23_resp_pos,:p23_resp_neg,:p24_resp_pos,:p24_resp_neg,:p25_resp_pos,:p25_resp_neg)";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    
                    $query->bindParam(':p1_resp_pos',$p1_resp_pos);

                    $query->bindParam(':p1_resp_neg',$p1_resp_neg);

                    $query->bindParam(':p2_resp_pos',$p2_resp_pos);

                    $query->bindParam(':p2_resp_neg',$p2_resp_neg);

                    $query->bindParam(':p3_resp_pos',$p3_resp_pos);

                    $query->bindParam(':p3_resp_neg',$p3_resp_neg);

                    $query->bindParam(':p4_resp_pos',$p4_resp_pos);

                    $query->bindParam(':p4_resp_neg',$p4_resp_neg);

                    $query->bindParam(':p5_resp_pos',$p5_resp_pos);

                    $query->bindParam(':p5_resp_neg',$p5_resp_neg);

                    $query->bindParam(':p6_resp_pos',$p6_resp_pos);

                    $query->bindParam(':p6_resp_neg',$p6_resp_neg);

                    $query->bindParam(':p7_resp_pos',$p7_resp_pos);

                    $query->bindParam(':p7_resp_neg',$p7_resp_neg);

                    $query->bindParam(':p8_resp_pos',$p8_resp_pos);

                    $query->bindParam(':p8_resp_neg',$p8_resp_neg);

                    $query->bindParam(':p9_resp_pos',$p9_resp_pos);

                    $query->bindParam(':p9_resp_neg',$p9_resp_neg);

                    $query->bindParam(':p10_resp_pos',$p10_resp_pos);

                    $query->bindParam(':p10_resp_neg',$p10_resp_neg);

                    $query->bindParam(':p11_resp_pos',$p11_resp_pos);

                    $query->bindParam(':p11_resp_neg',$p11_resp_neg);

                    $query->bindParam(':p12_resp_pos',$p12_resp_pos);

                    $query->bindParam(':p12_resp_neg',$p12_resp_neg);

                    $query->bindParam(':p13_resp_pos',$p13_resp_pos);

                    $query->bindParam(':p13_resp_neg',$p13_resp_neg);

                    $query->bindParam(':p14_resp_pos',$p14_resp_pos);

                    $query->bindParam(':p14_resp_neg',$p14_resp_neg);

                    $query->bindParam(':p15_resp_pos',$p15_resp_pos);

                    $query->bindParam(':p15_resp_neg',$p15_resp_neg);

                    $query->bindParam(':p16_resp_pos',$p16_resp_pos);

                    $query->bindParam(':p16_resp_neg',$p16_resp_neg);

                    $query->bindParam(':p17_resp_pos',$p17_resp_pos);

                    $query->bindParam(':p17_resp_neg',$p17_resp_neg);

                    $query->bindParam(':p18_resp_pos',$p18_resp_pos);

                    $query->bindParam(':p18_resp_neg',$p18_resp_neg);

                    $query->bindParam(':p19_resp_pos',$p19_resp_pos);

                    $query->bindParam(':p19_resp_neg',$p19_resp_neg);

                    $query->bindParam(':p20_resp_pos',$p20_resp_pos);

                    $query->bindParam(':p20_resp_neg',$p20_resp_neg);

                    $query->bindParam(':p21_resp_pos',$p21_resp_pos);

                    $query->bindParam(':p21_resp_neg',$p21_resp_neg);

                    $query->bindParam(':p22_resp_pos',$p22_resp_pos);

                    $query->bindParam(':p22_resp_neg',$p22_resp_neg);

                    $query->bindParam(':p23_resp_pos',$p23_resp_pos);

                    $query->bindParam(':p23_resp_neg',$p23_resp_neg);

                    $query->bindParam(':p24_resp_pos',$p24_resp_pos);

                    $query->bindParam(':p24_resp_neg',$p24_resp_neg);

                    $query->bindParam(':p25_resp_pos',$p25_resp_pos);

                    $query->bindParam(':p25_resp_neg',$p25_resp_neg);

                    $query->execute();
                }
                catch(PDOException $e)
                {
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function guardar_merril($id,$_idusuario, $serie_1,  $serie_2, $serie_3, $serie_4, $serie_5, $serie_6, $serie_7, $serie_8)
            {        
                try {
                    
                    $sql="insert into tbl_terman_merril values(:id,:id_u,:serie_1,:serie_2,:serie_3,:serie_4,:serie_5,:serie_6,:serie_7,:serie_8)";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id',$id);
                    $query->bindParam(':id_u',$_idusuario);
                    $query->bindParam(':serie_1',$serie_1);
                    $query->bindParam(':serie_2',$serie_2);
                    $query->bindParam(':serie_3',$serie_3);
                    $query->bindParam(':serie_4',$serie_4);
                    $query->bindParam(':serie_5',$serie_5);
                    $query->bindParam(':serie_6',$serie_6);
                    $query->bindParam(':serie_7',$serie_7);
                    $query->bindParam(':serie_8',$serie_8);
                    $query->execute();
                    $this->dbh = null;
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
                
            }

            public function guardar_correo($id_usuario,$id_empresa,$test_cleaver,$test_moss,$test_sjt,$test_merril,$test_reaven)
            {        
                try {
                    
                    $sql="insert into tbl_envio_test values(:id_usuario,:id_empresa,:test_cleaver,:test_moss,:test_sjt,:test_merril,:test_reaven,:1)";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->bindParam(':id_empresa',$id_empresa);
                    $query->bindParam(':test_cleaver',$test_cleaver);
                    $query->bindParam(':test_moss',$test_moss);
                    $query->bindParam(':test_sjt',$test_sjt);
                    $query->bindParam(':test_merril',$test_merril);
                    $query->bindParam(':test_reaven',$test_reaven);
                    //$query->bindParam(':estatus',$estatus);
                    $query->execute();
                    $this->dbh = null;
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
                
            }

            public function actualizar_status($index)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_postulacion SET status=0 WHERE id_postulacion =$index";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function activar_empresa($token)
            {        
                $bguardar = false;
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET status=1 WHERE token =$token";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                    $bguardar = true;    
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    $bguardarq = false;
                }        
                return $bguardar;
            }
            public function actualizar_experiencia($idexp,$descripcion,$empresa,$fechaInicio,$fechafin)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_experiencia_laboral SET descripcion_puesto='$descripcion',empresa='$empresa',fechaInicio='$fechaInicio', fechaFin='$fechafin' WHERE id_experiencia=$idexp";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_vacante($vacanteID,$puesto,$sueldo,$lugar,$region,$ciudad,$datos,$fechainicio,$fechafin)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_vacantes SET puesto='$puesto',sueldo='$sueldo',lugar='$lugar',region='$region',ciudad='$ciudad',datos_adicionales='$datos',dateInicio='$fechainicio',dateFin='$fechafin' WHERE id_vacante=$vacanteID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function eliminar_experiencia($idexp)
            {        
                try 
                {
                    
                    $sql="DELETE FROM tbl_experiencia_laboral WHERE id_experiencia=$idexp";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function eliminar_formacion($idfor)
            {        
                try 
                {
                    
                    $sql="DELETE FROM tbl_formacion_academica WHERE id_formacion=$idfor";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function eliminar_aficion($idafi)
            {        
                try 
                {
                    
                    $sql="DELETE FROM tbl_aop WHERE id_aop=$idafi";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function eliminar_interes($idint)
            {        
                try 
                {
                    
                    $sql="DELETE FROM tbl_dinteres WHERE id_di=$idint";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function eliminar_postulacion($idpos)
            {        
                try 
                {
                    
                    $sql="DELETE FROM tbl_postulacion WHERE id_postulacion=$idpos";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function eliminar_video_curriculum($idvid)
            {        
                try 
                {
                    
                    $sql="DELETE FROM tbl_vid_curriculum WHERE id_vid_curriculum=$idvid";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_formacion($idfor,$descripcion,$ubicacion,$fechaInicio,$fechafin)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_formacion_academica SET descripcion='$descripcion',ubicacion='$ubicacion',fechaInicio='$fechaInicio',fechafin='$fechafin' WHERE id_formacion=$idfor";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_aficion($idafi,$descripcion)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_aop SET descripcion='$descripcion' WHERE id_aop=$idafi";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_interes($idint,$descripcion)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_dinteres SET descripcion='$descripcion' WHERE id_di=$idint";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_nombreUsuario($usuarioID,$nombre,$apellido)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET nombre='$nombre', apellido='$apellido' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_razon_social($usuarioID,$razon_social)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET razon_social='$razon_social' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_correoUsuario($usuarioID,$correo)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET correo='$correo' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_telefonoUsuario($usuarioID,$telefono)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET telefono='$telefono' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_regionUsuario($usuarioID,$region)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET region='$region' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_domicilioUsuario($usuarioID,$domicilio)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET domicilio='$domicilio' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_ruta_imagenUsuario($usuarioID,$ruta_imagen)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET ruta_imagen='$ruta_imagen' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_ruta_constanciaEmpresa($usuarioID,$ruta_constancia)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET ruta_constancia='$ruta_constancia' WHERE id_usuario=$usuarioID";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function actualizar_status_empresa($index)
            {        
                try 
                {
                    
                    $sql="UPDATE tbl_usuario SET status=1 WHERE id_usuario =$index";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $this->dbh = null;
                        
                
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            
            public function insertar_conversacion($id_empresa, $id_usuario)
            {
                try {
                    $sql = "INSERT INTO tbl_conversaciones (id_empresa, id_usuario) VALUES (:id_empresa, :id_usuario)";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_empresa', $id_empresa);
                    $query->bindParam(':id_usuario', $id_usuario);
                    $query->execute();
                } catch(PDOException $e) {
                    print "Error!: " . $e->getMessage();
                    return FALSE; // Retorna FALSE si ocurre un error
                }        
                return TRUE; // Retorna TRUE si la inserción es exitosa
            }

            public function insertar_mensaje($id_conversacion ,$mensaje, $id_usuario)
            {
                try {
                    $sql = "INSERT INTO tbl_mensajes (id_conversacion, mensaje, id_usuario) VALUES (:id_conversacion, :mensaje, :id_usuario)";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':mensaje', $mensaje);
                    $query->bindParam(':id_usuario', $id_usuario);
                    $query->bindParam(':id_conversacion', $id_conversacion);
                    $query->execute();
                } catch(PDOException $e) {
                    print "Error!: " . $e->getMessage();
                    return FALSE; // Retorna FALSE si ocurre un error
                }        
                return TRUE; // Retorna TRUE si la inserción es exitosa
            }
    }
?>