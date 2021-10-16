<?php

namespace App\DataProviders;

class LocationsProvider
{
    public function getLocationsExamples()
    {
        return array(
            array(
                "city" => "Las Palmas, Puerto"
            ),
            array(
                "city" => "Aeropuerto"
            ),
            array(
                "city" => "Maspalomas"
            ),
            array(
                "city" => "Agaete"
            )
        );
    }
}