<?php

require_once('DBC.php');
require_once('Common.php');
require_once('../php/lang/LangVars-es.php');
require_once('../php/AjaxTableEditor.php');

class CkEditor extends Common {

    protected $Editor;
    protected $instanceName = 'fichatecnica';

    protected function setHeaderFiles() {
        $this->headerFiles[] = '<script type="text/javascript" src="//cdn.jsdelivr.net/ckeditor/4.0.1/ckeditor.js"></script>';
        $this->headerFiles[] = '<script type="text/javascript" src="../js/calendario.js"></script>';
    }

    protected function displayHtml() {
        $html = '
			
			<br />
			
			<div class="mateAjaxLoaderDiv"><div id="ajaxLoader1"><img src="../images/ajax_loader.gif" alt="Loading..." /></div></div>
			
			<br /><br />
			
			<div id="' . $this->instanceName . 'information">
			</div>
			
			<div id="' . $this->instanceName . 'titleLayer" class="mateTitleDiv">
			</div>
			
			<div id="' . $this->instanceName . 'tableLayer" class="mateTableDiv">
			</div>
			
			<div id="' . $this->instanceName . 'recordLayer" class="mateRecordLayerDiv">
			</div>		
			
			<div id="' . $this->instanceName . 'searchButtonsLayer" class="mateSearchBtnsDiv">
			</div>';

        echo $html;

        // Set default session configuration variables here
        $defaultSessionData['orderByColumn'] = 'first_name';

        $defaultSessionData = base64_encode($this->Editor->jsonEncode($defaultSessionData));

        $javascript = '	
			<script type="text/javascript">
				var mateHashes = {};
				var mateForward = false;
				var ' . $this->instanceName . ' = new mate("' . $this->instanceName . '");
				' . $this->instanceName . '.setAjaxInfo({url: "' . $_SERVER['PHP_SELF'] . '", history: true});
				if(' . $this->instanceName . '.ajaxInfo.history == false) {
					' . $this->instanceName . '.toAjaxTableEditor("update_html","");
				} else if(window.location.hash.length == 0) {
					mateHashes.' . $this->instanceName . ' = {info: "", action: "update_html", sessionData: "' . $defaultSessionData . '"};
					mateForward = true;
				}
				if(mateForward) {
					var sessionCookieName = ' . $this->instanceName . '.getSessionCookieName();
					if($.cookie(sessionCookieName) != undefined) {
						window.location.href = window.location.href+"#"+$.cookie(sessionCookieName);
					} else {
						window.location.href = window.location.href+"#"+Base64.encode($.toJSON(mateHashes));
					}
				}
				
				function addCkEditor(id)
				{
					if(CKEDITOR.instances[id])
					{
					   CKEDITOR.remove(CKEDITOR.instances[id]);
					}
					CKEDITOR.replace(id);
				}
				
			</script>';
        echo $javascript;
    }

//	public function addCkEditor()
//	{
//		$this->Editor->addJavascript('addCkEditor("'.$this->instanceName.'notes");');
//	}

    protected function initiateEditor() {

        $tableColumns['id_servidor'] = array(
            'display_text' => 'Id',
            'perms' => ' XQS',
        );



        $tableColumns['host'] = array(
            'display_text' => 'Nombre del host',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['ip'] = array(
            'display_text' => 'Dirección IP',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['noserie'] = array(
            'display_text' => 'Número de serie',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['noinventario'] = array(
            'display_text' => 'No. Inventario',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['marca'] = array(
            'display_text' => 'Marca del servidor',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['modelo'] = array(
            'display_text' => 'Modelo del servidor',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['ubicacion'] = array(
            'display_text' => 'Descripción de la ubicación física',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['area'] = array(
            'display_text' => 'Área donde se encuentra físicamente el servidor',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['garantia'] = array(
            'display_text' => 'Vigencia de la garantía',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['proposito'] = array(
            'display_text' => 'Propósito',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['arquitectura'] = array(
            'display_text' => 'Arquitectura del procesador',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['num_procesadores'] = array(
            'display_text' => 'Numeros de procesadores instalados',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['cant_max_proce'] = array(
            'display_text' => 'Cantidad máxima de procesadores',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['tarjetas_cpu'] = array(
            'display_text' => 'Tarjetas de CPU y Memorias',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['cant_max_cpu'] = array(
            'display_text' => 'Cantidad máxima de tarjetas de CPU',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['tarjetas_red'] = array(
            'display_text' => 'Tarjetas de red y tipo',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['slot_exp_red'] = array(
            'display_text' => 'Slot de expansión permitidos en la tarjetas de Red',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['memia_actu'] = array(
            'display_text' => 'Memoria principal actual',
            'perms' => 'EVCTAXQSHO'
        );

//        $tableColumns['servidorcol'] = array(
//            'display_text' => 'Servidorcol',
//            'perms' => 'EVCTAXQSHO'
//        );

        $tableColumns['max_memoria'] = array(
            'display_text' => 'Máximo de memoria permitida',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['slot_discos_int'] = array(
            'display_text' => 'Slots para discos internos y Tipos',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['discos_insta'] = array(
            'display_text' => 'Discos instalados',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['capacidades_disc'] = array(
            'display_text' => 'Capacidades de discos instalados',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['configuracion'] = array(
            'display_text' => 'Configuracion',
            'perms' => 'EVCTAXQSHO'
        );
        $tableColumns['particiones'] = array(
            'display_text' => 'Particiones',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['medios_secud'] = array(
            'display_text' => 'Medios secudarios',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['dispo_extr'] = array(
            'display_text' => 'Descripción de Dispositivos externos',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['conex_config'] = array(
            'display_text' => 'Conexión y configuración de Dispositivos externos',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['sistema_opera'] = array(
            'display_text' => 'Sistema operativo',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['version_sistem'] = array(
            'display_text' => 'Versión del sistema operativo',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['actualiza_sistem'] = array(
            'display_text' => 'Actualizaciones del sistema operativo',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['administra_sistem'] = array(
            'display_text' => 'Nombre de usuario del administrador del sistema operativo',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['password_sistem'] = array(
            'display_text' => 'Contraseña del administrador del sistema operativo',
            'perms' => 'EVCTAXQSHO'
        );

        $tableColumns['acpower'] = array(
            'display_text' => 'Característica eléctrica de la corriente alterna en su configuración máxima',
            'perms' => 'EVCTAXQSHO'
        );




        $tableColumns['temperatura'] = array(
            'display_text' => 'Característica Ambiental de temperatura en su configuración máxima',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['disipacion'] = array(
            'display_text' => 'Característica ambiental de la Disipación térmica BTU/Hora',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['altura'] = array(
            'display_text' => 'Altura en dimensiones del servidor',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['ancho'] = array(
            'display_text' => 'Ancho en dimensiones del servidor',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['profundidad'] = array(
            'display_text' => 'Profundidad en dimensiones del servidor',
            'perms' => 'EVCTAXQSHO'
        );



        $tableColumns['peso'] = array(
            'display_text' => 'Peso del servidor',
            'perms' => 'EVCTAXQSHO'
        );


        $tableColumns['observaciones'] = array(
            'display_text' => 'Observaciones de la tabla servidores',
            'perms' => 'EVCTAXQSHO'
        );
        
        $tableColumns['servicio_red_id_servicio_red'] = array(
            'display_text' => 'Servicio de Red',
            'perms' => 'EVCTAXQSHO',
            'join' => array(
                'table' => 'servicio_red',
                'column' => 'id_servicio_red',
                'display_mask' => "servicio_red.host_name",
                'type' => 'left'
            )
        );

//        $tableColumns['software_id_software'] = array(
//            'display_text' => ' Software id del software',
//            'perms' => 'EVCTAXQSHO',
//            'join' => array(
//                'table' => 'software',
//                'column' => 'id_software',
//                'display_mask' => "software.nombre",
//                'type' => 'left'
//            )
//        );






        $tableName = 'servidor';
        $primaryCol = 'id_servidor';
        $errorFun = array(&$this, 'logError');
        $permissions = 'EAVDQCSXHOI';

        $this->Editor = new AjaxTableEditor($tableName, $primaryCol, $errorFun, $permissions, $tableColumns);
        $this->Editor->setConfig('tableInfo', 'cellpadding="1" cellspacing="1" align="center" width="1100" class="mateTable"');
        $this->Editor->setConfig('orderByColumn', 'first_name');
        $this->Editor->setConfig('tableTitle', 'Servidores');
        $this->Editor->setConfig('addRowTitle', 'Agregando Registro de Servidor');
        $this->Editor->setConfig('editRowTitle', 'Editando Registro de Servidor');
//		$this->Editor->setConfig('addScreenFun',array(&$this,'addCkEditor'));
//		$this->Editor->setConfig('editScreenFun',array(&$this,'addCkEditor'));
        $this->Editor->setConfig('instanceName', $this->instanceName);
        $this->Editor->setConfig('persistentAddForm', false);
        $this->Editor->setConfig('paginationLinks', true);
    }

    function __construct() {
        session_start();
        ob_start();
        $this->initiateEditor();
        if (isset($_POST['json'])) {
            if (ini_get('magic_quotes_gpc')) {
                $_POST['json'] = stripslashes($_POST['json']);
            }
            $this->Editor->data = $this->Editor->jsonDecode($_POST['json'], true);
            $this->Editor->setDefaults();
            $this->Editor->main();
        } else if (isset($_GET['mate_export'])) {
            $this->Editor->data['sessionData'] = $_GET['session_data'];
            $this->Editor->setDefaults();
            ob_end_clean();
            header('Cache-Control: no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('Content-type: application/x-msexcel');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $this->Editor->tableName . '.csv"');
            // Add utf-8 signature for windows/excel
            echo chr(0xEF) . chr(0xBB) . chr(0xBF);
            echo $this->Editor->exportInfo();
            exit();
        } else {
            $this->setHeaderFiles();
            $this->displayHeaderHtml();
            $this->displayHtml();
            $this->displayFooterHtml();
        }
    }

}

$page = new CkEditor();
?>


