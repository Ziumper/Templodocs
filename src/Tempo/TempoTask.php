<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

class TempoTask
{
    private array $worklogs = [];

    public function __construct(private string $key)
    {
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function addWorklog(?string $worklog)
    {
        if (empty($worklog)) {
            return;
        }

        if (in_array($worklog, $this->worklogs)) {
            return;
        }

        $this->worklogs[] = $worklog;
    }

    public function toString(): string
    {
        $content = $this->getKey() . PHP_EOL;

        foreach ($this->worklogs as $object) {
            $content .= "- " . $object . PHP_EOL;
        }

        return $content;
    }
}
