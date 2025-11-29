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
                ",Issue,Worklog,Key,Logged,01/Oct/92\n,Test job,Here goes my work,KEYLOG-999,2",
                "KEYLOG-999\n- Here goes my work\n",
            ],
        ];
    }

    /** @return array<string,array<string>> */
    public static function translatedDataProvider(): array
    {
        return [
            "translated day reported" => [
                ",Issue,Worklog,Key,Logged,01/Oct/92\n,Test job,Here goes my work,KEYLOG-999,2",
                "KEYLOG-999\n- Oto moja praca\n",
            ],
        ];
    }

    /** @return array<string,array<string>> */
    public static function jiraKeyDataProvider(): array
    {
        return [
            "test jira key" => [
                ",Issue,Worklog,Key,Logged,01/Oct/92\n,Test job,Here goes my work,KEYLOG-999,2",
                "KEYLOG-999\nhttps://test-net.atlassian.net/KEYLOG-999\n- Here goes my work\n",
            ],
        ];
    }
}
