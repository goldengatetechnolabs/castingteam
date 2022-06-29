<?php

class Controller_Cms_Vips extends Core_Controller
{
    public function overview()
    {
        $emails = array();
        $query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

        while($r = $query->fetch_array()) {
            $emails[$r['id']] = $r;
        }

        $this->smarty->assign('emails', $emails);

        $archief = array();
        $query = Flight::db()->query("SELECT title, id, DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum_tonen FROM model_mails ORDER BY timestamp DESC LIMIT 10");

        while ($r = $query->fetch_array()) {
            $archief[$r['id']] = $r;
        }

        $this->smarty->assign('archief', $archief);
        $this->smarty->assign('include_tabs', 'cms/vips/tabs.tpl');
        $this->smarty->assign('tab_active', 'overview');
        $this->smarty->assign('include', 'cms/vips/overview.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }


    public function new_registrations()
    {
        $emails = array();
        $query = Flight::db()->query("SELECT * FROM emails ORDER BY titel");

        while($r = $query->fetch_array()) {
            $emails[$r['id']] = $r;
        }

        $this->smarty->assign('emails', $emails);
        $archief = array();
        $query = Flight::db()->query("SELECT title, id, DATE_FORMAT(timestamp, '%d/%m/%Y') AS datum_tonen FROM model_mails ORDER BY timestamp DESC LIMIT 10");

        while($r = $query->fetch_array()) {
            $archief[$r['id']] = $r;
        }

        $this->smarty->assign('archief', $archief);
        $this->smarty->assign('include_tabs', 'cms/vips/tabs.tpl');
        $this->smarty->assign('tab_active', 'new_registrations');
        $this->smarty->assign('include', 'cms/vips/new_registrations.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (
                isset($_POST['name']) &&
                !empty($_POST['name'])
            ) {
                $data['name'] = htmlspecialchars($_POST['name']);
            }

            if (isset($_POST['email']) &&
                !empty($_POST['email'])
            ) {
                $data['email'] = htmlspecialchars($_POST['email']);
            }

            if (
                isset($_POST['password']) &&
                !empty($_POST['password'])
            ) {
                $data['password']= md5(htmlspecialchars($_POST['password']));
            }

            if (
                isset($_POST['company']) &&
                !empty($_POST['company'])
            ){
                $data['company'] = htmlspecialchars($_POST['company']);
            }

            if (
                isset($_POST['sector']) &&
                !empty($_POST['sector'])
            ){
                $data['sector'] = htmlspecialchars($_POST['sector']);
            }

            if (
                isset($_POST['phone']) &&
                !empty($_POST['phone'])
            ){
                $data['phone'] = htmlspecialchars($_POST['phone']);
            }

            if (
                isset($_POST['city']) &&
                !empty($_POST['city'])
            ){
                $data['city'] = htmlspecialchars($_POST['city']);
            }

            if (
                isset($_POST['country']) &&
                !empty($_POST['country'])
            ){
                $data['country'] = htmlspecialchars($_POST['country']);
            }

            if (isset($_POST['postal']) &&
                !empty($_POST['postal'])
            ){
                $data['postal'] = htmlspecialchars($_POST['postal']);
            }

            if (!empty($_POST['remark'])){
                $data['remark'] = htmlspecialchars($_POST['remark']);
            }

            if (!empty($_POST['address'])) {
                $data['address'] = htmlspecialchars($_POST['address']);
            }

            if (!empty($_POST['surname'])) {
                $data['surname'] = htmlspecialchars($_POST['surname']);
            }

            $data['access'] = 0;
            $result = $this->controller->registerUser($data);

            if ($result) {
                if ($result === true) {
                    $this->smarty->assign('registration_result', 'Success');
                } else {
                    $this->smarty->assign('registration_result', $result);
                }
            } else {
                $this->smarty->assign('registration_result', 'Fail');
            }
        }

        $this->smarty->assign('include_tabs', 'cms/vips/tabs.tpl');
        $this->smarty->assign('tab_active', 'add_user');
        $this->smarty->assign('include', 'cms/vips/registration.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }
}
