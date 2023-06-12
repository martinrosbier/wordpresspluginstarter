<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use helpers\Renamer;

class RenamerTest extends TestCase {

    public function testRenameFiles() {
        // Create a mock object of RecursiveIteratorIterator
        $iterator = $this->createMock(\RecursiveIteratorIterator::class);

        // Configure the mock object as needed for your test case
        $iterator->expects($this->once())
                ->method('isFile')
                ->willReturn(true);

        // Create an instance of Renamer and inject the mock object
        $renamer = new Renamer('plugin_name');
        $renamer->setIterator($iterator);

        // Call the method under test
        $result = $renamer->renameFiles();

        // Perform your assertions or expectations based on the test case
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertEquals('file_name', $result[0]);
    }

}
