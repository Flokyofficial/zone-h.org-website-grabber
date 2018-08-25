<?php

include 'roote.php';

if (!is_dir(FOLDER)) {

    mkdir(FOLDER);     

}

echo $logo[array_rand($logo) ];

echo "\r\n[#] Enter ZHE COOKIE --> ";

$ZH = trim(fgets(STDIN));

echo "\r\n[#] Enter PHPSESSID --> ";

$PHPSESSID = trim(fgets(STDIN));



echo "\r\n[#] Enter notifier name--> ";

$notifier = trim(fgets(STDIN));

if (empty($ZH) && empty($PHPSESSID))

die("Wrong Setting.");

for ($i = 1;$i <= 50;$i++)
{

    $sites = source('http://www.zone-h.org/archive/notifier=' . $notifier . '/page=' . $i, $ZH, $PHPSESSID);

    if ($sites)

    {
        foreach ($sites as $site)

        {

            $xxx = "http://$site\r\n";

            preg_match_all('/http:\/\/(.*?)\//', $xxx, $Done);

            foreach ($Done[1] as $lolxd)

            {
   
                $lolx = "http://$lolxd\r\n";

                echo $lolx;
 
                $lol = fopen(FOLDER ."/{$notifier}.txt", 'a+');

                fwrite($lol, $lolx);

            }
        }

    }
    else
    {
        echo "\r\n\t[!]=====>  Error, Captcha Detected\n\n";

        continue;

    }
}

echo "\n";

echo "DONE with | " . count(file(FOLDER."/".$notifier . ".txt")) . " | Website SAVED in to ->  " . FOLDER."/".$notifier . ".txt";

@unlink("cookie.txt");

?>
