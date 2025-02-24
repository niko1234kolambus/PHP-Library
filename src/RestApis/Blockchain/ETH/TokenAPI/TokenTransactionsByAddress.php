<?php

namespace RestApis\Blockchain\ETH\TokenAPI;

use Common\Response;
use RestApis\Blockchain\ETH\Common;

class TokenTransactionsByAddress extends Common {

    protected $network;
    protected $address;

    /**
     * @param $network string
     * @param $address string
     * @param null $limit
     * @return \stdClass
     */
    public function get($network, $address, $limit = null)
    {
        $this->network = $network;
        $this->address = $address;

        $params = [];
        if(!is_null($limit)) {
            $params['limit'] = $limit;
        }

        return (new Response(
            $this->request([
                'method' => 'GET',
                'params' => $params
            ])
        ))->get();
    }

    protected function getEndPoint()
    {
        return $this->endpoint . '/' . $this->network . '/tokens/address/'. $this->address . '/transfers';
    }

}