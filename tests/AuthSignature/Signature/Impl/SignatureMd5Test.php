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

use AuthSignature\Signature\Impl\SignatureMd5;
use AuthSignature\Credentials\Credentials;
use AuthSignature\Signature\SigningObject;

class SignatureMd5Test extends \PHPUnit_Framework_TestCase
{

    /**
     */
    public function testSign()
    {
        $object = new SigningObject();
        $object->name = "John";

        $credentials = new Credentials("test", "123ABC");

        $signature = new SignatureMd5();

        $result = $signature->sign($object, $credentials);

        $this->assertNotNull($result);
        $this->assertNotNull($result->getSignature());
        $this->assertEquals($credentials, $result->getCredentials());
        $this->assertEquals(array(
            "name" => "John"
        ), $result->getContextParams());
    }

    /**
     */
    public function testSignEqual()
    {
        $object1 = new SigningObject();
        $object1->name = "John";

        $credentials1 = new Credentials("test", "123ABC");

        $signature1 = new SignatureMd5();

        $result1 = $signature1->sign($object1, $credentials1);

        $object2 = new SigningObject();
        $object2->name = "John";

        $credentials2 = new Credentials("test", "123ABC");

        $signature2 = new SignatureMd5();

        $result2 = $signature1->sign($object2, $credentials2);

        $this->assertNotNull($result1);
        $this->assertNotNull($result2);
        $this->assertEquals($result1->getSignature(), $result2->getSignature());
    }
}

