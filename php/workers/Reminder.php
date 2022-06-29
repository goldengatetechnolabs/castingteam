<?php

require_once __DIR__ . '/InitWorker.php';

function sendEmailToGroup($models, $template) {
    foreach ($models as $model) {
        $user = new Entity_Model($model['model_id']);
        $email = (new Repository_Email())->findByCode($template);

        if ($user->isActive()) {
            (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);
        }
    }
}

$date = new DateTime();
$models = DBController::getInstance()->getModelsByParam('geboortedatum', $date->format('-m-d'));
sendEmailToGroup($models, 'birthday');

$date->modify("+ 3 months");
$models = DBController::getInstance()->getModelsByParam('geboortedatum', $date->format('-m-d'));
sendEmailToGroup($models, 'reminder');

$date->modify("+ 6 months");
$models = DBController::getInstance()->getModelsByParam('geboortedatum', $date->format('-m-d'));
sendEmailToGroup($models, 'reminder');
