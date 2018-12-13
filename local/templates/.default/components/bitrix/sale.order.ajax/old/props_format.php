<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists("PrintPropsForm"))
{
	function PrintPropsForm($arSource = array(), $locationTemplate = ".default")
	{
		if (!empty($arSource))
		{
			?>
				<div class="col2-set" id="customer_details">
					<div class="col-2">
						<div class="woocommerce-shipping-fields">

				<?

				foreach ($arSource as $key => $arProperties)
				{
					?>
					<div data-property-id-row="<?=intval(intval($arProperties["ID"]))?>">

						<?
						if ($arProperties["TYPE"] == "TEXT")
						{
							?>
							<p class="form-row form-row-<? if ($key < 5) if ($key % 2 != 0) echo "first"; else echo "last";?> validate-required validate-required" id="billing_first_name_field">
								<label for="billing_first_name" class="">
									<?=$arProperties["NAME"]?> <? if ($arProperties["REQUIRED"] == "Y") {?><abbr class="required" title="required">*</abbr><?}?>
								</label>
								<input type="text" class="input-text" name="<?=$arProperties["FIELD_NAME"]?>" <?=$arProperties["REQUIRED"] = "Y" ? "required" : "" ?>  id="<?=$arProperties["FIELD_NAME"]?>" placeholder="" value="<?=$arProperties["VALUE"]?>">
							</p>
							<?
						}
						?>
					</div>

					<?if(CSaleLocation::isLocationProEnabled()):?>

					<?
					$propertyAttributes = array(
						'type' => $arProperties["TYPE"],
						'valueSource' => $arProperties['SOURCE'] == 'DEFAULT' ? 'default' : 'form' // value taken from property DEFAULT_VALUE or it`s a user-typed value?
					);

					if(intval($arProperties['IS_ALTERNATE_LOCATION_FOR']))
						$propertyAttributes['isAltLocationFor'] = intval($arProperties['IS_ALTERNATE_LOCATION_FOR']);

					if(intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']))
						$propertyAttributes['altLocationPropId'] = intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']);

					if($arProperties['IS_ZIP'] == 'Y')
						$propertyAttributes['isZip'] = true;
					?>

						<script>

							<?// add property info to have client-side control on it?>
							(window.top.BX || BX).saleOrderAjax.addPropertyDesc(<?=CUtil::PhpToJSObject(array(
									'id' => intval($arProperties["ID"]),
									'attributes' => $propertyAttributes
								))?>);

						</script>
					<?endif?>
					<?
				}
				?>
			</div>
			</div>
			</div>
			<?
		}
	}
}
?>