<?php

namespace App\Helpers;

use Carbon\Carbon;

/**
 * Class Helper
 * @package App\Helpers
 */
class Helper
{
    /**
     * @param $startDate
     * @param $endDate
     * @param null $diff
     * @return int
     */
	public static function calculateDays($startDate, $endDate) {
		$start = Carbon::parse($startDate);
		$end = Carbon::parse($endDate);		
		return $start->diffInDays($end);
		
	}

    

}
