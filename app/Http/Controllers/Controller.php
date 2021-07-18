<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $currencySign = '€';

        $reservePrice = 100.00;

        $aData = [110.00, 130.00];
        $bData = [0.00];
        $cData = [125.00];
        $dData = [105.00, 115.00, 90.00];
        $eData = [132.00, 135.00, 140.00];

        $arr = $this->getMaxValues($aData, $bData, $cData, $dData, $eData);

        $winningPrice = $this->getWinningPrice($arr);

        if ($winningPrice >= $reservePrice){

            $winner = array_key_first(array_slice($arr, -1));
        }else{

            $winner = null;
            $winningPrice = null;
        }

        return view('welcome',
            [
                'currencySign' => $currencySign,
                'reservePrice' => number_format($reservePrice, 2),
                'winner' => $winner,
                'winningPrice' => number_format($winningPrice, 2)
            ]
        );
    }

    function getMaxValues($aData, $bData, $cData, $dData, $eData)
    {
        $a = max($aData);
        $b = max($bData);
        $c = max($cData);
        $d = max($dData);
        $e = max($eData);

        return [
            'a' => ['bid' => [$a]],
            'b' => ['bid' => [$b]],
            'c' => ['bid' => [$c]],
            'd' => ['bid' => [$d]],
            'e' => ['bid' => [$e]]
        ];
    }

    function getWinningPrice($arr)
    {
        asort($arr);

        $winningPriceArr = array_column(array_slice($arr, -2, 1), 'bid');

        $winningPrice = 0;

        array_walk_recursive($winningPriceArr, function($k) use (&$winningPrice) {
            return $winningPrice = $k;
        });

        return $winningPrice;
    }
}
