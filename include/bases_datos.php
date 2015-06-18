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

	public function addCkEditor()
	{
		$this->Editor->addJavascript('addCkEditor("'.$this->instanceName.'notes");');
	}

    protected function initiateEditor() {
        $tableColumns['id_bd'] = array(
            'display_text' => 'ID',
            'perms' => 'TVQSXO'
        );
        
            $tableColumns['nombre_bd'] = array(
            'display_text' => 'Nombre de la Base de Datos',
            'perms' => 'EVCTAXQSHOF'
        );    


        $tableColumns['version'] = array(
            'display_text' => 'Versión',
            'perms' => 'EVCTAXQSHOF'
        );

        $tableColumns['puerto_tcp'] = array(
            'display_text' => 'Puerto TCP',
            'perms' => 'EVCTAXQSHOF'
        );


        $tableColumns['proposito'] = array(
            'display_text' => 'Propósito',
            'perms' => 'EVCTAXQSHOF'
        );

        $tableColumns['usuarios'] = array(
            'display_text' => 'Número de usuarios concurrentes',
            'perms' => 'EVCTAXQSHOF'
        );

        $tableColumns['replica'] = array(
            'display_text' => 'Se replica a otro servidor? Si/No Si- ¿A Cual?',
            'perms' => 'EVCTAXQSHOF'
        );

        $tableColumns['tamano'] = array(
            'display_text' => 'Tamaño aprox. de la base',
            'perms' => 'EVCTAXQSHOF'
        );

        $tableColumns['horario'] = array(
            'display_text' => 'Horario de operación',
            'perms' => 'EVCTAXQSHOF'
        );


        $tableColumns['respaldos'] = array(
            'display_text' => 'Tipos de respaldo',
            'perms' => 'EVCTAXQSHOF'
        );
        
    

        $tableColumns['horario_baja'] = array(
            'display_text' => 'Horario para dar de baja la base ',
            'perms' => 'EVCTAXQSHOF'
        );


        $tableColumns['exports'] = array(
            'display_text' => 'Exports',
            'perms' => 'EVCTAXQSHOF'
        );

        $tableColumns['logs'] = array(
            'display_text' => 'Archivos/Logs',
            'perms' => 'EVCTAXQSHOF'
        );



        $tableColumns['usuario_admin'] = array(
            'display_text' => 'Usuario Administrador',
            'perms' => 'EVCTAXQSHOF'
        );
                $tableColumns['password_admin'] = array(
            'display_text' => 'Contraseña de administrador',
            'perms' => 'EVCTAXQSHOF'
        );
//        $tableColumns['servidor_id_servidor'] = array(
//            'display_text' => 'servidor_id',
//            'perms' => 'EVCTAXQSHOF'
//        );
        
        $tableColumns['servidor_id_servidor'] = array(
            'display_text' => 'Servidor',
            'perms' => 'EVCTAXQSHO',
            'join' => array(
                'table' => 'servidor',
                'column' => 'id_servidor',
                'display_mask' => "servidor.host",
                'type' => 'left'
            )
        );  

        $tableName = 'bases_datos';
        $primaryCol = 'id_bd';
        $errorFun = array(&$this, 'logError');
        $permissions = 'EAVDQCSXHOI';

        $this->Editor = new AjaxTableEditor($tableName, $primaryCol, $errorFun, $permissions, $tableColumns);
        $this->Editor->setConfig('tableInfo', 'cellpadding="1" cellspacing="1" align="center" width="1100" class="mateTable"');
        $this->Editor->setConfig('orderByColumn', 'first_name');
        $this->Editor->setConfig('tableTitle', 'Base de Datos');
        $this->Editor->setConfig('addRowTitle', 'Agregar Bases de Datos');
        $this->Editor->setConfig('editRowTitle', 'Editar Bases de Datos');
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


