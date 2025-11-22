<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Utils;

final class TempoDataProvider
{
    /** @return array<string,array<string>> */
    public static function reportDataProvider(): array
    {
        return [
            "single day reported" => [
                ",Issue,Worklog,Key,Logged,01/Oct/92\n" .
                ",Test job,Here goes my work,KEYLOG-999,2",
                "KEYLOG-999\n- Here goes my work\n",
            ]
        ];
    }
}
