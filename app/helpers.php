<?php





if (! function_exists('giorni_trascorsi')) {

    function giorni_trascorsi($creato) {

        $creato = new DateTime($creato);
        $adesso = new DateTime("now");
        $intervallo = $creato->diff($adesso);
        $giorni_trascorsi = intval($intervallo->format("%a")); 
        return  $giorni_trascorsi;
    }
}



if (! function_exists('isExpired')) {

    function isExpired($creato) {

        $scadenza = intval(config('settings.scadenza_giorni'));
        $giorniTrascorsi = giorni_trascorsi($creato);
        
        if($giorniTrascorsi >= $scadenza ){
            return true;
        }

        return false;
    }
}








if (! function_exists('sconto_sul_prezzo')) {

    function sconto_sul_prezzo($total, $percentage) {

        $discount_value = ($total / 100) * $percentage;
        $final_price = $total - $discount_value;
        $final_price = number_format($final_price, 2);
        return $final_price;
    }
}



if (! function_exists('discountByTime')) {

    function discountByTime($price, $creato) {
     
        $giorni_trascorsi = giorni_trascorsi($creato);
        $result = [];
      
        switch ($giorni_trascorsi) {
            case 0:
                $result['prezzo'] =  $price;
                $result['sconto'] =  '0';
              break;
            case 1:
                $result['prezzo'] =  sconto_sul_prezzo($price, config('settings.sconto_2'));
                $result['sconto'] =  config('settings.sconto_2');
              break;
            case 2:
                $result['prezzo'] =  sconto_sul_prezzo($price, config('settings.sconto_3'));
                $result['sconto'] =  config('settings.sconto_3');
              break;
            default:
                $result['prezzo'] = sconto_sul_prezzo($price, config('settings.sconto_3'));
                $result['sconto'] =  config('settings.sconto_3');
          }
         
          return $result;
    }
   
    
}



