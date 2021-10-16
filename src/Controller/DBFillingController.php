<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;   
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\DataProviders\CustomersProvider;
use App\DataProviders\CarCategoriesProvider;
use App\DataProviders\LocationsProvider;
use App\DataProviders\CarsProvider;

use App\Repository\CarCategoryRepository;

use App\Entity\Customer;
use App\Entity\CarCategory;
use App\Entity\Location;
use App\Entity\Car;


class DBFillingController extends AbstractController
{

    /**
     * @Route("/insert_customers", name="customers_insertion")
     */
    public function insertCustomers(): Response 
    {
        $customersProvider = new CustomersProvider();
        $customersInformationArray = $customersProvider->getCustomersExamples();
        //$this->saveCustomers($customersInformationArray);

        return new Response(
            '<html><body>Customers insertion done successfully.</body></html>'
        );
    }

    /**
     * @Route("/insert_car_categories", name="car_categories_insertion")
     */
    public function insertCarCategories(): Response
    {
        $carCategoriesProvider = new CarCategoriesProvider();
        $carCategoriesInformationArray = $carCategoriesProvider->getCarCategoriesExamples();
        //$this->saveCarCategories($carCategoriesInformationArray);

        return new Response(
            '<html><body>Car Categories insertion done successfully.</body></html>'
        );
    }

    /**
     * @Route("/insert_locations", name="locations_insertion")
     */
    public function insertLocations(): Response
    {
        $locationsProvider = new LocationsProvider();
        $locationsInformationArray = $locationsProvider->getLocationsExamples();
        //$this->saveLocations($locationsInformationArray);

        return new Response(
            '<html><body>Locations insertion done successfully.</body></html>'
        );
    }

    /**
     * @Route("/insert_minivan_cars", name="minivan_cars_insertion")
     */
    public function insertMinivanCars(): Response
    {
        $carsProvider = new CarsProvider();
        $minivanCarsInformationArray = $carsProvider->getMinivanCarsExamples();
        //$this->saveMinivanCars($minivanCarsInformationArray);

        return new Response(
            '<html><body>Cars insertion done successfully.</body></html>'
        );
    }


    private function saveCustomers($customersInformationArray)
    {
        foreach($customersInformationArray as $customerInformationArray) {
            $customer = $this->createCustomer($customerInformationArray);
            $this->saveEntity($customer);
        }
    }

    private function saveCarCategories($carCategoriesInformationArray)
    {
        foreach($carCategoriesInformationArray as $carCategoryInformationArray) {
            $carCategory = $this->createCarCategory($carCategoryInformationArray);
            $this->saveEntity($carCategory);
        }
    }

    private function saveLocations($locationsInformationArray)
    {
        foreach($locationsInformationArray as $locationInformationArray){
            $location = $this->createLocation($locationInformationArray);
            $this->saveEntity($location);
        }
    }
    
    private function saveMinivanCars($minivanCarsInformationArray)
    {
        foreach($minivanCarsInformationArray as $minivanCarInformationArray){
            $car = $this->createCar($minivanCarInformationArray);
            $this->saveEntity($car);
        }
    }


    private function createCustomer($customerInformationArray)
    {   
        $customer = new Customer();
        $customer
            ->setName($customerInformationArray["name"])
            ->setBirthDate($customerInformationArray["birthDate"])
            ->setDrivingLincenseNumber($customerInformationArray["drivingLicenseNumber"]);
        return $customer;
    }
    
    private function createCarCategory($carCategoryInformationArray)
    {   
        $carCategory = new CarCategory();
        $carCategory
            ->setName($carCategoryInformationArray["name"]);
        return $carCategory;
    }

    private function createLocation($locationInformationArray)
    {
        $location = new Location();
        $location
            ->setCity($locationInformationArray["city"]);
        return $location;
    }
    
    private function createCar($carInformationArray)
    {
        $carCategory = $this->getCarCategoryById($carInformationArray["car_category_id"]);
        $car = new Car();
        $car
            ->setCategoryId($carCategory)
            ->setBrand($carInformationArray["brand"])
            ->setModel($carInformationArray["model"])
            ->setProductionYear($carInformationArray["production_year"])
            ->setMileage($carInformationArray["mileage"])
            ->setColor($carInformationArray["color"]);
        return $car;
    }

    
    private function saveEntity($entity)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($entity);
        $entityManager->flush();
    }

    private function getCarCategoryById($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $carCategory = $entityManager->getRepository(CarCategory::class)->find($id);
        return $carCategory;
    }
}