<?php

namespace SunlightExtend\Hcaptcha;

use Sunlight\Plugin\Action\ConfigAction as BaseConfigAction;
use Sunlight\Util\Form;
use Sunlight\Util\Request;

class ConfigAction extends BaseConfigAction
{
    protected function getFields(): array
    {
        $config = $this->plugin->getConfig();dump(Form::loadCheckbox('dark_mode', $config['dark_mode'], 'config'));

        return [
            'site_key' => [
                'label' => _lang('hcaptcha.site_key'),
                'input' => Form::input('text', 'config[site_key]', Request::post('site_key', $config['site_key']), ['class' => 'inputbig']),
                'type' => 'text',
            ],
            'secret_key' => [
                'label' => _lang('hcaptcha.secret_key'),
                'input' => Form::input('text', 'config[secret_key]', Request::post('secret_key', $config['secret_key']), ['class' => 'inputbig', 'placeholder' => '0x....']),
                'type' => 'text',
            ],
            'dark_mode' => [
                'label' => _lang('hcaptcha.dark_mode'),
                'input' => Form::input('checkbox', 'config[dark_mode]', '1', ['checked' => Form::loadCheckbox('config', $config['dark_mode'], 'dark_mode')]),
                'type' => 'checkbox',
            ],
        ];
    }
}
