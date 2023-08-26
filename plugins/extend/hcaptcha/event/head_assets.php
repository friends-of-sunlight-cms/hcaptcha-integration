<?php

use Sunlight\User;

return function (array $args) {
    if (User::isLoggedIn()) {
        return;
    }
    $args['js_before'] .= '<script src="' . $this->getAssetPath('public/js/api.js') . '" async defer></script>' . "\n";
};
