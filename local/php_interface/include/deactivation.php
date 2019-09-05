<?
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("CIBLockDeactivation", "OnBeforeIBlockElementDelete"));

class CIBLockDeactivation
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
		if($arFields['IBLOCK_ID'] == 1){
        $res = CIBlockElement::GetByID($arFields);

        if($arFields["ACTIVE"]=="N" )
        {
          $toDayDate=new DateTime();
          $dayActive= new DateTime($arFields["ACTIVE_FROM"]);
          $interval=$toDayDate->diff($dayActive);
          if((int)$interval->format('%R%a')>="-3")
          {

             global $APPLICATION;
             $APPLICATION->throwException("Вы деактивировали свежую новость.");
             return false;
          }
        }
		}

    }
}
