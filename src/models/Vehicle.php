<?php

namespace billythekid\dvla\models;

use Exception;

class Vehicle
{

    /**
     * ENUMS
     */
    public const TAX_STATUS_NOT_TAXED_FOR_ON_ROAD_USE = "Not Taxed for on Road Use";
    public const TAX_STATUS_SORN                      = "SORN";
    public const TAX_STATUS_TAXED                     = "Taxed";
    public const TAX_STATUS_UNTAXED                   = "Untaxed";

    public const MOT_STATUS_NO_DETAILS_HELD_BY_DVLA = "No details held by DVLA";
    public const MOT_STATUS_NO_RESULTS_RETURNED     = "No results returned";
    public const MOT_STATUS_NOT_VALID               = "Not valid";
    public const MOT_STATUS_VALID                   = "Valid";

    /**
     * Vehicle properties
     */
    private string $registrationNumber; // Registration number of the vehicle
    private string $taxStatus; // Tax status of the vehicle
    private string $taxDueDate; // Date of tax liability, Used in calculating licence information presented to user
    private string $artEndDate; // Additional Rate of Tax End Date, format: YYYY-MM-DD
    private string $motStatus; // MOT Status of the vehicle
    private string $motExpiryDate; // Mot Expiry Date
    private string $make; // Vehicle make
    private string $monthOfFirstDvlaRegistration; // Month of First DVLA Registration
    private string $monthOfFirstRegistration; // Month of First Registration
    private int $yearOfManufacture; // Year of Manufacture
    private int $engineCapacity; // Engine capacity in cubic centimetres
    private int $co2Emissions; // Carbon Dioxide emissions in grams per kilometre
    private string $fuelType; // Fuel type (Method of Propulsion)
    private bool $markedForExport; // True only if vehicle has been export marked
    private string $colour; // Vehicle colour
    private string $color; // Vehicle colour (alias of $colour)
    private string $typeApproval; // Vehicle Type Approval Category
    private string $wheelplan; // Vehicle wheel plan
    private int $revenueWeight; // Revenue weight in kilograms
    private string $realDrivingEmissions; // Real Driving Emissions value
    private string $dateOfLastV5CIssued; // Date of last V5C issued
    private string $euroStatus; // Euro Status (Dealer / Customer Provided (new vehicles))


    public function __construct($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    /**
     * Fluent setters
     */

    /**
     * @return string
     */
    public function getTaxStatus(): string
    {
        return $this->taxStatus;
    }

    /**
     * @param string $taxStatus
     * @return $this
     * @throws Exception
     */
    public function setTaxStatus(string $taxStatus): Vehicle
    {
        if (!in_array($taxStatus, [
            self::TAX_STATUS_NOT_TAXED_FOR_ON_ROAD_USE,
            self::TAX_STATUS_SORN,
            self::TAX_STATUS_TAXED,
            self::TAX_STATUS_UNTAXED,
        ]))
        {
            throw new Exception("Invalid tax status: {$taxStatus}");
        }

        $this->taxStatus = $taxStatus;

        return $this;
    }

    /**
     * @param string $taxDueDate
     * @return Vehicle
     */
    public function setTaxDueDate(string $taxDueDate): Vehicle
    {
        $this->taxDueDate = $taxDueDate;

        return $this;
    }

    /**
     * @param string $artEndDate
     * @return Vehicle
     */
    public function setArtEndDate(string $artEndDate): Vehicle
    {
        $this->artEndDate = $artEndDate;

        return $this;
    }

    /**
     * @param string $motStatus
     * @return Vehicle
     */
    public function setMotStatus(string $motStatus): Vehicle
    {
        if (!in_array($motStatus, [
            self::MOT_STATUS_NO_DETAILS_HELD_BY_DVLA,
            self::MOT_STATUS_NO_RESULTS_RETURNED,
            self::MOT_STATUS_NOT_VALID,
            self::MOT_STATUS_VALID,
        ]))
        {
            throw new Exception("Invalid MOT status: {$motStatus}");
        }

        $this->motStatus = $motStatus;

        return $this;
    }

    /**
     * @param string $motExpiryDate
     * @return Vehicle
     */
    public function setMotExpiryDate(string $motExpiryDate): Vehicle
    {
        $this->motExpiryDate = $motExpiryDate;

        return $this;
    }

    /**
     * @param string $make
     * @return Vehicle
     */
    public function setMake(string $make): Vehicle
    {
        $this->make = $make;

        return $this;
    }

    /**
     * @param string $monthOfFirstDvlaRegistration
     * @return Vehicle
     */
    public function setMonthOfFirstDvlaRegistration(string $monthOfFirstDvlaRegistration): Vehicle
    {
        $this->monthOfFirstDvlaRegistration = $monthOfFirstDvlaRegistration;

        return $this;
    }

    /**
     * @param string $monthOfFirstRegistration
     * @return Vehicle
     */
    public function setMonthOfFirstRegistration(string $monthOfFirstRegistration): Vehicle
    {
        $this->monthOfFirstRegistration = $monthOfFirstRegistration;

        return $this;
    }

    /**
     * @param int $yearOfManufacture
     * @return Vehicle
     */
    public function setYearOfManufacture(int $yearOfManufacture): Vehicle
    {
        $this->yearOfManufacture = $yearOfManufacture;

        return $this;
    }

    /**
     * @param int $engineCapacity
     * @return Vehicle
     */
    public function setEngineCapacity(int $engineCapacity): Vehicle
    {
        $this->engineCapacity = $engineCapacity;

        return $this;
    }

    /**
     * @param int $co2Emissions
     * @return Vehicle
     */
    public function setCo2Emissions(int $co2Emissions): Vehicle
    {
        $this->co2Emissions = $co2Emissions;

        return $this;
    }

    /**
     * @param string $fuelType
     * @return Vehicle
     */
    public function setFuelType(string $fuelType): Vehicle
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * @param bool $markedForExport
     * @return Vehicle
     */
    public function setMarkedForExport(bool $markedForExport): Vehicle
    {
        $this->markedForExport = $markedForExport;

        return $this;
    }

    /**
     * @param string $colour
     * @return Vehicle
     */
    public function setColour(string $colour): Vehicle
    {
        $this->colour = $colour;
        $this->color  = $colour;

        return $this;
    }

    /**
     * Alias of setColour()
     *
     * @param string $color
     * @return Vehicle
     */
    public function setColor(string $color): Vehicle
    {
        return $this->setColour($color);
    }

    /**
     * @param string $typeApproval
     * @return Vehicle
     */
    public function setTypeApproval(string $typeApproval): Vehicle
    {
        $this->typeApproval = $typeApproval;

        return $this;
    }

    /**
     * @param string $wheelplan
     * @return Vehicle
     */
    public function setWheelplan(string $wheelplan): Vehicle
    {
        $this->wheelplan = $wheelplan;

        return $this;
    }

    /**
     * @param int $revenueWeight
     * @return Vehicle
     */
    public function setRevenueWeight(int $revenueWeight): Vehicle
    {
        $this->revenueWeight = $revenueWeight;

        return $this;
    }

    /**
     * @param string $realDrivingEmissions
     * @return Vehicle
     */
    public function setRealDrivingEmissions(string $realDrivingEmissions): Vehicle
    {
        $this->realDrivingEmissions = $realDrivingEmissions;

        return $this;
    }

    /**
     * @param string $dateOfLastV5CIssued
     * @return Vehicle
     */
    public function setDateOfLastV5CIssued(string $dateOfLastV5CIssued): Vehicle
    {
        $this->dateOfLastV5CIssued = $dateOfLastV5CIssued;

        return $this;
    }

    /**
     * @param string $euroStatus
     * @return Vehicle
     */
    public function setEuroStatus(string $euroStatus): Vehicle
    {
        $this->euroStatus = $euroStatus;

        return $this;
    }

    /**
     * Accessors
     */

    /**
     * Only use this to access properties if you're a sociopath!
     *
     * @param string $property
     * @return bool|int|string
     * @throws Exception
     */
    public function __get(string $property): bool|int|string
    {
        return match ($property)
        {
            "registrationNumber" => $this->getRegistrationNumber(),
            "taxStatus" => $this->getTaxStatus(),
            "taxDueDate" => $this->getTaxDueDate(),
            "artEndDate" => $this->getArtEndDate(),
            "motStatus" => $this->getMotStatus(),
            "motExpiryDate" => $this->getMotExpiryDate(),
            "make" => $this->getMake(),
            "monthOfFirstDvlaRegistration" => $this->getMonthOfFirstDvlaRegistration(),
            "monthOfFirstRegistration" => $this->getMonthOfFirstRegistration(),
            "yearOfManufacture" => $this->getYearOfManufacture(),
            "engineCapacity" => $this->getEngineCapacity(),
            "co2Emissions" => $this->getCo2Emissions(),
            "fuelType" => $this->getFuelType(),
            "markedForExport" => $this->isMarkedForExport(),
            "colour" => $this->getColour(),
            "color" => $this->getColor(),
            "typeApproval" => $this->getTypeApproval(),
            "wheelplan" => $this->getWheelplan(),
            "revenueWeight" => $this->getRevenueWeight(),
            "realDrivingEmissions" => $this->getRealDrivingEmissions(),
            "dateOfLastV5CIssued" => $this->getDateOfLastV5CIssued(),
            "euroStatus" => $this->getEuroStatus(),
            default => throw new Exception("Property not found"),
        };
    }

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @return string
     */
    public function getTaxDueDate(): string
    {
        return $this->taxDueDate;
    }

    /**
     * @return string
     */
    public function getArtEndDate(): string
    {
        return $this->artEndDate;
    }

    /**
     * @return string
     */
    public function getMotStatus(): string
    {
        return $this->motStatus;
    }

    /**
     * @return string
     */
    public function getMotExpiryDate(): string
    {
        return $this->motExpiryDate;
    }

    /**
     * @return string
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @return string
     */
    public function getMonthOfFirstDvlaRegistration(): string
    {
        return $this->monthOfFirstDvlaRegistration;
    }

    /**
     * @return string
     */
    public function getMonthOfFirstRegistration(): string
    {
        return $this->monthOfFirstRegistration;
    }

    /**
     * @return int
     */
    public function getYearOfManufacture(): int
    {
        return $this->yearOfManufacture;
    }

    /**
     * @return int
     */
    public function getEngineCapacity(): int
    {
        return $this->engineCapacity;
    }

    /**
     * @return int
     */
    public function getCo2Emissions(): int
    {
        return $this->co2Emissions;
    }

    /**
     * @return string
     */
    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    /**
     * @return bool
     */
    public function isMarkedForExport(): bool
    {
        return $this->markedForExport;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->getColour();
    }

    /**
     * @return string
     */
    public function getTypeApproval(): string
    {
        return $this->typeApproval;
    }

    /**
     * @return string
     */
    public function getWheelplan(): string
    {
        return $this->wheelplan;
    }

    /**
     * @return int
     */
    public function getRevenueWeight(): int
    {
        return $this->revenueWeight;
    }

    /**
     * @return string
     */
    public function getRealDrivingEmissions(): string
    {
        return $this->realDrivingEmissions;
    }

    /**
     * @return string
     */
    public function getDateOfLastV5CIssued(): string
    {
        return $this->dateOfLastV5CIssued;
    }

    /**
     * @return string
     */
    public function getEuroStatus(): string
    {
        return $this->euroStatus;
    }


}
