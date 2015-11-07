<?php

class GraphMapPage extends LocationMapPage {

}

class GraphMapPage_Controller extends LocationMapPage_Controller {

   public function init(){
      parent::init();
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3.v3.min.js");
   }

}
