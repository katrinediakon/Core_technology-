<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule("form"))
	return false;

$arForms = array("" => GetMessage("GD_RESUME_EMPTY"));

$rsForm = CForm::GetList($by="s_id", $order="desc", $arFilter, $is_filtered);
while($arForm = $rsForm->GetNext())
	$arForms[$arForm ["ID"]] = "[".$arForm ["ID"]."] ".$arForm ["NAME"];


$arParameters = Array(
	"PARAMETERS"=> Array(
		"IBLOCK_ID" => Array(
			"NAME" => GetMessage("GD_RESUME_IBLOCK_ID"),
			"TYPE" => "LIST",
			"VALUES" => $arForms,
			"MULTIPLE" => "N",
			"DEFAULT" => '',
			"REFRESH" => "Y",
		),
	),
	"USER_PARAMETERS"=> Array(

		"ELEMENT_COUNT" => array(
			"NAME" => GetMessage("GD_RESUME_ELEMENT_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => '5',
		),
		"SHOW_UNACTIVE_ELEMENTS" => array(
			"NAME" => GetMessage("GD_RESUME_SHOW_UNACTIVE"),
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "N",
		),

	),
);

?>
