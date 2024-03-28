<?php
/**
 * Компонента должна выводить всех пользователей на страницу из группы Администратор.
 * На странице должен отобразиться Логин, Email, Имя, Фамилия
 * Вывод данных должен происходить в шаблоне компонента. (т.е. echo 'ID товара, Название
 * товара'; печатать в шаблоне компонента, а не в component.php
 */

use Bitrix\Main\SystemException;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class AllAdmins extends CBitrixComponent
{
    public function executeComponent(){
        try{
            $this->getResult();
            $this->includeComponentTemplate();
        }
        catch (SystemException $e){
            ShowError($e->getMessage());
        }
    }

    protected function getResult()
    {
        if ($this->errors)
            throw new SystemException(current($this->errors));

        $arResult = [];
        $filter = ["GROUPS_ID" => Array(1)];
        $rst = CUser::GetList($by="id", $order="ASC", $filter);

        while($res = $rst->GetNext()){
            //echo 'ID: '.$res['ID'].' '.$res['NAME'].PHP_EOL;
            $arResult[] = [
                'LOGIN'=>$res['LOGIN'],
                'EMAIL'=>$res['EMAIL'],
                'NAME'=>$res['NAME'],
                'LAST_NAME'=>$res['LAST_NAME'],
            ];
        }
        $this->arResult = $arResult;
    }
}
