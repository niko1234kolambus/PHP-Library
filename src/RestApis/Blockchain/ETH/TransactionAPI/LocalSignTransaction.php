<?php

namespace RestApis\Blockchain\ETH\TransactionApi;

use Common\Response;
use RestApis\Blockchain\ETH\Common;

class LocalSignTransaction extends Common {

    protected $network;

    /**
     * @param $network string
     * @param $fromAddress string
     * @param $toAddress string
     * @param $value double
     * @return \stdClass
     */

    public function get($network, $fromAddress, $toAddress, $value)
    {
        $this->network = $network;

        $params = [
            'fromAddress' => $fromAddress,
            'toAddress' => $toAddress,
            'value' => $value
        ];
        return (new Response(
            $this->request([
                'method' => 'GET',
                'params' => $params
            ])
        ))->get();
    }

    protected function getEndPoint()
    {
        return $this->endpoint . '/' . $this->network . '/txs/send';
    }

}