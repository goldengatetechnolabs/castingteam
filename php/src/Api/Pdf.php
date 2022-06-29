<?php

class Api_Pdf extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function get(Http_Request $request)
    {
        $pdf = new Pdf();

        if ($request->getSiteType() == Enum_Site::BORDERFIELD) {
            $pdf->modelPdf(Pdf::MODEL_BORDERFIELD_TEMPLATE);
            exit();
        }

        if ($this->isLogged()) {
            $pdf->modelPdf(Pdf::MODEL_VIP_TEMPLATE);
            exit();
        }

        $pdf->modelPdf(Pdf::MODEL_TEMPLATE);
        exit();
    }
}
