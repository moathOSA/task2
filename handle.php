<?php


include_once('class.php');
if ($_POST['action'] == 'hamming') {
    Hamming::checkHamming($_POST['a'], $_POST['b']);
} else if ($_POST['action'] == 'levenshtein') {
    echo Levenshtein::checkLevenshtein($_POST['a'], $_POST['b']);
}
