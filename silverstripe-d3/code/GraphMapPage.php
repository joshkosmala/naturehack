<?php

class GraphMapPage extends LocationMapPage {

}

class GraphMapPage_Controller extends LocationMapPage_Controller {

   public function init(){
      parent::init();
      self::plantJSON();
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3.v3.min.js");
      Requirements::javascript(MODULE_D3_DIR . "/javascript/d3-config.js");
      Requirements::javascript("assets/results.json");

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

   public function getPlantsInFamily(){
      $families = Plant::get()->filter(array('Family' => 'Cyperaceae'));
      //Debug::show($families);
      return $families;
   }

   // Get the plants in one family.
   // Count how many are there are of each type


   public function plantJSON(){
      //$families = $this->getDistinctFamilies();
      $js = array();
         $plantCount = $this->getPlantsInFamily()->column('Title');

      $plantsArr = array();

      foreach($plantCount as $c){

      $plantsName = Plant::get()->filter(array('Title' => $c));
$plantsNameCount = $plantsName->count();

$plantsArr[] = array('name' => $c, 'size' => $plantsNameCount*1000);

      }


         $plantJSON = "";

      $plantJSON = json_encode($plantsArr);
      //Debug::show($plantJSON);die();
      //$fp = fopen('../../../assets/results.json', 'w');
//fwrite($fp, $plantJSON);
//fclose($fp);
file_put_contents(Director::baseFolder() . '/assets/results.json', $plantJSON);
            //print_r($plantJSON);

      //}
      //die();
   }

}
