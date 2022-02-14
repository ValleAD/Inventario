<?php
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('
<h1>Tabla de ejemplo</h1>
<table>
<tr>
<th>jksdfskjf</th>
<th>jksdfskjf</th>
<th>jksdfskjftyhrtrtrjfhwGYFWPIEGFÍWEGF9´W  EUFG´WEFGBWFVB9´WEF9WÉUFG9WEUFÓWFGB9    WUEGF9PWUEFGB9UPWOEGF9PUWEOGF</th>
<th>jksdfskjftyhrtrtrjfhwGYFWPIEGFÍWEGF9´W  EUFG´WEFGBWFVB9´WEF9WÉUFG9WEUFÓWFGB9    WUEGF9PWUEFGB9UPWOEGF9PUWEOGF</th>
</tr>
<tr>
<td>avsd</td>
<td>avsd</td>
<td>avsd</td>
</tr>
</table>');
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Webslesson",array("Attachment"=>0));
?>