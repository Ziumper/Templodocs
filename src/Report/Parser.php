<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Report;

interface Parser
{
    public function parse(object $reportRow): void;
}
