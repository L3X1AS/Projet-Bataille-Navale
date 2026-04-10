<?php
// focntion qui verfie si il reste ou pas des beateux sur la grille
function verifvictoire($grille)
{
    for ($c = 0; $c < 10; $c++) {
        for ($j = 0; $j < 10; $j++) {
            if ($grille [$j][$c] >= 2 && $grille [$j][$c] <= 5) {
                return false;
            }
        }
    }
    return true;
}
//ca creer un tableau de 10x10
function initialisegrille()
{
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $grille[$i][$j] = 0;
        }
    }
    return $grille;
}
//permet de visualiser le tableau
function affichetab($tab, $m, $n)
{
    echo "  ";
    for ($k = 0; $k < $n; $k++) {
        echo $k . " ";
    }
    echo "\n";
        for ($i = 0; $i < $m; $i++) {
            echo $i . " ";
        for ($j = 0; $j < $n; $j++) {
            if ($tab [$i][$j] == 0 || ($tab[$i][$j] >= 2 && $tab[$i][$j] <= 5)) {
                $tab [$i][$j] = "~";
            } elseif ($tab [$i][$j] == 1) {
                $tab [$i][$j] = "*";
            } elseif ($tab [$i][$j] == 8) {
                $tab [$i][$j] = "X";
            }
            echo $tab[$i][$j]. " ";
        }
        echo "\n";
    }
    echo "----------------------\n";
}

//va tirer sur le grille et en focntion de ce qu'il y a de base il va modifier en focntion
function tire($l, $c, &$grille)
{
    if ($l >= 0 && $l < 10 && $c >= 0 && $c < 10) {
        if ($grille[$l][$c] >= 2 && $grille[$l][$c] != 8) {
            echo "TOUCHÉ ! \n";
            $grille[$l][$c] = 8;
        } elseif ($grille[$l][$c] == 0) {
            echo "PLOUF... \n";
            $grille[$l][$c] = 1;
        } else {
            echo "Tu as déjà tiré ici \n";
        }
    }
}
//endroit ca va placer aleatoirement les bateaux verticale horizentale
function placerPorteAvionAleatoire(&$grille)
{
    $bateauPlace = false;
    while ($bateauPlace == false) {

        $direction = rand(1, 2);
        $placeEstLibre = true;
        if ($direction == 1) {
            $ligneDepart = rand(0, 9);
            $colonneDepart = rand(0, 5);
            for ($i = 0; $i < 5; $i++) {
                if ($grille[$ligneDepart][$colonneDepart + $i]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 5; $i++) {
                    $grille[$ligneDepart][$colonneDepart + $i] = 5;
                }
                $bateauPlace = true;
            }
        } else {
            $ligneDepart = rand(0, 5);
            $colonneDepart = rand(0, 9);
            for ($i = 0; $i < 5; $i++) {
                if ($grille[$ligneDepart + $i][$colonneDepart]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 5; $i++) {
                    $grille[$ligneDepart + $i][$colonneDepart] = 5;
                }
                $bateauPlace = true;
            }
        }
    }
}

function PlacerCroiseuAleatoire(&$grille)
{
    $bateauPlace = false;
    while ($bateauPlace == false) {

        $direction = rand(1, 2);
        $placeEstLibre = true;
        if ($direction == 1) {
            $ligneDepart = rand(0, 9);
            $colonneDepart = rand(0, 6);
            for ($i = 0; $i < 4; $i++) {
                if ($grille[$ligneDepart][$colonneDepart + $i]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 4; $i++) {
                    $grille[$ligneDepart][$colonneDepart + $i] = 4;
                }
                $bateauPlace = true;
            }
        } else {
            $ligneDepart = rand(0, 6);
            $colonneDepart = rand(0, 9);
            for ($i = 0; $i < 4; $i++) {
                if ($grille[$ligneDepart + $i][$colonneDepart]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 4; $i++) {
                    $grille[$ligneDepart + $i][$colonneDepart] = 4;
                }
                $bateauPlace = true;
            }
        }
    }
}

function PlacerSousmarinaleatoire(&$grille)
{
    $bateauPlace = false;
    while ($bateauPlace == false) {

        $direction = rand(1, 2);
        $placeEstLibre = true;
        if ($direction == 1) {
            $ligneDepart = rand(0, 9);
            $colonneDepart = rand(0, 7);
            for ($i = 0; $i < 3; $i++) {
                if ($grille[$ligneDepart][$colonneDepart + $i]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 3; $i++) {
                    $grille[$ligneDepart][$colonneDepart + $i] = 3;
                }
                $bateauPlace = true;
            }
        } else {
            $ligneDepart = rand(0, 7);
            $colonneDepart = rand(0, 9);
            for ($i = 0; $i < 3; $i++) {
                if ($grille[$ligneDepart + $i][$colonneDepart]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 3; $i++) {
                    $grille[$ligneDepart + $i][$colonneDepart] = 3;
                }
                $bateauPlace = true;
            }
        }
    }
}

function Placertorpieuraleatoire(&$grille)
{
    $bateauPlace = false;
    while ($bateauPlace == false) {

        $direction = rand(1, 2);
        $placeEstLibre = true;
        if ($direction == 1) {
            $ligneDepart = rand(0, 9);
            $colonneDepart = rand(0, 8);
            for ($i = 0; $i < 2; $i++) {
                if ($grille[$ligneDepart][$colonneDepart + $i]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 2; $i++) {
                    $grille[$ligneDepart][$colonneDepart + $i] = 2;
                }
                $bateauPlace = true;
            }
        } else {
            $ligneDepart = rand(0, 8);
            $colonneDepart = rand(0, 9);
            for ($i = 0; $i < 2; $i++) {
                if ($grille[$ligneDepart + $i][$colonneDepart]) {
                    $placeEstLibre = false;
                    break;
                }
            }
            if ($placeEstLibre == true) {
                for ($i = 0; $i < 2; $i++) {
                    $grille[$ligneDepart + $i][$colonneDepart] = 2;
                }
                $bateauPlace = true;
            }
        }
    }
}
//initalise la grille ou ca fait apelle a la focntion des chacuns des bateaux
$grilleJ1 = initialisegrille();
placerPorteAvionAleatoire($grilleJ1);
PlacerCroiseuAleatoire($grilleJ1);
PlacerSousmarinaleatoire($grilleJ1);
PlacerSousmarinaleatoire($grilleJ1);
Placertorpieuraleatoire($grilleJ1);
echo "\n=========================================\n";
echo "   BIENVENUE DANS LA BATAILLE NAVALE  \n";
echo "=========================================\n";
echo "Objectif : Couler les 5 navires ennemis cachés.\n";
echo "Légende : ~ (Eau), * (Raté), X (Touché)\n";
echo "Bonne chance \n";
//demande a l'utilasateur ou il veut tirer une protection de un cas erreur
while (true) {
    affichetab($grilleJ1, 10, 10);
    $l = (int)readline("Sur quelle ligne voulez-vous tirer ? (0-9) : ");
    $c = (int)readline("Sur quelle colonne voulez-vous tirer ? (0-9) : ");
    if ($l < 0 || $l > 9 || $c < 0 || $c > 9) {
        echo "tirer que entre 0 et 9";
        continue;
    }
    tire($l, $c, $grilleJ1);
    if (verifvictoire($grilleJ1)) {
        echo "Tous les bateaux sont coulées\n";
        break;
    }
}