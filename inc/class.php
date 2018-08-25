<?php
function source( $site, $ZH, $PHPSESSID ) {
    
                $curl = curl_init();
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt( $curl, CURLOPT_URL, $site );
                curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
                curl_setopt( $curl, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt' );
                curl_setopt( $curl, CURLOPT_COOKIE, "ZHE=" . $ZH . "; PHPSESSID=" . $PHPSESSID . ";" );
                curl_setopt( $curl, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt' );
                curl_setopt( $curl, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)" );
                curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
                curl_setopt( $curl, CURLOPT_TIMEOUT, 20 );
                $exec = curl_exec( $curl );
                curl_close( $curl );
                return ( preg_match_all( '#<td>((www.)?[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]+/(?:.*))#', $exec, $sites ) ) ? $sites[ 1 ] : null;
}