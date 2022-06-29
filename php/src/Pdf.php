<?php

require_once __DIR__ . '/../core/lib/tcpdf/config/lang/eng.php';
require_once __DIR__ . '/../core/lib/tcpdf/tcpdf.php';

class Pdf {

    const MODEL_TEMPLATE = 'templates/pdf/model.tpl';

    const MODEL_VIP_TEMPLATE = 'templates/pdf/model_vip.tpl';

    const MODEL_BORDERFIELD_TEMPLATE = 'templates/pdf/model_bordermodels.tpl';

    const RATES_TEMPLATE = 'templates/pdf/rates.tpl';

    function ratesPdf() {

        if (
            isset($_SESSION[SESSION_NAME_SITE_LOGIN]) &&
            is_numeric($_SESSION[SESSION_NAME_SITE_LOGIN])
        ) {
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Borderfield');
            $pdf->SetTitle('');
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetFont('dejavusans', '', 11, '', true);
            $pdf->AddPage();
            $html = Flight::smarty()->fetch(self::RATES_TEMPLATE);
            $pdf->writeHTML($html, true, 0, true, 0);
            $pdf->Output('example_001.pdf', 'I');
        } else {
            Flight::notFound();
        }
    }

    function modelPdf($template) {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = Flight::db()->real_escape_string($_GET['id']);
            $model = Flight::db()->query("
                SELECT *,
                       DATE_FORMAT(datum, '%d') AS geboortedatum_dag,
                       DATE_FORMAT(datum, '%m') AS geboortedatum_maand,
                       DATE_FORMAT(datum, '%Y') AS geboortedatum_jaar,
                       DATE_FORMAT(geboortedatum, '%e') AS check_dag,
                       DATE_FORMAT(geboortedatum, '%c') AS check_maand,
                       DATE_FORMAT(geboortedatum, '%Y') AS check_jaar
                FROM model
                WHERE model_id=" . $id
                    )->fetch_array();

            $leeftijd = (date("md", date("U", mktime(0, 0, 0, $model['check_maand'], $model['check_dag'], $model['check_jaar']))) > date("md") ? ((date("Y") - $model['check_jaar']) - 1) : (date("Y") - $model['check_jaar']));
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Borderfield');
            $pdf->SetTitle('');
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetFont('dejavusans', '', 11, '', true);
            $pdf->AddPage();
            $controller = DBController::getInstance();
            $images = $controller->getModelImagesById($_GET['id'], false, true);
            Flight::smarty()->assign('photos', $images);
            Flight::smarty()->assign('leeftijd', $leeftijd);
            Flight::smarty()->assign('model', $model);
            $html = Flight::smarty()->fetch($template);
            $pdf->writeHTML($html, true, 0, true, 0);

           if (isset($_GET['model_name'])) {
               $pdf->Output($_GET['model_name'].'_'.$_GET['id'].'.pdf', 'I');
           } else {
               $pdf->Output($_GET['id'].'_castingTeam'.'.pdf', 'I');
           }
        } else {
            Flight::notFound();
        }
    }
}
