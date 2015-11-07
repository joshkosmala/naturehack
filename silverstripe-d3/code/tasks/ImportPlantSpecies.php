<?php

class ImportPlantSpecies extends BuildTask
{

    protected $title = 'Import Plant Species';
    protected $description = 'Because.';

    public function run($request) {
      // 14616 total records = 730 queries

      $query = "http://api.gbif.org/v1/occurrence/search?collectionCode=NVS&hasCoordinate=True&geometry=POLYGON((174.30355830000002%20-40.840084499999996,175.2035583%20-40.840084499999996,175.2035583%20-41.7400845,%20174.30355830000002%20-41.7400845,%20174.30355830000002%20-40.840084499999996))";
      $offsetString = "&offset=";

      for($i = 0; $i < 730; $i+=20){
         $json = file_get_contents($query.$offsetString.$i);

         $offsetMax = 20;

         //echo $query.$offsetString.$i . "<br />";


            //echo $query.$offsetString.$i . "<br />";
         $obj = json_decode($json, true);
         //print_r($obj);die();
         for($n = 0; $n < $offsetMax; $n++) {

            $resultsSet = $obj['results'][$n];

            //print_r($obj['results'][$n]['genericName']);

            //echo $obj['results'][$n];

            $plant = Plant::create();

            $plant->Title = $resultsSet['genericName'];
            $plant->Longitude = $resultsSet['decimalLongitude'];
            $plant->Latitude = $resultsSet['decimalLatitude'];
            $plant->Genus = $resultsSet['genus'];
            $plant->Family = $resultsSet['family'];
            $plant->ScientificName = $resultsSet['scientificName'];
            $plant->Species = $resultsSet['species'];

            $plant->write();

         }
      }

        echo "Task Complete.";
     }
}
