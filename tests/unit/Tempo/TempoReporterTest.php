<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit\Tempo;

use PHPUnit\Framework\TestCase;
use PHPUnit\Metadata\CoversClass;
use Ziumper\Templodocs\Core\CsvReaderBuilder;
use Ziumper\Templodocs\Tempo\TempoReporter;

#[CoversClass(TempoReporter::class)]
class TempoReporterTest extends TestCase
{
    public function testGetContent()
    {
        $reader = (new CsvReaderBuilder())->withString("test");
        static::assertNotNull($reader);
    }
}
