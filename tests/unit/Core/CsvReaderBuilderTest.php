<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Core;

use League\Csv\Statement;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Ziumper\Templodocs\Core\CsvReaderBuilder;

#[CoversClass(CsvReaderBuilder::class)]
class CsvReaderBuilderTest extends TestCase
{
    public function testReaderWithString(): void
    {
        $reader = (new CsvReaderBuilder())
                ->withString(",Issue,Worklog,Key,Logged,01/Oct/92\n" .
                        ",Test job,,KEYLOG-999,2")
                ->build();

        $records = (new Statement())->process($reader);
        static::assertEquals(1, $records->count());
    }

    public function testReaderWithEmptyFilePath(): void
    {
        $this->expectException(\RuntimeException::class);
        $builder = new CsvReaderBuilder();
        $builder->build();
    }
}
