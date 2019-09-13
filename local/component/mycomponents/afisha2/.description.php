<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("IBLOCK_APHISHA_NAME_JOB"),
	"DESCRIPTION" => GetMessage("IBLOCK_APHISHA_DESCRIPTION_JOB"),
	"ICON" => "/images/aphisa.gif",
	"COMPLEX" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "aphisha2",
			"NAME" => GetMessage("T_IBLOCK_DESC_APHISHA_JOB"),
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "aphisha_cmpx",
			),
		),
	),
);

?>
