<?php
/**
* Licensed to the Apache Software Foundation (ASF) under one or more
* contributor license agreements. See the NOTICE file distributed with
* this work for additional information regarding copyright ownership.
* The ASF licenses this file to You under the Apache License, Version 2.0
* (the "License"); you may not use this file except in compliance with
* the License. You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
namespace AuthSignature\Signature\Impl;

use AuthSignature\Credentials\CredentialsInterface;
use AuthSignature\Signature\AbstractSignature;
use AuthSignature\Signature\SignedObject;
use AuthSignature\Signature\SigningObject;

/**
 * HmacSHA256 Implementation of Signature
 */
class SignatureHmacSHA256 extends AbstractSignature
{

    /**
     *
     * @see \AuthSignature\Signature\SignatureInterface::sign()
     *
     * @return SignedObject
     */
    public function sign(SigningObject $object, CredentialsInterface $credentials)
    {
        $params = $this->getParamsToSign($object);

        $stringToSign = $this->buildSigningString($params);

        $signingKey = $this->buildSigningKey($params, $credentials->getSecret());
        $signature = $this->buildSignature($stringToSign, $signingKey);

        $signedObject = parent::getSignedObjectFactory($credentials, $signingKey, $signature, $params);

        return $signedObject;
    }

    /**
     * Generates a String that will be signed from the selected parameters
     *
     * @param array $params
     * @return string
     */
    private function buildSigningString($params)
    {
        return implode("|", $params);
    }

    /**
     * Build Signing key from params and a secret
     *
     * @param string $params
     * @param string $secret
     * @return string
     */
    private function buildSigningKey($params, $secret = "")
    {
        $result = hash('sha256', $secret);

        foreach ($params as $key => $value) {
            $result .= hash('sha256', $value);
        }

        return $result;
    }

    /**
     * Gets a Signature of a string using a key
     *
     * @param string $stringToSign
     * @param string $signingKey
     * @return string
     */
    private function buildSignature($stringToSign, $signingKey)
    {
        $result = hash_hmac('sha256', $stringToSign, $signingKey);
        return $result;
    }
}
