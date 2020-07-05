<?php

declare(strict_types=1);

require_once('BingoCaller.php');

use PHPUnit\Framework\TestCase;
use CallerBingoNumber;

final class BingoTest extends TestCase
{
    public function testBingoCallsValidNumber() {
        $caller = new CallerBingoNumber();
        $number = $caller->getNumber();

        $this->assertThat(
            $number,
            $this->logicalAnd(
                $this->lessThanOrEqual(75),
                $this->greaterThanOrEqual(1)
            )
        );
    }

    public function testBingoCallsValidNumberInFullRange() {
        $caller = new CallerBingoNumber();
        $numbersCalled = [];

        for ($i = 0; $i < 75; $i++) {
            $number = $caller->getNumber();
            $numbersCalled[] = $number;
        }

        sort($numbersCalled);

        $this->assertEquals($numbersCalled, range(1, 75));
    }
}
