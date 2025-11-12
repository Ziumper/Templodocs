<?php

declare(strict_types=1);

namespace Ziumper\Templodocs;

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
    public function getContent(Reader $reader): array
    {
        $csv = $reader;
        $records = (new Statement())->process($csv);
        $tasks = [];
        $content = '';
        # read the CSV file and process each row
        foreach ($records as $row) {
            if (!empty($row['']) and isset($row['Logged'])) {
                $total = $row['Logged'];
                continue;
            }

            $key = $row['Key'] ?? '';
            $desc = $row['Worklog'] ?? '';
            if (empty($desc)) {
                continue;
            }

            if (empty($tasks[$key]['descriptions'])) {
                $tasks[$key]['descriptions'] = [];
            }
            foreach ($tasks[$key]['descriptions'] as $description) {
                if ($description === $desc) {
                    continue 2; // skip if the description already exists
                }
            }

            $tasks[$key]['descriptions'][] = $desc;
        }

        //parse the tasks array to create content for the Word document
        foreach ($tasks as $key => $task) {
            $content .= $key . PHP_EOL;
            foreach ($task['descriptions'] as $object) {
                $content .= "- " . $object . PHP_EOL;
            }
        }

        return [
            'content' => $content,
            'total' => $total
        ];
    }
}
