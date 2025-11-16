<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

class TempoReportStruct
{
    private array $tasks = [];

    public function toString(): string
    {
        $content = "";

        foreach ($this->tasks as $task) {
            $content .= $task->toString();
        }

        return $content;
    }

    public function addTask(TempoTask $task)
    {
        $current = $this->getTask($task->getKey());

        if (!empty($current)) {
            return;
        }

        $this->tasks[] = $task;
    }

    public function getTask(string $key): ?TempoTask
    {
        $task = array_filter($this->tasks, static fn($t) => $t->getKey() === $key);

        if (empty($task)) {
            return null;
        }

        return $task[0];
    }
}
