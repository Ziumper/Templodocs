<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit;

use League\Csv\Statement;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Ziumper\Templodocs\TempoReaderBuilder;

#[CoversClass(TempoReaderBuilder::class)]
class TempoReaderBuilderTest extends TestCase
{
    //Tempo apply different type of format and it depends on configuration,
    //so I build it with simplest type of example
    public function testReader(): void
    {
        $reader = (new TempoReaderBuilder())
                ->withString(",Issue,Worklog,Key,Logged,01/Oct/92\n" .
                        ",Test job,,KEYLOG-999,2")
                ->build();

        $records = (new Statement())->process($reader);
        static::assertEquals(1, $records->count());
    }
}
