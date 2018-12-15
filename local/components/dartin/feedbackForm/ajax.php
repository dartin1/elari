<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?
$responseArr = array();
if (!empty($_POST)) {

    if (CModule::IncludeModule("iblock")) {
        $props = array();
        $arEventFields = array();

        $iBlockID = $_POST["IBLOCK_ID"];
        $name = $_POST['NAME'];
        $postEvent = $_POST["EVENT_NAME"];
        unset($_POST["EVENT_NAME"]);
        unset($_POST["IBLOCK_ID"]);

        foreach ($_POST as $key => $val) {
            if ($key != 'EVENT_NAME') {
                $val = htmlspecialchars(trim($val));
                $props[$key] = $val;
                $arEventFields[strtoupper($key)] = $val;
            }
        }

        $newRecordArr['IBLOCK_ID'] = $iBlockID;
        $newRecordArr['PROPERTY_VALUES'] = $props;
        $newRecordArr['NAME'] = $name;
        $newRecordArr['ACTIVE'] = 'N';
        $newRecord = new CIBlockElement;

        $responseArr['NEW_RECORD'] = $newRecordArr;
        $responseArr['$arEventFields'] = $arEventFields;

        if ($recordID = $newRecord->Add($newRecordArr)) {
            if ($postEvent) {
                if ($cEventID = CEvent::Send($postEvent, "s1", $arEventFields, 'Y'))
                    $responseArr['SUCCESS'] = 'Success';
                else
                    $responseArr['ERROR'] = 'POST ERROR';
            }
        } else
            $responseArr['ERROR'] = $newRecord->LAST_ERROR;

    } else
        $responseArr['ERROR'] = "IBLOCK ERROR";

} else
    $responseArr['ERROR'] = "DATA ERROR";

header('Content-type: application/json');
echo json_encode($responseArr);
?>