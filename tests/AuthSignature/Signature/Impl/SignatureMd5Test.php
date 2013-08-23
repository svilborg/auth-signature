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
namespace AuthSignature\Tests\Signature\Impl;

use AuthSignature\Signature\Signature;
use AuthSignature\Signature\Impl\SignatureMd5;
use AuthSignature\Credentials\Credentials;

class SignatureMd5Test extends \PHPUnit_Framework_TestCase
{

    /**
     */
    public function testSign()
    {
        $object = new \stdClass();
        $object->name = "John";

        $credentials = new Credentials("test", "123ABC");

        $signature = new SignatureMd5();

        $result = $signature->sign($object, $credentials);

        $this->assertNotNull($result);
    }
}
