
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slides.min.jquery.js');?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
	$().ready(function(){
		$(function(){
			$('#slides').slides({
				preload: false,
				generateNextPrev: false,
				autoHeight: true,
				play: 4000,
				effect: 'fade'
			});
		});
	});
</script>

<div class="sl_slider" id="slides">
	<div class="slides_container">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<div>
			<div>

				<?if(is_array($arItem["DETAIL_PICTURE"])):
					 $renderImage = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], Array("width" => $arParams['LIST_PREVIW_PICTURE_W'], "height" => $arParams['LIST_PREVIW_PICTURE_H']));?>
				<img src="<?= $renderImage["src"]?>" alt="" />
				<?endif;?>
				<h2><a href="<?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>
				<p><?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]?> всего за   <?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]["PROPERTY_PRICE_VALUE"]?> руб.</p>
				<a href="<?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]["DETAIL_PAGE_URL"]?>" class="sl_more" title="<?=$arResult["CAT_ELEM"][$arItem["PROPERTIES"]["LINK"]["VALUE"]]["NAME"]?>">Подробнее &rarr;</a>
			
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>
