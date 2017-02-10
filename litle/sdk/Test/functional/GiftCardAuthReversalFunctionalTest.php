<?php
/*
 * Copyright (c) 2011 Litle & Co.
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */
namespace litle\sdk\Test\functional;
use litle\sdk\LitleOnlineRequest;
use litle\sdk\XmlParser;
class GiftCardAuthReversalFunctionalTest extends \PHPUnit_Framework_TestCase
{
    public function test_simple_giftCardAuthReversal()
    {
		$hash_in = array (
				'id' => 'id',
				'litleTxnId' => '12345678000',
				/* 'card' => array (
						'type' => 'GC',
						'number' => '4100000000000001',
						'expDate' => '0118',
						'pin' => '1234',
						'cardValidationNum' => '411' 
				)
				, */
				'originalRefCode' => '101',
				'originalAmount' => '34561',
				'originalSystemTraceId' => '33',
				'originalSequenceNumber' => '111111' 
		);

        $initilaize = new LitleOnlineRequest();
        $authReversalResponse = $initilaize->authReversalRequest($hash_in);
        $response = XmlParser::getNode($authReversalResponse,'response');
        $this->assertEquals('000',$response);
    }

}