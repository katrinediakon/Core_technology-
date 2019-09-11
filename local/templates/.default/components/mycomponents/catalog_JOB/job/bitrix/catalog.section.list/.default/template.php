<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


?>
<style media="screen">
.hide {
  display: none;
}
.hide + label ~ div{
  display: none;
}
/* оформляем текст label */
.hide + label {
  border-bottom: 1px dotted green;
  padding: 0;
  color: green;
  cursor: pointer;
  display: inline-block;
}
/* вид текста label при активном переключателе */
.hide:checked + label {
  color: red;
  border-bottom: 0;
}
/* когда чекбокс активен показываем блоки с содержанием  */
.hide:checked + label + div {
  display: block;
  background: #efefef;
  -moz-box-shadow: inset 3px 3px 10px #7d8e8f;
  -webkit-box-shadow: inset 3px 3px 10px #7d8e8f;
  box-shadow: inset 3px 3px 10px #7d8e8f;
  padding: 10px;
}

/* demo контейнер */
.demo {
  margin: 5% 10%;
}
</style>




<div class="demo">
  <?php foreach ($arResult as $arItem ): ?>

    <input type="checkbox" id="hd-<?=$arItem['ID']?>" class="hide"/>
    <label for="hd-<?=$arItem['ID']?>" ><?=$arItem["NAME"]?></label>
      <div>
    <?foreach ($arItem["ITEMS"] as $key):?>

    <p><a href="<?=$key["DETAIL_PAGE_URL"]?>"><?=$key["NAME"]?></a></p>

    <?endforeach?>
      </div>
    <br/>
    <br/>
    <?php endforeach; ?>
</div>
