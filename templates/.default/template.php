<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

//echo '<pre>'; print_r($arResult);
foreach ($arResult as $userKey => $userValue){
    echo '<div>';
    echo $userValue['LOGIN'].', '.$userValue['EMAIL'].', '.$userValue['NAME'].', '.$userValue['LAST_NAME'].PHP_EOL;
    echo '</div>';
}
