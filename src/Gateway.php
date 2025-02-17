<?php

namespace Omnipay\Sogenactif;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    /**
     * @inheritdoc
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantId' => '002001000000001',
            'interfaceVersion' => 'HP_2.39',
            'keyVersion' => 1,
            'secretKey' => '002001000000001_KEY1',
            'url' => 'https://payment-webinit.simu.sips-atos.com',
            'sealAlgorithm' => 'HMAC-SHA-256',
            'responseEncoding' => 'base64',
            'encoding' => 'base64'
        );
    }

    /**
     * @param $merchantId
     * @return $this
     */
    public function setMerchantId($merchantId)
    {
        return $this->setParameter('merchantId', $merchantId);
    }

    /**
     * @param $interfaceVersion
     * @return $this
     */
    public function setInterfaceVersion($interfaceVersion)
    {
        return $this->setParameter('interfaceVersion', $interfaceVersion);
    }

    /**
     * @param $keyVersion
     * @return $this
     */
    public function setKeyVersion($keyVersion)
    {
        return $this->setParameter('keyVersion', $keyVersion);
    }

    /**
     * @param $secretKey
     * @return $this
     */
    public function setSecretKey($secretKey)
    {
        return $this->setParameter('secretKey', $secretKey);
    }

    /**
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        return $this->setParameter('url', $url);
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    /**
     * @return mixed
     */
    public function getKeyVersion()
    {
        return $this->getParameter('keyVersion');
    }

    /**
     * @return mixed
     */
    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }


    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->getParameter('url');
    }

    /**
     * @return mixed
     */
    public function getInterfaceVersion()
    {
        return $this->getParameter('interfaceVersion');
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Sogenactif';
    }

    /**
     * Creates a request with Sips request binary,
     * creating HTML code containing secured links to the gateway
     * The request contains the amount,not modifiable after,
     * therefore the purchase action combines authorization and capture
     *
     * @param array $options
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $options = array())
    {
        return $this->createRequest('\Omnipay\Sogenactif\Message\PurchaseRequest', $options);
    }


    /**
     * Handles a response from the payment gateway
     * Usually a notification a success, a cancellation or
     * the user coming back
     *
     * @param array $options
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $options = array())
    {
        return $this->createRequest('\Omnipay\Sogenactif\Message\CompletePurchaseRequest', $options);
    }

    public function supportsRefund()
    {
        return false;
    }

    public function supportsAuthorize()
    {
        return false;
    }

    public function supportsCapture()
    {
        return false;
    }

    public function supportsAcceptNotification()
    {
        return false;
    }

    public function supportsFetchTransaction()
    {
        return false;
    }

    public function supportsCompleteAuthorize()
    {
        return false;
    }

    public function supportsCompletePurchase()
    {
        return true;
    }
}