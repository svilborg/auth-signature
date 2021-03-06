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
namespace AuthSignature\Credentials;

/**
 * Generic Credentials class
 */
class Credentials implements CredentialsInterface
{

    /**
     *
     * @var string Authentication Key
     */
    protected $key;

    /**
     *
     * @var string Authentication Secret
     */
    protected $secret;

    /**
     * Constructor of new Credentials Object
     *
     * @param string $key
     *            Authentication Key
     * @param string $secret
     *            Authentication Secret
     * @param string $token
     *            Security Token
     */
    public function __construct($key, $secret)
    {
        $this->key = trim($key);
        $this->secret = trim($secret);
    }

    /**
     * Get Key
     * @see \AuthSignature\Credentials\CredentialsInterface::getKey()
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get Secret
     * @see \AuthSignature\Credentials\CredentialsInterface::getSecret()
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set Security Key
     * @see \AuthSignature\Credentials\CredentialsInterface::setKey()
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Set Secret
     * @see \AuthSignature\Credentials\CredentialsInterface::setSecret()
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }
}
