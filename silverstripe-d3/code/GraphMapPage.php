<?php

class GraphMapPage extends LocationMapPage {

}

class GraphMapPage_Controller extends LocationMapPage_Controller {

   public function init(){
      parent::init();
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3.v3.min.js");
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3-config.js");
      Requirements::javascript(MODULE_D3_DIR . "/javascript/flare.json");
      self::getPlantsInFamilies();
   }

   public function locationData() {
		// Get the locations from the database, exclude any that don't have LatLng's defined
		$infoWindowList = Plant::get()->exclude(array('lat' => null, 'lng' => null))->first();
		//Debug::show($infoWindowList);die();
		if ($infoWindowList) {

				$InfoWindows = array(
					'lat' => $infoWindowList->lat,
					'lng' => $infoWindowList->lng,
					'info' => $infoWindowList->Name// . "/<br />" . $obj->InfoWindow
				);

			//$InfoWindows = Convert::array2json($InfoWindows);
			// Return a JSON object for GoogleMapConfig.js to use
			//Debug::show($InfoWindows);
			return $InfoWindows;

		}
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

   public function getDistinctFamilies() {
      $families = Plant::get()->column('Family');
      return $families;
   }

   public function getPlantsInFamilies(){
      $families = $this->getDistinctFamilies();
      foreach($families as $family){
         $plants = Plant::get()->filter(array('Family' => $family));
         //Debug::show($plants);
      }
      die();
   }

}
