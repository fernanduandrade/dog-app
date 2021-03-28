<?php

class DogService
{
    private $baseURI = " https://dog.ceo/api/breed/";
    private $client;

    public function __construct() {
        $this->client = curl_init();
        curl_setopt($this->client, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:85.0) Gecko/20100101 Firefox/85.0');
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
    }

    public function getDogImage(string $breedName): array
    {
        $uri = $this->baseURI . "$breedName/images/random";
        curl_setopt($this->client, CURLOPT_URL, $uri);
        return json_decode(curl_exec($this->client), true);
    }
}