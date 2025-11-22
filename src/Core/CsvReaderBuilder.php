<?php

declare(strict_types=1);

namespace Ziumper\Templodocs\Core;

use League\Csv\Reader;
use RuntimeException;

class CsvReaderBuilder
{
    private ?string $path = null;
    private ?string $string = null;

    public function withString(string $string): self
    {
        $this->string = $string;
        return $this;
    }

    public function withPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
    * @return Reader<array<string, string>>|null
    */
    public function build(): ?Reader
    {
        if (empty($this->path) && empty($this->string)) {
            throw new RuntimeException("No path nor string provided for resource!");
        }

        $reader = ($this->path != null ? Reader::from($this->path, "r") : Reader::fromString($this->string));
        $reader->setHeaderOffset(0);
        return $reader;
    }
}
