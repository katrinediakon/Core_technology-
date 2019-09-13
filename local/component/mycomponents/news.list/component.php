<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

/** @global CIntranetToolbar $INTRANET_TOOLBAR */
global $INTRANET_TOOLBAR;

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;

CModule::IncludeModule("iblock");


$arFilter=array(
			 "IBLOCK_ID" => $arParams['IBLOCK_ID'],
		 );

		 $arResult=Array();
				 $arProj = CIBlockSection::GetList(array("SORT"=>"ASC"),$arFilter,false);
		 while($projRes = $arProj->GetNextElement())
			{

        $arFields = $projRes->GetFields();
        $arButtons = CIBlock::GetPanelButtons(
         $arFields["IBLOCK_ID"],
         $arFields["ID"],
         0,
         array("SECTION_BUTTONS"=>false, "SESSID"=>false)
       );

			 $arResult[$arFields["ID"]]["NAME"] = $arFields["NAME"];
			 $arResult[$arFields["ID"]]["ID"]= $arFields["ID"];//список разделов
       $arResult[$arFields["ID"]]["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
       $arResult[$arFields["ID"]]["DELETE_LINK"]= $arFields["ID"];//список разделов
       $arResult[$arFields["ID"]]["IBLOCK_ID"]= $arButtons["edit"]["delete_element"]["ACTION_URL"];

					}

						foreach($arResult as $key => $arSection){
					$arProjElem = CIBlockElement::GetList(array(),array("SECTION_ID"=>$key),false); // список элементов конкретного раздела
					$count=0;
				while($projResElem = $arProjElem->GetNextElement())
				 {
           	$arElemFields = $projResElem->GetFields();
					 $arButtons = CIBlock::GetPanelButtons(
			 			$arElemFields["IBLOCK_ID"],
			 			$arElemFields["ID"],
			 			0,
			 			array("SECTION_BUTTONS"=>false, "SESSID"=>false)
			 		);



					 $count++; // отвечает за количество элементов в разделе. Выводится в скобках рядом с название раздела

					$arSelFlds["NAME"] = $arElemFields["NAME"];
          $arSelFlds["ID"] = $arElemFields["ID"];
					$arSelFlds["PREVIEW_TEXT"] = $arElemFields["PREVIEW_TEXT"];
					$arSelFlds["DETAIL_PAGE_URL"] = $arElemFields["DETAIL_PAGE_URL"];
					$arSelFlds["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
					$arSelFlds["IBLOCK_ID"] = $arElemFields["IBLOCK_ID"];
					$arSelFlds["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

					$arSelFlds["DETAIL_TEXT_SIZE"] = strlen($arElemFields["DETAIL_TEXT"]);
					$arResult[$key]["ITEMS"][] = $arSelFlds;

				 }
					$arResult[$key]['COUNT'] = $count;
			 }

			 if($USER->IsAuthorized())
			 {
				 if(
					 $APPLICATION->GetShowIncludeAreas()
					 || (is_object($GLOBALS["INTRANET_TOOLBAR"]) && $arParams["INTRANET_TOOLBAR"]!=="N")
					 || $arParams["SET_TITLE"]
				 )
				 {
					 if(Loader::includeModule("iblock"))
					 {
						 $arButtons = CIBlock::GetPanelButtons(
							 $arResult["ID"]["ITEMS"]["ID"],
							 0,
							 $arParams["PARENT_SECTION"],
							 array("SECTION_BUTTONS"=>false)
						 );

						 if($APPLICATION->GetShowIncludeAreas())
							 $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));

						 if(
							 is_array($arButtons["intranet"])
							 && is_object($INTRANET_TOOLBAR)
							 && $arParams["INTRANET_TOOLBAR"]!=="N"
						 )
						 {
							 $APPLICATION->AddHeadScript('/bitrix/js/main/utils.js');
							 foreach($arButtons["intranet"] as $arButton)
								 $INTRANET_TOOLBAR->AddButton($arButton);
						 }

						 if($arParams["SET_TITLE"])
						 {
							 $arTitleOptions = array(
								 'ADMIN_EDIT_LINK' => $arButtons["submenu"]["edit_iblock"]["ACTION"],
								 'PUBLIC_EDIT_LINK' => "",
								 'COMPONENT_NAME' => $this->getName(),
							 );
						 }
					 }
				 }
			 }


	$this->includeComponentTemplate();
