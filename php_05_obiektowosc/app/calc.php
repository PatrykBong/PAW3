<?php
require_once dirname(__FILE__).'/../config.php';
//include _ROOT_PATH.'/app/security/check.php'; //relikt przeszłości nie zwracać uwagi
require_once $conf->root_path.'/app/CalcCtrl.class.php';
$ctrl = new CalcCtrl();
$ctrl->process();