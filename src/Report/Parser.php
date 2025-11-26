<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Report;

/**
 * Very generic parser interface for configuring the transformation
 */
interface Parser
{
    public function parse(mixed $reportRow): ParserResult;
}
