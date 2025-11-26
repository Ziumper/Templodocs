<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularData;
use League\Csv\TabularDataReader;
use Ziumper\Templodocs\Report\Parser;

use function assert;

/**
 * @author Ziumper
 */
class TempoReport
{
    /**
     * @param Reader<array<string, string>> $reader
     * @param Parser[] $parsers
     */
    public function __construct(
        private Reader $reader,
        private array $parsers = [],
    ) {
    }

    public function getContent(): string
    {
        /** @var TabularDataReader<array<string,string>> $tabularReader */
        $tabularReader = (new Statement())->process($this->reader);
        $tasks = new TempoTasksCollection();

        /** @var TabularData $row */
        foreach ($tabularReader as $row) {
            if (empty($row['Key'])) {
                continue;
            }

            /** @var Parser $parser */
            foreach ($this->parsers as $parser) {
                $parserResult = $parser->parse($row);
                $row = $parserResult->result;
            }

            $task = new TempoTask($row['Key']);
            $task->addWorklog($row['Worklog']);
            $tasks->addTask($task);
        }

        return $tasks->toString();
    }
}
