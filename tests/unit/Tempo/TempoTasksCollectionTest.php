<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Tempo;

use PHPUnit\Framework\TestCase;
use Ziumper\Templodocs\Tempo\TempoTask;
use Ziumper\Templodocs\Tempo\TempoTasksCollection;

class TempoTasksCollectionTest extends TestCase
{
    public function testAddDoubleKeyTask(): void
    {
        $tempoTaskCollection = new TempoTasksCollection();
        $key = "TESTKEY-001";
        $task = new TempoTask($key);
        $tempoTaskCollection->addTask($task);
        $tempoTaskCollection->addTask($task);

        static::assertEquals(1, $tempoTaskCollection->size());
    }

    public function testGetTaskNotFound(): void
    {
        $collection = new TempoTasksCollection();
        $task = new TempoTask("SomeKey");
        $collection->addTask($task);
        $result = $collection->getTask("TEST-KEY");

        static::assertNull($result);
    }

    public function testGetTaskFound(): void
    {
        $collection = new TempoTasksCollection();
        $myKey = "TestKey";
        $testTask = new TempoTask($myKey);
        $collection->addTask($testTask);
        $result = $collection->getTask($myKey);

        static::assertEquals($result, $testTask);
    }
}
