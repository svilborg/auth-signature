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
namespace AuthSignature\Tests\Signature;

use AuthSignature\Signature\Signature;
use AuthSignature\Signature\SignedObject;
use AuthSignature\Credentials\Credentials;

class SignedObjectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers AuthSignature\Signature\SignedObject::__construct()
     * @covers AuthSignature\Signature\SignedObject::getSigningKey()
     * @covers AuthSignature\Signature\SignedObject::getSignature()
     * @covers AuthSignature\Signature\SignedObject::getContextParams()
     * @covers AuthSignature\Signature\SignedObject::getCredentials()
     */
    public function testCreationEmpty()
    {
        $object = new SignedObject();

        $this->assertNotNull($object);
        $this->assertNull($object->getSigningKey());
        $this->assertNull($object->getSignature());
        $this->assertNull($object->getContextParams());
        $this->assertNull($object->getCredentials());
    }

    /**
     * @covers AuthSignature\Signature\SignedObject::__construct()
     * @covers AuthSignature\Signature\SignedObject::getSigningKey()
     * @covers AuthSignature\Signature\SignedObject::getSignature()
     * @covers AuthSignature\Signature\SignedObject::getContextParams()
     * @covers AuthSignature\Signature\SignedObject::getCredentials()
     */
    public function testCreationParams()
    {
        $object = new SignedObject();

        $object->setSignature("test");
        $object->setSigningKey("key");

        $this->assertNotNull($object);
        $this->assertEquals("test", $object->getSignature());
        $this->assertEquals("key", $object->getSigningKey());
        $this->assertEquals(array(
            "name",
            "address"
        ), $object->setContextParams(array(
            "name",
            "address"
        ))
            ->getContextParams());
        $this->assertNull($object->getCredentials());
    }

    /**
     * @covers AuthSignature\Signature\SignedObject::__construct()
     * @covers AuthSignature\Signature\SignedObject::setCredentials()
     * @covers AuthSignature\Signature\SignedObject::getCredentials()
     */
    public function testCredentials()
    {
        $object = new SignedObject();

        $credentials = new Credentials("testKey", "testSecret");

        $object->setSignature("test");
        $object->setCredentials($credentials);

        $this->assertEquals($credentials, $object->setCredentials($credentials)
            ->getCredentials());
    }
}
