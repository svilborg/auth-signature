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
 * Credentials interface
 */
interface CredentialsInterface
{

    /**
     * Returns the authentication key
     *
     * @return string
     */
    public function getKey();

    /**
     * Returns the authentication secret
     *
     * @return string
     */
    public function getSecret();

    /**
     * Get the security token
     *
     * @return string null
     */
    public function getToken();

    /**
     * Set the authentication key
     *
     * @param string $key
     *            Authentication key
     *
     * @return CredentialsInterface
     */
    public function setKey($key);

    /**
     * Set the authentication secret
     *
     * @param string $secret
     *            Authentication secret
     *
     * @return CredentialsInterface
     */
    public function setSecret($secret);

    /**
     * Set the security token
     *
     * @param string $token
     *            Security token
     *
     * @return CredentialsInterface
     */
    public function setToken($token);
}
