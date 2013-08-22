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
class Signature extends AbstractSignature
{
    /**
     * Get an array of params to be signed
     *
     * @param object $params Parameters for signing
     *
     * @return array
     */
    protected function getParamsToSign(\stdClass $object)
    {
        $params = array();
        foreach ($object as $key => $value) {
            $key = strtolower($key);
            $params[$key] = $value; 
        }

        return $params;
    }

    /**
     * {@inheritdoc}
     */
    public function sign(\stdClass $object, CredentialsInterface $credentials)
    { 
        $this->getTimestamp(true);

        // Add the security token if one is present
        if ($credentials->getToken()) {
           $object->token = $credentials->getToken(); 
        }

        $sign = "";

        // Get all of the params that must be signed (host and x-amz-*) 
        $headers = $this->getParamsToSign($object); 
        foreach ($headers as $key => $value) {
            $sign .= $key . ':' . $value . "\n";
        }

        $sign .= "\n";

        $object->sign = $sign;

        $signature = base64_encode(hash_hmac('sha256', hash('sha256', $sign, true), $credentials->getKey(), true));
    }
}
