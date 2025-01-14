<?php

declare(strict_types=1);

namespace Tests\Write;

use MapFile\Model\Cluster as ClusterObject;
use MapFile\Writer\Cluster;
use Tests\WriteTest;

final class ClusterTest extends WriteTest
{
    public function test(): void
    {
        $cluster = new ClusterObject();
        $cluster->buffer = 0.5;
        $cluster->maxdistance = 1.5;
        $cluster->region = 'rectangle';

        $writer = new Cluster($this->path);
        $writer->write($cluster);
        $result = $writer->save();

        self::assertTrue($result);
        self::assertFileEquals($this->stub, $this->path);
    }
}
