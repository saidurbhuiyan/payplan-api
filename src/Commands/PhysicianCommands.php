<?php

namespace PayPlan\Commands;

use PayPlan\Exceptions\PayPlanException;

class PhysicianCommands extends BaseCommand
{

    /**
     * list of all physicians
     * @param string $command
     * @param string $orderBy
     * @return array
     */
    public function listAllPhysicians(string $command, string $orderBy = "name"): array
    {
        return $this->fetchData($command, [$orderBy], 'physicians');
    }

    /**
     * physician by id
     * @param string $command
     * @param string $physicianId
     * @return array
     */
    public function getPhysicianDetails(string $command, string $physicianId): array
    {
        return $this->fetchData($command, [$physicianId], 'physicians');
    }

    /**
     * list of physician by specialty
     * @param string $command
     * @param string $specialtyId
     * @return array
     */
    public function listPhysiciansBySpecialty(string $command, string $specialtyId): array
    {
        return $this->fetchData($command, [$specialtyId], 'physicians');
    }

}
