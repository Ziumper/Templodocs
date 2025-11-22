<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Core;

class TranslatorService
{
    private string $apiUrl = "https://translate.googleapis.com/translate_a/single?client=gtx";

    public function translate(string $content, string $from, string $to): string
    {
        $url = "$this->apiUrl&sl=$from&tl=$to&dt=t&q=" . urlencode($content);

        $options = [
            "http" => [
                "method" => "GET",
                "header" => "Accept: application/json\r\n"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            throw new \RuntimeException("Translation request failed.");
        }

        $result = json_decode($response, true);

        if (
            !is_array($result) ||
            empty($result) ||
            !isset($result[0][0][0])
        ) {
            throw new \RuntimeException("Unexpected translation API response.");
        }

        $translation = $result[0][0][0];

        return $translation;
    }
}
