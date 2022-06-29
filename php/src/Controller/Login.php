<?php

class Controller_Login extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        if ($request->getServer()['REQUEST_METHOD'] === 'POST') {
            $password = md5(htmlspecialchars($this->getValueOrThrowException($request->getPost(), 'password')));
            $result = $this->getController()->getUserByEmail(
                htmlspecialchars(
                    $this->getValueOrThrowException(
                        $request->getPost(),
                        'email'
                    )
                )
            );

            if (
                $result &&
                $result['password'] == $password &&
                $result['approved'] == 1
            ) {
                Flight::bg()->siteLogin($result['id']);
                header("Location: " . Flight::get('protocol') . '://' . $_SERVER['HTTP_HOST'] . '/' . Flight::get('taal') .'/mycastingteam/?login=success');
            } else {
                header("Location: " . rtrim(preg_replace('/\?.+/ui', '', $_SERVER['HTTP_REFERER']), '/') . '/?login=fail');
            }

            exit;
        }
    }
}
