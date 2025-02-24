<?php

namespace RestApis\Blockchain\ETH\TokenAPI;

use Common\Response;
use RestApis\Blockchain\ETH\Common;

class TransferTokens extends Common {

    protected $network;

    /**
     * @param $network string
     * @param $fromAddress string
     * @param $toAddress string
     * @param $contract string
     * @param $password string
     * @param $gasPrice int
     * @param $gasLimit int
     * @param $token double
     * @return \stdClass
     */
    public function get($network, $fromAddress, $toAddress, $contract, $password, $gasPrice, $gasLimit, $token)
    {
        $this->network = $network;

        $params = [
            'fromAddress' => $fromAddress,
            'toAddress' => $toAddress,
            'contract' => $contract,
            'password' => $password,
            'gasPrice' => $gasPrice,
            'gasLimit' => $gasLimit,
            'token' => $token
        ];

        return (new Response(
            $this->request([
                'method' => 'POST',
                'params' => $params
            ])
        ))->get();
    }

    protected function getEndPoint()
    {
        return $this->endpoint . '/' . $this->network . '/tokens/transfer';
    }

}