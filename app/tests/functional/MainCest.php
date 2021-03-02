<?php 
class MainCest
{
    public function testSendAsyncMessage(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('send',['type' => 'async', 'data' => rand(0, microtime(true))]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        
    }

    public function testSendQueueMessage(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('send',['type' => 'queue', 'data' => rand(0, microtime(true))]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        
    }

    public function testSendMessage(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('send',['type' => 'async', 'data' => rand(0, microtime(true))]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
    }
}