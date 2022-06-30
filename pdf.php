<?php
ob_start();

use Dompdf\Dompdf;

// include autoloader
require_once 'dompdf/autoload.inc.php';

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Print PDF</title>

<style>
        body {
            color: #2B2000;
            font-family: 'Helvetica';
        }
        .invoice-box {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 4mm;
            border: 0;
            font-size: 12pt;
            line-height: 14pt;
            color: #000;
        }

        table {
            width: 100%;
            line-height: 16pt;
            text-align: left;
            border-collapse: collapse;
        }

        .plist tr td {
            line-height: 12pt;
        }

        .subtotal tr td {
            line-height: 10pt;
            padding: 6pt;
        }

        .subtotal tr td {
            border: 1px solid #ddd;
        }

        .sign {
            text-align: right;
            font-size: 10pt;
            margin-right: 110pt;
        }

        .sign1 {
            text-align: right;
            font-size: 10pt;
            margin-right: 90pt;
        }

        .sign2 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .sign3 {
            text-align: right;
            font-size: 10pt;
            margin-right: 115pt;
        }

        .terms {
            font-size: 9pt;
            line-height: 16pt;
            margin-right:20pt;
        }

        .invoice-box table td {
            padding: 6pt 4pt 5pt 4pt;
            vertical-align: center;

        }

        .invoice-box table.top_sum td {
            padding: 0;
            font-size: 12pt;
        }

        .party tr td:nth-child(3) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20pt;

        }

        table tr.top table td.title {
            font-size: 45pt;
            line-height: 45pt;
            color: #555;
        }

        table tr.information table td {
            padding-bottom: 20pt;
        }

        table tr.heading td {
            background: #515151;
            color: #FFF;
            padding: 6pt;

        }

       table tr.details td {
            padding-bottom: 20pt;
        }

           .invoice-box table tr.item td{
            border: 1px solid #ddd;
        }

        table tr.b_class td{
            border-bottom: 1px solid #ddd;
        }

       table tr.b_class.last td{
            border-bottom: none;
        }

        table tr.total td:nth-child(4) {
            border-top: 2px solid #fff;
            font-weight: bold;
        }

        .myco {
            width: 400pt;
        }

        .myco2 {
            width: 300pt;
        }

        .myw {
            width: 240pt;
            font-size: 14pt;
            line-height: 14pt;

        }

        .mfill {
            background-color: #eee;
        }

         .descr {
            font-size: 10pt;
            color: #515151;
        }

        .tax {
            font-size: 10px;
            color: #515151;
        }

        .t_center {
            text-align: right;

        }
        .party {
        border: #ccc 1px solid;
        }
        img{
            width: 200px;
            height: 160px;          
        }
        ul{
            margin: 0;
            background-color: #81f19a;
        }
        ul li{
            display: inline-block;
        }
        ul .img-li{
            margin-left: 320px;
            margin-bottom: 20px;
        }
        h1{
            float: right;
        }

    </style>

</head>
<body>   
    <div class='row'>
        <div class='col-md-12'>   
            <ul>              
              <li><h1>Gym For Men</h1></li>
              <li class='img-li'><img src='images/gym4.jpg'></li> 
            </ul>
            <table  class='plist' border='1' cellpadding='0' cellspacing='0'>
                <tr class='heading'>
                    <th>S.No</th>
                    <th>Plan</th>
                    <th>Package</th>
                    <th>Trainer</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>";
    include('config.php');
    if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    $count = 1;
    $select = "SELECT m.*, pl.plan, pa.package, tr.trainer, sc.start_date, sc.end_date FROM members as m join plans as pl on pl.id = m.plan join packages as pa on pa.id = m.package join trainers as tr on tr.id = m.trainer join schedul as sc on sc.member_id = m.id WHERE m.id = '$id'";
    $result = mysqli_query($link, $select);
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
$html.="<tr>            
            <td>".$row["id"]."</td>
            <td>".$row["plan"]."</td>
            <td>".$row["package"]."</td>
            <td>".$row["trainer"]."</td>
            <td>".date("d M Y",strtotime($row['start_date']))."</td>
            <td>".date("d M Y",strtotime($row['end_date']))."</td>
        </tr>";
    $count++;
}}}
$html .="</table>           
        </div>
    </div>
</body>
</html>";

 $dompdf->loadHtml($html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);
?>