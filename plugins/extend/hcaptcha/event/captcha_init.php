<?php

use Sunlight\User;

return function (array $args): void {
    if (User::isLoggedIn()) {
        return;
    }

    $config = $this->getConfig();
    $content = "<div class='h-captcha' data-sitekey='" . _e($config['site_key']) . "'" . ($config['dark_mode'] ? ' data-theme="dark"' : '') . "></div>";
    $args['value'] = [
        'label' => _lang('captcha.input'),
        'content' => $content,
        'top' => true,
        'class' => ''
    ];
};
