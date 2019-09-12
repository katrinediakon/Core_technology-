<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Резюме");
?><?$APPLICATION->IncludeComponent(
	"bitrix:form", 
	"rezume", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"IGNORE_CUSTOM_TEMPLATE" => "Y",
		"NOT_SHOW_FILTER" => array(
			0 => "",
			1 => "",
		),
		"NOT_SHOW_TABLE" => array(
			0 => "",
			1 => "",
		),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "Y",
		"SHOW_EDIT_PAGE" => "Y",
		"SHOW_LIST_PAGE" => "Y",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "Y",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "1",
		"COMPONENT_TEMPLATE" => "rezume",
		"VARIABLE_ALIASES" => array(
			"action" => "action",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>