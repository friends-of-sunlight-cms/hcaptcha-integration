<?php

return function (array $args) {
    $config = $this->getConfig();
    if (!isset($config['site_key'], $config['secret_key'])) {
        return;
    }
    $this->enableEventGroup('hcaptcha');
};
