<?php

class GraphMapPage extends Page {

}

class GraphMapPage_Controller extends Page_Controller {

   public function init(){
      parent::init();
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3.v3.min.js");
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3-config.js");
      Requirements::javascript(MODULE_D3_DIR . "/javascript/flare.json");
   }

   public function LocationForm() {
      $fields = new FieldList(
                new TreeDropdownField('Location', "Select location", "SiteTree")
            );

            $actions = new FieldList(
               new FormAction('setLocation', 'Submit')
           );

            return new Form($this, 'LocationForm', $fields, $actions);
   }

   public function setLocation(){
      die("woo");
   }

}
