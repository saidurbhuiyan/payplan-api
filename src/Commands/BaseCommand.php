<?php

namespace PayPlan\Commands;

use PayPlan\PayPlanClient;
use PayPlan\Exceptions\PayPlanException;

class BaseCommand
{
    protected PayPlanClient $client;

    public function __construct(PayPlanClient $client)
    {
        $this->client = $client;
    }


    /**
     * fetch data
     * @param string $command
     * @param array $params
     * @param string $entityKey
     * @return array
     */
    protected function fetchData(string $command, array $params, string $entityKey): array
    {
        try {
            $response = $this->client->sendRequest($command, $params);
            return $this->extractData($response, $entityKey);
        } catch (PayPlanException $e) {
            return [];
        }
    }

    /**
     * extract data from array
     * @param array $data
     * @param string $entityKey
     * @return array
     */
    protected function extractData(array $data, string $entityKey): array
    {
        $entities = $data[$entityKey] ?? [];
        if (isset($entities['code'])) {
            $entities = [$entities];
        }

        return array_map(static fn($entity) => [
            'code' => $entity['code'],
            'name' => $entity['name'],
        ], $entities);
    }
}
