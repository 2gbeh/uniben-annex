<?PHP
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
function ERROR_HANDLER ($errorNumber, $errorString, $errorFile, $errorLine) {}
set_error_handler ("ERROR_HANDLER");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>