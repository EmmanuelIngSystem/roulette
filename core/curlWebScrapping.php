<?php

class curlWebScrapping
{
    public array $resultData = [];
    public function curlBasicGet($url): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function parserHtml(string $nodeHtmlToSearch, string $html): mixed
    {
        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        $resultSearch = $xpath->evaluate($nodeHtmlToSearch);
        return $resultSearch;
    }

    public function extractTextHtml(mixed $data): void
    {
        foreach ($data as $value) {
            array_push($this->resultData, $value->textContent.PHP_EOL);
        }
    }
}