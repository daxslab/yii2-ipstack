<?php

namespace daxslab\ipstack;

use Yii;
use yii\base\Component;
use yii\base\InvalidArgumentException;

/**
 * This is just an example.
 */
class Client extends Component
{
    public $api_key = null;

    protected $base_url = 'http://api.ipstack.com/{ip}?access_key={key}';

    public function init()
    {
        parent::init();
        if ($this->api_key === null) {
            throw new InvalidArgumentException(Yii::t('app', 'API key can\'t be null.'));
        }
    }

    public function getData($ip = null)
    {
        $searchIp = $ip ?? \Yii::$app->request->userIP;
        try {
            $url = str_replace(['{ip}', '{key}'], [$searchIp, $this->api_key], $this->base_url);
            return json_decode(file_get_contents($url), true);
        } catch (\Exception $e) {
            Yii::error(serialize([
                'message' => $e->getMessage(),
                'ip' => $searchIp,
            ]), __METHOD__);
            return null;
        }
    }

}
