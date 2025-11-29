<?php
namespace App\Tests;

use App\helloWorld;
use PHPUnit\Framework\TestCase;

class helloWorldTest extends TestCase{
    /**
     * @covers \App\helloWorld
     */
    public function testSayHelloWorld() {
        $saidHelloWorld = new helloWorld();

        $this->assertEquals(
            'Hello World!',
            $saidHelloWorld->helloWorld());
    }
}