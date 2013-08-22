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
 * Basic implementation of the AWSCredentials interface that allows callers to
 * pass in the AWS access key and secret access in the constructor.
 */
class Credentials implements CredentialsInterface 
{

    /**
     * @var string Authentication Key
     */
    protected $key;
    /**
     * @var string Authentication Secret
     */
    protected $secret;
    /**
     * @var string  Security Token
     */
    protected $token; 

    /**
     * Constructor of new Credentials Object
     *
     * @param string $key    Authentication Key
     * @param string $secret Authentication Secret
     * @param string $token  Security Token
     */
    public function __construct($authKey, $secret, $token = null)
    {
        $this->key = trim($authKey);
        $this->secret = trim($secret); 
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * {@inheritdoc}
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function setKey($authKey)
    {
        $this->authKey = $authKey; 

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setSecret($secret) 
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}
