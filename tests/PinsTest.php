<?php

namespace seregazhuk\tests;

use seregazhuk\PinterestBot\Helpers\SearchHelper;
use seregazhuk\PinterestBot\Providers\Pins;

class PinsTest extends ProviderTest
{
    /**
     * @var Pins
     */
    protected $provider;
    protected $providerClass = Pins::class;

    //public function testLikeAndUnlike()
    //{
    //    $response = $this->createApiResponse();
    //
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->mock->expects($this->at(2))->method('exec')->willReturn(null);
    //    $this->setProperty('request', $this->mock);
    //    $this->assertTrue($this->provider->like(1111));
    //    $this->assertFalse($this->provider->like(1111));
    //}
    //
    //public function testUnlike()
    //{
    //    $response = $this->createApiResponse();
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->mock->expects($this->at(2))->method('exec')->willReturn(null);
    //    $this->setProperty('request', $this->mock);
    //    $this->assertTrue($this->provider->unLike(1111));
    //    $this->assertFalse($this->provider->unLike(1111));
    //}
    //
    //
    //public function testCreateComment()
    //{
    //    $response = $this->createApiResponse();
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->mock->expects($this->at(3))->method('exec')->willReturn(false);
    //    $this->setProperty('request', $this->mock);
    //    $this->assertTrue($this->provider->comment(1111, 'comment text'));
    //    $this->assertFalse($this->provider->comment(1111, 'comment text'));
    //}
    //
    //public function testDeleteComment()
    //{
    //    $response = $this->createApiResponse();
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->mock->expects($this->at(3))->method('exec')->willReturn(false);
    //    $this->setProperty('request', $this->mock);
    //
    //    $this->assertTrue($this->provider->deleteComment(1111, 1111));
    //    $this->assertFalse($this->provider->deleteComment(1111, 1111));
    //}
    //
    //public function testPin()
    //{
    //    $response = $this->createPinCreationResponse();
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->setProperty('request', $this->mock);
    //
    //    $pinSource = 'http://example.com/image.jpg';
    //    $pinDescription = 'Pin Description';
    //    $boardId = 1;
    //    $this->assertNotFalse($this->provider->create($pinSource, $boardId, $pinDescription));
    //    $this->assertFalse($this->provider->create($pinSource, $boardId, $pinDescription));
    //}
    //
    //public function testRepin()
    //{
    //    $response = $this->createPinCreationResponse();
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->setProperty('request', $this->mock);
    //
    //    $repinId = 11;
    //    $pinDescription = 'Pin Description';
    //    $boardId = 1;
    //
    //    $this->assertNotFalse($this->provider->repin($repinId, $boardId, $pinDescription));
    //    $this->assertFalse($this->provider->repin($repinId, $boardId, $pinDescription));
    //}
    //
    //public function testDeletePin()
    //{
    //    $response = $this->createApiResponse();
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn($response);
    //    $this->setProperty('request', $this->mock);
    //    $this->assertNotFalse($this->provider->delete(1));
    //    $this->assertFalse($this->provider->delete(1));
    //}
    //
    //public function testGetPinInfo()
    //{
    //    $response = $this->createApiResponse();
    //    $this->mock->expects($this->at(0))->method('exec')->willReturn($response);
    //    $this->mock->expects($this->at(1))->method('exec')->willReturn([]);
    //    $this->setProperty('request', $this->mock);
    //    $this->assertNotNull($this->provider->info(1));
    //    $this->assertFalse($this->provider->info(1));
    //}

    public function testSearch()
    {
        $response['module']['tree']['data']['results'] = [
            ['id' => 1],
            ['id' => 2],
        ];

        $expectedResultsNum = count($response['module']['tree']['data']['results']);
        $this->mock->method('exec')->willReturn($response);
        $this->setProperty('request', $this->mock);
        $res = iterator_to_array($this->provider->search('dogs'), 1);
        print_r($res);
        die();
        $this->assertCount($expectedResultsNum, $res[0]);
    }

    /**
     * Creates a pin creation response from Pinterest
     * @return array
     */
    protected function createPinCreationResponse()
    {
        $data = array('data' => array('id' => 1));

        return $this->createApiResponse($data);
    }

    /**
     * Creates a response from Pinterest
     * @param array $data
     * @return array
     */
    protected function createApiResponse($data = ['data'=>'success'])
    {
        return parent::createApiResponse($data);
    }
}