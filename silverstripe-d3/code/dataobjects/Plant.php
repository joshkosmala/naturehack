<?php

class Plant extends DataObject {

   static $db = array(
      "Title" => "Varchar(255)",
      "Longitude" => "Varchar",
      "Latitude" => "Varchar",
      "Genus" => "Varchar(255)",
      "Family" => "Varchar(255)",
      "ScientificName" => "Varchar(255)",
      "Species" => "Varchar(255)"
   );

}
