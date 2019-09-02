<?php
iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
$arTempID=array( );
foreach ($arResult["ITEMS"] as $elem) {

  $arTempID[]= $elem["PROPERTIES"]["LINK"]["VALUE"];

}

$arSort= false;
$arFilter= array('IBLOCK' => IBLOCK_CAT_ID ,'ACTIVE' => "Y" , 'ID' => $arTempID ,);
 $arGroupBy= false;
 $arNavStartParams = array("nTopCount"=>50);
  $arSelect=  array('ID', "Name", "PROPERTY_PRICE", "DETAIL_PAGE_URL");
 $BDRes= CIBlockElement::GetList (
   $arSort,
  $arFilter,
   $arGroupBy,
  $arNavStartParams,
  $arSelect
);
   $arResult['CAT_ELEM'] =  array( );
   while ($arRes =$BDRes->GetNext())
   {
     $arResult["CAT_ELEM"][$arRes["ID"]]=$arRes;
   }

 ?>
