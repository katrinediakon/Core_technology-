<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?

#
# INPUT PARAMS
#


#
# CACHE
#
$obCache = new CPageCache;
$cacheTime = 5*60;
$cacheId = $arGadgetParams["IBLOCK_ID"].$arGadgetParams["ELEMENT_COUNT"].$arGadgetParams["ELEMENT_COUNT"];

if($obCache->StartDataCache($cacheTime, $cacheId, "/")):
	if(!CModule::IncludeModule("form"))
	{
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}

	$arSelect = array(
		"ID",
		"ACTIVE",
		"DATE_CREATE",
		"IBLOCK_ID",
		"DETAIL_PAGE_URL",
		"NAME",
		"PREVIEW_PICTURE",
	);


  $arFields = array();
  $rsResults = CFormResult::GetList($arParams["G_REZUME_IBLOCK_ID"],
      ($by="s_timestamp"),
      ($order="desc"),
      $arFilter);
  $new=0;
  $all=0;
  while ($arResult = $rsResults->Fetch())
    {

      if(date("d",strtotime($arResult['DATE_CREATE']))==date('d') && date("m",strtotime($arResult['DATE_CREATE']))==date('m') && date("Y",strtotime($arResult['DATE_CREATE']))==date('Y'))
      {
          $new++;
          $all++;
      }
      else
      {
          $all++;
      }

    }

?>

<p>Сегодня заявок: <a href="/bitrix/admin/form_result_list.php?PAGEN_1=&SIZEN_1=20&lang=ru&WEB_FORM_ID=1&set_filter=Y&adm_filter_applied=1&find_date_create_1_FILTER_PERIOD=day&find_date_create_1_FILTER_DIRECTION=current&find_date_create_1=<?=date("d.m.Y")?>&find_date_create_2=<?=date("d.m.Y")?>"><?=$new?></a> </p>
<p>Всего заявок: <a href="/bitrix/admin/form_result_list.php?PAGEN_1=1&SIZEN_1=20&lang=ru&WEB_FORM_ID=1&del_filter=Y&find_date_create_1_FILTER_PERIOD=day&find_date_create_1_FILTER_DIRECTION=current&find_date_create_1=<?=date("d.m.Y")?>&find_date_create_2=<?=date("d.m.Y")?>"><?=$all?></a> </p>
<?

endif;

?>
