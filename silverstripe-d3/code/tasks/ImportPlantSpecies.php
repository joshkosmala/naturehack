<?php



class ImportPlantSpecies extends BuildTask
{

    protected $title = 'Import Plant Species';
    protected $description = 'Because.';



    public function run($request) {
      // 14616 total records = 730 queries

      $query = "http://api.gbif.org/v1/occurrence/search?collectionCode=NVS&hasCoordinate=True&geometry=POLYGON((174.30355830000002%20-40.840084499999996,175.2035583%20-40.840084499999996,175.2035583%20-41.7400845,%20174.30355830000002%20-41.7400845,%20174.30355830000002%20-40.840084499999996))";
      $offsetString = "&offset=";

      echo "<html><body><table>";
      for($i = 0; $i = 730; $i++){
         $json = file_get_contents($query.$offsetString.$i);
         //Debug::show($query.$offsetString.$i);
         $offsetMax = 20;
         $obj = json_decode($json, true);
         //print_r($obj);die();
         for($i = 0; $i < $offsetMax; $i++) {
            $resultsSet = $obj['results'][$i];
            //$speciesArray[]
            //array_push($speciesArray, $resultsSet['scientificName']);
            //array_push($speciesArray, $resultsSet['genericName']);
            echo "<tr>";
            echo "<td>";
            print_r($resultsSet['genericName']);
            echo "</td>";
            echo "<td>";
            print_r($resultsSet['decimalLongitude']);
            echo "</td>";
            echo "<td>";
            print_r($resultsSet['decimalLatitude']);
            echo "</td>";
            echo "<td>";
            print_r($resultsSet['genus']);
            echo "</td>";
            echo "<td>";
            print_r($resultsSet['family']);
            echo "</td>";
            echo "</tr>";
         }
      }
      echo "</table></body></html>";
      die();




      die();

        echo "Task Complete.";
     }
}
