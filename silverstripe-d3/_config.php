<?php

define('MODULE_D3_DIR', basename(dirname(__FILE__)));
/*
 * Check if the module folder exists.
 */
if (basename(dirname(__FILE__)) != MODULE_D3_DIR) {
    throw new Exception(MODULE_D3_DIR.' not configured correctly');
}
