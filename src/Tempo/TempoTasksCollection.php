<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

class TempoTasksCollection
{
    /** @var TempoTask[] */
    private array $tasks = [];

    public function toString(): string
    {
        $content = "";

        foreach ($this->tasks as $task) {
            $content .= $task->toString();
        }

        return $content;
    }

    public function size(): int
    {
        return count($this->tasks);
    }

    public function addTask(TempoTask $task): void
    {
        $current = $this->getTask($task->getKey());

        if (!empty($current)) {
            return;
        }

        $this->tasks[] = $task;
    }

    public function getTask(string $key): ?TempoTask
    {
        /** @var TempoTask $task */
        foreach ($this->tasks as $task) {
            $taskKey = $task->getKey();
            if ($taskKey === $key) {
                return $task;
            }
        }

        return null;
    }
}
