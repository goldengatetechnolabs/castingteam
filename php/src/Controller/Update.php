<?php

class Controller_Update extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        if ($this->isLogged()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (isset($_POST['name']) and !empty($_POST['name'])) {
                    $data['name'] = htmlspecialchars($_POST['name']);
                }

                if (isset($_POST['email']) and !empty($_POST['email'])) {
                    $data['email'] = htmlspecialchars($_POST['email']);
                }

                if (isset($_POST['password']) and !empty($_POST['password'])) {
                    $data['password'] = md5(htmlspecialchars($_POST['password']));
                }

                if (isset($_POST['company']) and !empty($_POST['company'])) {
                    $data['company'] = htmlspecialchars($_POST['company']);
                }

                if (isset($_POST['sector']) and !empty($_POST['sector'])) {
                    $data['sector'] = htmlspecialchars($_POST['sector']);
                }

                if (isset($_POST['phone']) and !empty($_POST['phone'])) {
                    $data['phone'] = htmlspecialchars($_POST['phone']);
                }

                if (isset($_POST['surname']) and !empty($_POST['surname'])) {
                    $data['surname'] = htmlspecialchars($_POST['surname']);
                }

                $data['access'] = 0;
                $data['id'] = $_SESSION[SESSION_NAME_SITE_LOGIN];
                $result = $this->getController()->updateUser($data);

                if ($result) {
                    if ($result === true) {
                        $this->getSmarty()->assign('registration_result', 'Success');
                    }else{
                        $this->getSmarty()->assign('registration_result', $result);
                    }
                } else {
                    $this->getSmarty()->assign('registration_result', 'Fail');
                }

                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }

        throw new Exception_Security();
    }
}
