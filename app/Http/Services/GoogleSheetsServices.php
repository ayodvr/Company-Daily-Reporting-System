<?php

namespace App\Http\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\valueRange;


class GoogleSheetsServices
{

    public $client, $service, $documentId, $range;

    public function _construct()
    {
        $this->client     = $this->getClient();
        $this->service    = new Sheets($this->client);
        $this->documentId = '1_gp3EX2lM9FgS-TuXhlmCtTh8RoezPMtkPlSNRRljTo';
        $this->range      = 'A-K';
    }

    public function getClient()
    {
        $client = new Client();
        $client->setApplicationName('Google Sheets Demo');
        $client->setRedirectUri('http://localhost:8000/googlesheet');
        $client->setScopes(Sheets::SPREADSHEETS);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('online');

        return $client;
    }

    public function readSheet()
    {
        $doc = $this->service->spreadsheets_values->get($this->documentId, $range);

        $values = $doc->getValues();

        return $values;
    }
}
