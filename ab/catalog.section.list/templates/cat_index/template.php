<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
    'LIST' => array(
        'CONT' => 'bx_sitemap',
        'TITLE' => 'bx_sitemap_title',
        'LIST' => 'bx_sitemap_ul',
    ),
    'LINE' => array(
        'CONT' => 'bx_catalog_line',
        'TITLE' => 'bx_catalog_line_category_title',
        'LIST' => 'bx_catalog_line_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
    ),
    'TEXT' => array(
        'CONT' => 'bx_catalog_text',
        'TITLE' => 'bx_catalog_text_category_title',
        'LIST' => 'bx_catalog_text_ul'
    ),
    'TILE' => array(
        'CONT' => 'bx_catalog_tile',
        'TITLE' => 'bx_catalog_tile_category_title',
        'LIST' => 'bx_catalog_tile_ul',
        'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
    )
);
?>

<? //PR($arResult);?>
<div class="cat_index__wr">
    <div class="container">
        <div class="row">
            <div class="cat_index_wr">
                <? foreach ($arResult['SECTIONS'] as $k => $arResult_items):
                    $arCurView = $arViewStyles[$arParams['VIEW_MODE']];
                    $strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
                    $strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
                    $arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

                    $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                    ?>
                    <? if ($k < 4): ?>
                    <div class="cat_index_small" id="<? echo $this->GetEditAreaId($arResult['ID']); ?>">
                        <a href="/">
                            <div class="cat_index_small_img">
                                <? $file = CFile::ResizeImageGet($arResult_items['DETAIL_PICTURE'],
                                    array('width' => 265, 'height' => 368),
                                    BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                                <img src="<?= $file['src'] ?>"/>
                                <div class="cat_index_small_name">
                                    <span><?= $arResult_items["NAME"] ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <? else: ?>
                    <div class="cat_index_big">
                        <a href="/">
                            <div class="cat_index_big_img">
                                <? $file = CFile::ResizeImageGet($arResult_items['DETAIL_PICTURE'],
                                    array('width' => 557, 'height' => 250),
                                    BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                                <img src="<?= $file['src'] ?>"/>
                                <div class="cat_index_big_name">
                                    <span><?= $arResult_items["NAME"] ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <? endif; ?>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>