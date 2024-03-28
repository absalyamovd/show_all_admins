<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

CBitrixComponent::includeComponentClass($componentName);

$arComponentParameters = array(
    "GROUPS" => array(
        "SETTINGS" => ["NAME" => "Настройка"],
    ),
);