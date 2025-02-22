<?php

namespace PayPlan\Commands;

use PayPlan\Exceptions\PayPlanException;

class SpecialtyCommands extends BaseCommand
{

    /**
     * list of specialties
     * @param string $command
     * @param string $order
     * @param string|null $orderBy
     * @return array
     */
    public function listAllSpecialties(string $command, string $order = 'ASC', ?string $orderBy = null): array
    {
        $specialties =  $this->fetchData($command, [$orderBy], 'specialties');
        return $this->sortResults($specialties, $orderBy, $order);
    }

    /**
     * list of specialties of physician
     * @param string $command
     * @param string $physicianId
     * @param string $order
     * @param string|null $orderBy
     * @return array
     */
    public function listSpecialtiesByPhysician(string $command, string $physicianId, string $order = 'ASC', ?string $orderBy = null): array
    {
        $specialty =  $this->fetchData($command, [$physicianId], 'specialties');
        return $this->sortResults($specialty, $orderBy, $order);
    }

    /**
     * list of physicians in specialty
     * @param string $command
     * @param string $specialtyId
     * @param string $order
     * @param string|null $orderBy
     * @return array
     */
    public function listPhysiciansInSpecialty(string $command, string $specialtyId, string $order = 'ASC', ?string $orderBy = null): array
    {
        $specialties =  $this->fetchData($command, [$specialtyId], 'physicians');
        return $this->sortResults($specialties, $orderBy, $order);
    }

}
