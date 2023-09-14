<?php

namespace SunlightExtend\Hcaptcha;

use Sunlight\Plugin\Action\ConfigAction as BaseConfigAction;
use Sunlight\Util\Form;

class ConfigAction extends BaseConfigAction
{
    protected function getFields(): array
    {
        $config = $this->plugin->getConfig();

        return [
            'site_key' => [
                'label' => _lang('hcaptcha.site_key'),
                'input'=> '<input type="text" name="config[site_key]" value="' . Form::restorePostValue('site_key', $config['site_key'], false) . '" class="inputbig">',
                'type' => 'text'
            ],
            'secret_key' => [
                'label' => _lang('hcaptcha.secret_key'),
                'input'=> '<input type="text" name="config[secret_key]" value="' . Form::restorePostValue('secret_key', $config['secret_key'], false) . '" class="inputbig" placeholder="0x....">',
                'type' => 'text'
            ],
            'dark_mode' => [
                'label' => _lang('hcaptcha.dark_mode'),
                'input' => '<input type="checkbox" name="config[dark_mode]" value="1"' . Form::activateCheckbox($config['dark_mode']) . '>',
                'type' => 'checkbox'
            ]
        ];
    }
}
