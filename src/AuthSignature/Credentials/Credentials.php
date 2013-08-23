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
     *
     * @var string Security Token
     */
    protected $token;

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
    public function __construct($key, $secret, $token = null)
    {
        $this->key = trim($key);
        $this->secret = trim($secret);
        $this->token = $token;
    }

    /**
     *
     * @ERROR!!!
     *
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     *
     * @ERROR!!!
     *
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     *
     * @ERROR!!!
     *
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     *
     * @ERROR!!!
     *
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     *
     * @ERROR!!!
     *
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     *
     * @ERROR!!!
     *
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}
