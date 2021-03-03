<?php 
class MainCest
{
    public function testSendAsyncMessage(FunctionalTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendAjaxPostRequest('send',[json_encode(['type' => 'async', 'data' => rand(0, microtime(true))])]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        
    }
    /*
    public function testSendQueueMessage(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('send',['type' => 'queue', 'data' => rand(0, microtime(true))]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
    }*/

    /*
    public function testSendUndefinedMessage(FunctionalTester $I)
    {

        $I->expectThrowable(\app\components\UndefinedJobException::class, function(){
            $I->sendAjaxPostRequest('send',['type' => 'asdfasdf', 'data' => rand(0, microtime(true))]);
            var_dump($I->grabResponse());
        });
    }*/

    /*
    public function testSendTwoAsyncMessages(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('send',['type' => 'queue', 'data' => rand(0, microtime(true))]);
        sleep(1);
        $I->sendAjaxPostRequest('send',['type' => 'queue', 'data' => rand(0, microtime(true))]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
    }*/
}