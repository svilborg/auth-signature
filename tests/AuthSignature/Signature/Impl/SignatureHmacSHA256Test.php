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

use AuthSignature\Signature\Impl\SignatureHmacSHA256;
use AuthSignature\Credentials\Credentials;
use AuthSignature\Signature\SigningObject;

class SignatureHmacSHA256Test extends \PHPUnit_Framework_TestCase
{

    /**
     */
    public function testSign()
    {
        $object = new SigningObject();
        $object->name = "John";

        $credentials = new Credentials("test", "123ABC");

        $signature = new SignatureHmacSHA256();

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
    public function testSign2()
    {
        $object = new SigningObject();
        $object->host = "digital_assets.comix";
        $object->user_agent = "test";

        $credentials = new Credentials("X123456789", "Y123456789");

        $signature = new SignatureHmacSHA256();

        $result = $signature->sign($object, $credentials);

        $this->assertNotNull($result);
        $this->assertEquals("142c5f4f1b9e79a2b58da6fc855b777d5f621a866ae8491c059d5f6889214d18", $result->getSignature());
        $this->assertEquals($credentials, $result->getCredentials());
    }

    /**
     */
    public function testSignEqual()
    {
        $object1 = new SigningObject();
        $object1->name = "John";

        $credentials1 = new Credentials("test", "123ABC");

        $signature1 = new SignatureHmacSHA256();

        $result1 = $signature1->sign($object1, $credentials1);

        $object2 = new SigningObject();
        $object2->name = "John";

        $credentials2 = new Credentials("test", "123ABC");

        $signature2 = new SignatureHmacSHA256();

        $result2 = $signature1->sign($object2, $credentials2);

        $this->assertNotNull($result1);
        $this->assertNotNull($result2);
        $this->assertEquals($result1, $result2);
        $this->assertEquals($result1->getSignature(), $result2->getSignature());
    }
}

