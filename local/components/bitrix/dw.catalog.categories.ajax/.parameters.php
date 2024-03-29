<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=array(
	"-" => GetMessage("IBLOCK_ANY"),
);
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
{
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_IBLOCK"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"MULTIPLE"=>"N",
		),
		
		"IBLOCK_BINDING" => array(
			'PARENT' => "BASE",
			'NAME' => GetMessage('IBLOCK_BINDING'),
			'TYPE' => 'LIST',
			'VALUES' => array(
				'section-images' => GetMessage('IBLOCK_BINDING_SECTION'),
				'element' => GetMessage('IBLOCK_BINDING_ELEMENT')
				'element' => GetMessage('IBLOCK_BINDING_ELEMENT')
			),
			'MULTIPLE' => 'N',
			'DEFAULT' => 'section'
		),
		"LIMIT" => array(
			'PARENT' => "BASE",
			'NAME' => 'Количество элементов',
			'TYPE' => 'STRING',
			'MULTIPLE' => 'N',
			'DEFAULT' => '3'
		),	
		"SECTION" => array(
			'PARENT' => "BASE",
			'NAME' => 'Номер раздела',
			'TYPE' => 'STRING',
			'MULTIPLE' => 'N',
			'DEFAULT' => ''
		),
		"CACHE_TIME"  =>  Array("DEFAULT"=>36000),
		"CACHE_GROUPS" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BPR_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
	),
);
?>
