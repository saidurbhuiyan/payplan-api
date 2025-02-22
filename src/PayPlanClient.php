<?php

namespace PayPlan;

use Exception;
use SimpleXMLElement;
use SoapClient;
use SoapFault;
use PayPlan\Exceptions\PayPlanException;

class PayPlanClient
{

    protected SoapClient $client;

    /**
     * @param string|null $wsdl
     * @throws PayPlanException
     */
    public function __construct(?string $wsdl = "http://soap.payplan.com/query.asmx?wsdl")
    {
        try {
            $this->client = new SoapClient($wsdl, [
                'trace'      => true,
                'exceptions' => true,
            ]);
        } catch (SoapFault $e) {
            throw new PayPlanException("SOAP Initialization Error: " . $e->getMessage());
        }
    }

    /**
     * soap request and parse xml response
     * @param string $command
     * @param array $params
     * @return array
     * @throws PayPlanException
     */
    public function sendRequest(string $command, array $params = []): array
    {
        $request = [
            'CMD'    => $command,
            'PARAMS' => implode(';', $params),
        ];

        try {
            $response = $this->client->__soapCall("requestXML", [$request]);
            $xmlString = $response->responseXMLResult ?? null;

            if (!$xmlString) {
                throw new PayPlanException("Empty response from SOAP service.");
            }

            return $this->parseXMLResponse($xmlString);
        } catch (SoapFault|Exception $e) {
            throw new PayPlanException("SOAP Request Error: " . $e->getMessage());
        }
    }

    /**
     * parse xml response
     * @param string $xmlString
     * @return array
     * @throws Exception
     */
    private function parseXMLResponse(string $xmlString): array
    {
        $xml = new SimpleXMLElement($xmlString);
        $parsedResponse = [];

        foreach ($xml->children() as $group) {
            $groupName = $group->getName();
            $parsedResponse[$groupName] = [];

            foreach ($group->children() as $entity) {
                $entityData = [];
                foreach ($entity->children() as $field) {
                    $entityData[$field->getName()] = (string)$field;
                }
                $parsedResponse[$groupName][] = $entityData;
            }
        }

        return $parsedResponse;
    }

}
