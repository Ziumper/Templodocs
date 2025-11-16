<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Tempo;

use League\Csv\Reader;
use League\Csv\Statement;

/**
 *
 * Takes csv report from tempo file and generates
 * grouped up by issue and worklog
 *
 * #TODO use api https://apidocs.tempo.io/ instead csv data
 *
 * @author ziumper
 */
class TempoReporter
{
    public function __construct(private Reader $reader)
    {
    }

    public function getReport(): string
    {
        $csv = $this->reader;
        $records = (new Statement())->process($csv);
        $report = new TempoReportStruct();

        # read the CSV file and process each row
        foreach ($records as $row) {
            if (empty($row['Key'])) {
                continue;
            }

            $task = new TempoTask($row['Key']);
            $task->addWorklog($row['Worklog']);
            $report->addTask($task);
        }

        return $report->toString();
    }
}
