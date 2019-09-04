<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?
if(CModule::IncludeModule("iblock"))
{

  $arSelect = Array("ID", "NAME", );
  $arFilter = Array("IBLOCK_ID"=>6, "ACTIVE"=>"N");
  	$rsResCat = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
  $arItems = array();
  while($arItemCat = $rsResCat->GetNext())
  {
   		$arItems[] = $arItemCat;
   print_r($arItems);
  }
  CEventLog::Add(array(
      "SEVERITY" => "SECURITY",
      "AUDIT_TYPE_ID" => "CHECK_ACTIVE",
      "MODULE_ID" => "iblock",
      "ITEM_ID" => "",
      "DESCRIPTION" => "Акции не активны ".count($arItems)." количество",
  ));
  if(count($arItems) > 0)
  {
    $arFilter = Array(
        "GROUPS_ID" => Array(1)
    );
    $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $arFilter);
    $arEmail = array();
    while($arResUser = $rsUsers->GetNext())
    {
      $arEmail[] = $arResUser["EMAIL"];
    }

    if(count($arEmail) > 0)
    {
      $arEventFields = array(
          "TEXT" =>"Акции не активны ".count($arItems)." количество",
          "EMAIL" => implode(", ", $arEmail),
      );
      CEvent::Send("INFO_", "s1", $arEventFields);
    }
  }
}
?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
