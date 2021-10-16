<?php

namespace App\DataProviders;

class CustomersProvider 
{
    public function getCustomersExamples()
    {
        return array(
            array(
                "name" => "Marcelino Gutierrez",
                "birthDate" => date_create('1998-03-10'),
                "drivingLicenseNumber" => "23322320K",
            ),
            array(
                "name" => "Esmeregildo Angurria",
                "birthDate" => date_create('1990-04-30'),
                "drivingLicenseNumber" => "70415068Q",
            ),
            array(
                "name" => "Nicodermus Peregil",
                "birthDate" => date_create('1978-11-22'),
                "drivingLicenseNumber" => "02943725R",
            ),
            array(
                "name" => "Angistias Tulipan",
                "birthDate" => date_create('1988-02-01'),
                "drivingLicenseNumber" => "77567978H",
            ),
            array(
                "name" => "Geranio Perpetua",
                "birthDate" => date_create('1993-06-17'),
                "drivingLicenseNumber" => "14505441P",
            ),
        );
    }    
}