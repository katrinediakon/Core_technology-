<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
$arSelect = Array('PROPERTY_MATERIAL');
$arFilter = Array("IBLOCK_ID"=>2, "ACTIVE"=>"Y");

$arGroupBy=Array("PROPERTY_MATERIAL");
$dbItems = CIBlockElement::GetList(array(), $arrayFilter, array('PROPERTY_MATERIAL'));

while($ar_result = $dbItems->GetNext(true, false))
{
 $arResult["PROPERTY_MATERIAL"][] = $ar_result;
}
