<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$arFilter=array(
			 "IBLOCK_ID" => $arParams['IBLOCK_ID'],
		 );

		 $arResult=Array();
				 $arProj = CIBlockSection::GetList(array("SORT"=>"ASC"),$arFilter,false);
		 while($projRes = $arProj->GetNextElement())
			{
			 $arFields = $projRes->GetFields();
			 $arResult[$arFields["ID"]]["NAME"] = $arFields["NAME"];
			 $arResult[$arFields["ID"]]["ID"]= $arFields["ID"];//список разделов
					}
						foreach($arResult as $key => $arSection){
					$arProjElem = CIBlockElement::GetList(array(),array("SECTION_ID"=>$key),false); // список элементов конкретного раздела
					$count=0;
				while($projResElem = $arProjElem->GetNextElement())
				 {
					 $arButtons = CIBlock::GetPanelButtons(
			 			$arElemFields["IBLOCK_ID"],
			 			$arElemFields["ID"],
			 			0,
			 			array("SECTION_BUTTONS"=>false, "SESSID"=>false)
			 		);

					 $count++; // отвечает за количество элементов в разделе. Выводится в скобках рядом с название раздела
					$arElemFields = $projResElem->GetFields();
					$arSelFlds["NAME"] = $arElemFields["NAME"];
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
		
