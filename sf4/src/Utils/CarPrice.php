<?php
namespace App\Utils;

class CarPrice
{
      /**
   * Get the car Price with values
   *
   * @param int $carYear, int $nbKm, int $nbDays
   * @return int
   */

    public function toGetCarPrice(int $carYear, int $nbKm, int $nbDays):int
    {
        $price = 20;
        
        $price =  $nbDays*(50) - ($nbKm*(0.001) + $carYear*(2.5)) ;

        return ($price);
    }
}
