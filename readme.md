# PayPlan API Client Library

This library allows you to interact with the PayPlan SOAP API. It provides functionality to list physicians, specialties, and filter them by various attributes. You can also order the results by any attribute.

## Requirements
- PHP 7.x or higher
- Composer (if using autoloading)

## Installation

1. Clone this repository or copy the files into your project.
2. Install dependencies (if using Composer):
   ```bash
   composer install
   
## Use
```php
use PayPlan\Commands\PhysicianCommands;
use PayPlan\PayPlanClient;

require_once 'vendor/autoload.php';

$client = new PayPlanClient();

// physician:
$physicianCmd = new PhysicianCommands($client);
$physicians = $physicianCmd->listAllPhysicians("1", "name", "ASC");
print_r($physicians);

//specialties:
$specialtyCmd = new SpecialtyCommands($client);
$specialties = $specialtyCmd->listAllSpecialties("2", "name", "DESC");
print_r($specialties);
```
