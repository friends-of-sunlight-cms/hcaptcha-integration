<?php

namespace SunlightExtend\Hcaptcha;

use Sunlight\Plugin\Action\ConfigAction as BaseConfigAction;
use Sunlight\Util\Form;
use Sunlight\Util\Request;

class ConfigAction extends BaseConfigAction
{
    protected function getFields(): array
    {
        $config = $this->plugin->getConfig();

        return [
            'site_key' => [
                'label' => _lang('hcaptcha.site_key'),
                'input'=> '<input type="text" name="config[site_key]" value="' . Request::post('site_key', $config['site_key']) . '" class="inputbig">',
                'type' => 'text'
            ],
            'secret_key' => [
                'label' => _lang('hcaptcha.secret_key'),
                'input'=> '<input type="text" name="config[secret_key]" value="' . Request::post('secret_key', $config['secret_key']) . '" class="inputbig" placeholder="0x....">',
                'type' => 'text'
            ],
            'dark_mode' => [
                'label' => _lang('hcaptcha.dark_mode'),
                'input' => '<input type="checkbox" name="config[dark_mode]" value="1"' . Form::loadCheckbox('config', $config['dark_mode'], 'dark_mode')) . '>',
                'type' => 'checkbox'
            ]
        ];
    }
}
