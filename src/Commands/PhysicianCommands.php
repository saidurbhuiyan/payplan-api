<?php

namespace PayPlan\Commands;

use PayPlan\Exceptions\PayPlanException;

class PhysicianCommands extends BaseCommand
{

    /**
     * list of all physicians
     * @param string $command
     * @param string $order
     * @param string|null $orderBy
     * @return array
     */
    public function listAllPhysicians(string $command, string $order = 'ASC', ?string $orderBy = null): array
    {
        $physicians = $this->fetchData($command, [], 'physicians');
        return $this->sortResults($physicians, $orderBy, $order);
    }

    /**
     * physician by id
     * @param string $command
     * @param string $physicianId
     * @param string $order
     * @param string|null $orderBy
     * @return array
     */
    public function getPhysicianDetails(string $command, string $physicianId,  string $order = 'ASC', ?string $orderBy = null): array
    {
        $physician =  $this->fetchData($command, [$physicianId], 'physicians');
        return $this->sortResults($physician, $orderBy, $order);
    }

    /**
     * list of physician by specialty
     * @param string $command
     * @param string $specialtyId
     * @param string $order
     * @param string|null $orderBy
     * @return array
     */
    public function listPhysiciansBySpecialty(string $command, string $specialtyId,  string $order = 'ASC', ?string $orderBy = null): array
    {
        $physicians = $this->fetchData($command, [$specialtyId], 'physicians');
        return $this->sortResults($physicians, $orderBy, $order);
    }

}
