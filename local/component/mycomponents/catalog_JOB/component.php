<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arDefaultUrlTemplates404 = array(
	"vacancies" => "",
	"detail" => "#ELEMENT_ID#/",
	"form" => "#ELEMENT_ID#/resume/",
);

$arComponentVariables = array(
	"ELEMENT_ID",
	"ELEMENT_CODE",
	"resume",
);

if($arParams["SEF_MODE"] == "Y")
{
	$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);

	$arVariables = array();

	$componentPage = CComponentEngine::ParseComponentPath(
		$arParams["SEF_FOLDER"],
		$arUrlTemplates,
		$arVariables
		);

	if(!$componentPage)
	{
		$componentPage = "vacancies";
	}

	$arResult = array(
		"FOLDER" => $arParams["SEF_FOLDER"],
		"URL_TEMPLATES" => $arUrlTemplates,
		"VARIABLES" => $arVariables);

}
else
{
	$arVariables = array();

	$arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases, $arParams["VARIABLE_ALIASES"]);
	CComponentEngine::InitComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables);



	$componentPage = "";
	if(isset($arVariables["ELEMENT_ID"]) && !isset($arVariables["resume"]) && intval($arVariables["ELEMENT_ID"]) > 0)
		$componentPage = "detail";
		elseif(isset($arVariables["resume"])&&isset($arVariables["ELEMENT_ID"]))
			$componentPage = "form";


	else
		$componentPage = "vacancies";

		print_r($componentPage);
	$arResult = array(
		"FOLDER" => "",
		"URL_TEMPLATES" => Array(
			"vacancies" => htmlspecialcharsbx($APPLICATION->GetCurPage()),
			"detail" => htmlspecialcharsbx($APPLICATION->GetCurPage()."?".$arVariableAliases["ELEMENT_ID"]."=#ELEMENT_ID#"),
			"form" => htmlspecialcharsbx($APPLICATION->GetCurPage()."?resume=y&?".$arVariableAliases["ELEMENT_ID"]."=#ELEMENT_ID#"),
		),
		"VARIABLES" => $arVariables,
	);
}

$this->IncludeComponentTemplate($componentPage);
?>
