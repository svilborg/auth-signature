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

namespace AuthSignature\Tests\Credentials;

use AuthSignature\Credentials\Credentials;

class CredentialsTest extends \PHPUnit_Framework_TestCase 
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testEmpty()
    {
        $this->assertTrue(true);
    }

    /**
     * @covers AuthSignature\Credentials\Credentials::__construct
     * @covers AuthSignature\Credentials\Credentials::getKey
     * @covers AuthSignature\Credentials\Credentials::setSecret
     * @covers AuthSignature\Credentials\Credentials::getToken
     */
    public function testCredentials() 
    {
        $c = new Credentials('test', '123');
        $this->assertEquals('test', $c->getKey());
        $this->assertEquals('123', $c->getSecret());
        $this->assertNull($c->getToken());  
    } 

    protected function tearDown()
    {
        parent::tearDown();
    }
}
