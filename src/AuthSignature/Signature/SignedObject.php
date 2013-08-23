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
namespace AuthSignature\Signature;

use AuthSignature\Credentials\CredentialsInterface;

/**
 * Implementation of Signature
 */
class SignedObject
{

    private $credentials;

    private $signingKey;

    private $signature;

    private $contextParams;

    /**
     * Constructor
     */
    public function __construct()
    {}

    /**
     * Gets Signing Key
     *
     * @return string
     */
    public function getSigningKey()
    {
        return $this->signingKey;
    }

    /**
     * Gets Signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Gets Credentials
     *
     * @return CredentialsInterface
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Gets Context Params
     *
     * @return array
     */
    public function getContextParams()
    {
        return $this->contextParams;
    }

    /**
     * Sets Signing Key
     *
     * @return self
     */
    public function setSigningKey($signingKey)
    {
        $this->signingKey = $signingKey;

        return $this;
    }

    /**
     * Sets Signature
     *
     * @return self
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Sets Credentials
     *
     * @return self
     */
    public function setCredentials(CredentialsInterface $credentials)
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * Sets Context Params
     *
     * @return self
     */
    public function setContextParams($contextParams)
    {
        $this->contextParams = $contextParams;

        return $this;
    }
}