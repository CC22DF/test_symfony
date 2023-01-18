<?php

namespace App\DataFixtures;

use App\Entity\Vehicles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VehicleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jsonVehicles = json_decode(file_get_contents(__DIR__ . '/vehicles.json'), false);

        foreach ($jsonVehicles as $jsonVehicle) {
            $vehicle = new Vehicles();
            $vehicle->setBrand($jsonVehicle->brand);
            $vehicle->setModel($jsonVehicle->model);
            $vehicle->setVersion($jsonVehicle->designation);
            $vehicle->setEnergy($jsonVehicle->fuel_type);
            $vehicle->setPower($jsonVehicle->power_in_hp);
            $vehicle->setPriceRetail($jsonVehicle->official_price);
            $vehicle->setPrice($jsonVehicle->gross_price);
            $vehicle->setPriceMonthly($jsonVehicle->monthly_price ?? null);
            $vehicle->setYear($jsonVehicle->year);
            $vehicle->setMileage($jsonVehicle->mileage);
            $vehicle->setPics($jsonVehicle->photos ?? []);
            $manager->persist($vehicle);
        }

        $manager->flush();
    }
}