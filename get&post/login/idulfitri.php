<?php

$idulfitri = [
               [
              "nma" => "wawan setiawan",
              "ied" => "Selamat hari raya",
              "fitri" => "Idul fitri",
              "syawal" => "1 Syawal",
              "h" => [1441]
               ]
             ];

             foreach ( $idulfitri as $fitri ) :?>
               <ul>
                    <h1> Saya dan keluarga </h1>
                    <h1>Minal aidzin walfaidzin ya semuanya </h1>

                    <li> <?= $fitri ["ied"]; ?> </li>
                    <li> <?= $fitri ["fitri"]; ?> </li>
                    <li> <?= $fitri ["syawal"]; ?> </li>
                    <li> <?= $fitri ["h"] [0]; ?> </li>
               </ul>

             <?php endforeach;

 ?>

