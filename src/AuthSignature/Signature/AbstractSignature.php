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

/**
 * Abstract signature class that can be used when implementing new strategies
 */
abstract class AbstractSignature implements SignatureInterface
{

    /**
     *
     * @var int Timestamp
     */
    private $timestamp;

    /**
     * Provides the timestamp used for the class
     *
     * @param bool $refresh
     *            Set to TRUE to refresh the cached timestamp
     *
     * @return int
     */
    protected function getTimestamp($refresh = false)
    {
        if (! $this->timestamp || $refresh) {
            $this->timestamp = time();
        }

        return $this->timestamp;
    }
}
