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
    public function testReaderWithString(): void
    {
        $reader = (new TempoReaderBuilder())
                ->withString(",Issue,Worklog,Key,Logged,01/Oct/92\n" .
                        ",Test job,,KEYLOG-999,2")
                ->build();

        $records = (new Statement())->process($reader);
        static::assertEquals(1, $records->count());
    }
    
    public function testReaderWithEmptyFilePath(): void 
    {
        $reader = (new TempoReaderBuilder())
                ->withPath("")
                ->build();
        
        static::assertNull($reader);
    }
}
