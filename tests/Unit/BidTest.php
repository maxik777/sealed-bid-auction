<?php

namespace Tests\Unit;

use App\Http\Controllers\Controller;
use PHPUnit\Framework\TestCase;

class BidTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_wining_price_higher_than_reserve_price()
    {
        $reservePrice = 100.00;

        $arr = [
            'a' => ['bid' => [110.00]],
            'b' => ['bid' => [120.00]],
            'c' => ['bid' => [80.00]],
            'd' => ['bid' => [50.00]],
            'e' => ['bid' => [30.00]]
        ];

        $winningPrice = (new Controller())->getWinningPrice($arr);

        $this->assertTrue($winningPrice >= $reservePrice, 'Winning price lower than reserve price!');
    }
}
