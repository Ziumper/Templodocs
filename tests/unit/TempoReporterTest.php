<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Metadata\CoversClass;
use Ziumper\Templodocs\TempoReaderBuilder;
use Ziumper\Templodocs\TempoReporter;

#[CoversClass(TempoReporter::class)]
class TempoReporterTest extends TestCase 
{
    public function testGetContent() 
    {
        $reader = (new TempoReaderBuilder())->withString();
    }
}
