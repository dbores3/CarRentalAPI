<?php

    namespace Api\Services\Files;
    use Api\Services\Files\File;
    use Api\Services\createCarService;

    /**
     * @desc Concrete Csv file class
     * @author David Bores
    **/

    class CsvFile extends File
    {
        // Reads the csv file
        public function read()
        {
            $file = $_FILES['file'];
            $tmpName = $file['tmp_name'];
            // Reads the csv file in php array
            $csvData = array_map('str_getcsv', file($tmpName));
            // Creates a copy of the csv header array
            $csvHeader = $csvData[0];
            // Removes the header from $csvData as it is no longer needed
            unset($csvData[0]);
            // Adds the header as a key for each row 
            foreach($csvData as $row){
                $row = array_combine($csvHeader, $row);
                // Creates the car
                $car = new createCarService();
                $car = $car->create_function($row);
            }
        }
    }