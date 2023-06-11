<?php
  /* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
  Codificación: UTF-8
  +----------------------------------------------------------------------+
  | Issabel version {ISSBEL_VERSION}                                               |
  | http://www.issabel.org                                               |
  +----------------------------------------------------------------------+
  | Copyright (c) 2017 Issabel Foundation                                |
  | Copyright (c) 2006 Palosanto Solutions S. A.                         |
  +----------------------------------------------------------------------+
  | The contents of this file are subject to the General Public License  |
  | (GPL) Version 2 (the "License"); you may not use this file except in |
  | compliance with the License. You may obtain a copy of the License at |
  | http://www.opensource.org/licenses/gpl-license.php                   |
  |                                                                      |
  | Software distributed under the License is distributed on an "AS IS"  |
  | basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See  |
  | the License for the specific language governing rights and           |
  | limitations under the License.                                       |
  +----------------------------------------------------------------------+
  | The Initial Developer of the Original Code is PaloSanto Solutions    |
  +----------------------------------------------------------------------+
  $Id: index.php,v 1.1 2023-03-11 12:03:20 Gian Diego diego.javes@logaritmo.cl Exp $ */
//include issabel framework
include_once "libs/paloSantoGrid.class.php";
include_once "libs/paloSantoForm.class.php";

function _moduleContent(&$smarty, $module_name)
{
    //include module files
    include_once "modules/$module_name/configs/default.conf.php";
    include_once "modules/$module_name/libs/paloSantoaulaphone.class.php";

    //include file language agree to issabel configuration
    //if file language not exists, then include language by default (en)
    $lang=get_language();
    $base_dir=dirname($_SERVER['SCRIPT_FILENAME']);
    $lang_file="modules/$module_name/lang/$lang.lang";
    if (file_exists("$base_dir/$lang_file")) include_once "$lang_file";
    else include_once "modules/$module_name/lang/en.lang";

    //global variables
    global $arrConf;
    global $arrConfModule;
    global $arrLang;
    global $arrLangModule;
    $arrConf = array_merge($arrConf,$arrConfModule);
    $arrLang = array_merge($arrLang,$arrLangModule);

    //folder path for custom templates
    $templates_dir=(isset($arrConf['templates_dir']))?$arrConf['templates_dir']:'themes';
    $local_templates_dir="$base_dir/modules/$module_name/".$templates_dir.'/'.$arrConf['theme'];

    //conexion resource
    $pDB = new paloDB($arrConf['dsn_conn_database']);
    //$pDB = "";

    //conexion resource
    global $pACL;
    $user = isset($_SESSION['issabel_user'])?$_SESSION['issabel_user']:"";
    $extension = $pACL->getUserExtension($user);
    $isAdministrator = $pACL->isUserAdministratorGroup($user);
    if($extension=="" || is_null($extension)){
	if($isAdministrator) 
	  $smarty->assign("mb_message", "<b> El usuario actual no tiene una extensión asignada... </b>");
	else
	  $smarty->assign("mb_message", "<b>"._tr("contact_admin")."</b>");
	  return "";
    }

    //actions
    $action = getAction();
    $content = "";

    switch($action){

        default: // view_form
            $content = viewFormaulaphone($smarty, $module_name, $local_templates_dir, $pDB, $arrConf,$extension);
            break;
    }
    return $content;
}

function viewFormaulaphone($smarty, $module_name, $local_templates_dir, &$pDB, $arrConf,$extension)
{
    $paulaphone = new paloSantoaulaphone($pDB);

    $secretArray = $paulaphone-> getaulaphoneByPaswd($extension);

    $validate = $paulaphone-> getaulaphoneValidateWebRTC($extension);

    if (empty($validate)) {
        $smarty->assign("mb_message", "<b> No es una extensión WEB-RTC </b>");
	    return "";
    }

    $DatosExten = array();;

    if(is_array($secretArray)){
        foreach($secretArray as $key => $value){ 
            $DatosExten['secret'] = $value;
        }
    }

    $DatosExten['server'] = $_SERVER['SERVER_NAME'] ;
    $DatosExten['port'] = '8089' ;
    $DatosExten['exten'] = $extension ;
    $DatosExten['user'] = $extension ;

    $smarty->assign("secret", $DatosExten['secret']); 
    $smarty->assign("server", $DatosExten['server']); 
    $smarty->assign("port", $DatosExten['port']); 
    $smarty->assign("exten", $DatosExten['exten']); 
    $smarty->assign("user", $DatosExten['user']); 


    $oForm = new paloForm($smarty,$arrFormaulaphone);
    $smarty->assign("icon", "images/list.png");

    $htmlForm = $oForm->fetchForm("$local_templates_dir/form.tpl",_tr("aulaphone"), $_DATA);
    $content = "<form  method='POST' style='margin-bottom:0;' action='?menu=$module_name'>".$htmlForm."</form>";

    return $content;
}

function getAction()
{
        return "dafault"; //cancel
}
?>