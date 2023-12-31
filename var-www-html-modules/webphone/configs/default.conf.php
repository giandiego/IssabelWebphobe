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
  $Id: default.conf.php,v 1.1 2023-03-11 12:03:20 Gian Diego diego.javes@logaritmo.cl Exp $ */
    global $arrConf;
    global $arrConfModule;

    $arrConfModule['module_name']       = 'aulaphone';
    $arrConfModule['templates_dir']     = 'themes';
    //ex1: $arrConfModule['dsn_conn_database'] = "sqlite3:///$arrConf[issabel_dbdir]/base_name.db";
    //ex2: $arrConfModule['dsn_conn_database'] = "mysql://user:password@ip_host_sever_mysql/base_name";
    $arrConfModule['dsn_conn_database'] = "mysql://webphone:tu_contrasena@localhost/asterisk";
?>