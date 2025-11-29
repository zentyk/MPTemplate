<?php
namespace App\Tests;

use App\helloWorld;
use PHPUnit\Framework\TestCase;

class helloWorldTest extends TestCase{
    public function testSayHelloWorld() {
        $saidHelloWorld = new helloWorld();

        $this->assertEquals(
            'Hello World!',
            $saidHelloWorld->helloWorld());
    }
}