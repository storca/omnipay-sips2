<?php

namespace Omnipay\SipsPayPage\Composer;

class ParameterComposer implements ComposerInterface
{
    /**
     * @param array $parameters
     * @return string base64-encoded
     */
    public function compose(array $parameters)
    {
        $parametersGroups = array();
        foreach ($parameters as $key => $value) {
            $parametersGroups[] = $key . '=' . $value;
        }

        return implode('|', $parametersGroups);
    }
}