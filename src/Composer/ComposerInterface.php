<?php

namespace Omnipay\Sogenactif\Composer;

interface ComposerInterface
{
    /**
     * Compose string based on parameters.
     *
     * @param array $parameters
     */
    public function compose(array $parameters);
}