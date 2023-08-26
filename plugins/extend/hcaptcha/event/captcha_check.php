<?php

use Sunlight\Core;
use Sunlight\User;

return function (array $args) {
    if (User::isLoggedIn()) {
        return;
    }

    if (empty($_POST['h-captcha-response'])) {
        $args['value'] = false;
        return;
    }

    $config = $this->getConfig();

    $data = [
        'secret' => $config['secret_key'],
        'response' => $_POST['h-captcha-response'],
        'remoteip' => Core::getClientIp()
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded\n",
            'content' => http_build_query($data),
            'ssl' => [
                'verify_peer' => true,
            ],
            'ignore_errors' => true
        ]];

    $context = stream_context_create($options);
    $result = json_decode(file_get_contents('https://hcaptcha.com/siteverify', false, $context), true);

    $args['value'] = $result['success'] ?? false;
};
