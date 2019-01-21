<?php

use PHPUnit\Framework\TestCase;

final class FileTest extends TestCase
{

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            '1',
            '2'
        );
    }
}

?>
<!-- vendor/bin/phpunit --bootstrap vendor/autoload.php tests/FileTest.php -->