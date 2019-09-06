<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"mycomponents:catalog.main.random", 
	".default", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "180",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"IBLOCKS_PROP" => "2",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "products",
		"IMG_HEIGHT" => "96",
		"IMG_WIDTH" => "130",
		"PARENT_SECTION" => "",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>