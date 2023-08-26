<?php

use Sunlight\User;

return function (array $args) {
    if (User::isLoggedIn()) {
        return;
    }
    $args['js_before'] .= '<script src="https://hcaptcha.com/1/api.js" async defer></script>' . "\n";
};
