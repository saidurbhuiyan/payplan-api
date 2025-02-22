<?php

use PayPlan\Commands\PhysicianCommands;
use PayPlan\Commands\SpecialtyCommands;
use PayPlan\PayPlanClient;

require_once 'vendor/autoload.php';

$client = new PayPlanClient();

// physician:
$physicianCmd = new PhysicianCommands($client);
// Example 1:
$physicians = $physicianCmd->listAllPhysicians("1", "ASC", "name");
print_r($physicians);

// Example 2:
$physiciansInSpecialty = $physicianCmd->listPhysiciansBySpecialty("1", "cardiology");
print_r($physiciansInSpecialty);


//specialties:
$specialtyCmd = new SpecialtyCommands($client);
// Example 3:
$specialties = $specialtyCmd->listAllSpecialties("2", "DESC", "name");
print_r($specialties);

// Example 4:
$physiciansInSpecialty = $specialtyCmd->listPhysiciansInSpecialty("2", "cardiology");
print_r($physiciansInSpecialty);