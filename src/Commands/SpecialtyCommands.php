<?php

namespace PayPlan\Commands;

use PayPlan\Exceptions\PayPlanException;

class SpecialtyCommands extends BaseCommand
{

    /**
     * list of specialties
     * @param string $command
     * @param string $orderBy
     * @return array
     */
    public function listAllSpecialties(string $command, string $orderBy = "name"): array
    {
        return $this->fetchData($command, [$orderBy], 'specialties');
    }

    /**
     * list of specialties of physician
     * @param string $command
     * @param string $physicianId
     * @return array
     */
    public function listSpecialtiesByPhysician(string $command, string $physicianId): array
    {
        return $this->fetchData($command, [$physicianId], 'specialties');
    }

    /**
     * list of physicians in specialty
     * @param string $command
     * @param string $specialtyId
     * @return array
     */
    public function listPhysiciansInSpecialty(string $command, string $specialtyId): array
    {
        return $this->fetchData($command, [$specialtyId], 'physicians');
    }

}
