<?php
declare(strict_types=1);

namespace Stk2k\PhitFlyer\Test;

use PHPUnit\Framework\TestCase;

use Stk2k\PhitFlyer\PhitFlyerClient;
use Stk2k\PhitFlyer\PhitFlyerObjectClient;

class PhitFlyerObjectClientTest extends TestCase
{
    /** @var PhitFlyerClient */
    private $client;
    
    protected function setUp()
    {
        $api_key = getenv('PHITFLYER_API_KEY');
        $api_secret = getenv('PHITFLYER_API_SECRET');
    
        $this->assertGreaterThan(0,strlen($api_key),'Plase set environment variable(PHITFLYER_API_KEY) before running this test.');
        $this->assertGreaterThan(0,strlen($api_secret),'Plase set environment variable(PHITFLYER_API_SECRET) before running this test.');
    
        $this->client = new PhitFlyerClient($api_key, $api_secret);
    
        sleep(1);
    }

    public function testGetMarkets()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $markets = $client->getMarkets();
        
        $this->assertInternalType('array', $markets );
        $this->assertGreaterThanOrEqual(0, count($markets) );
        
        foreach($markets as $item){
            $this->assertInstanceOf('PhitFlyer\Object\Market', $item );
        }
    }

    public function testGetBoard()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $board = $client->getBoard();
        
        $this->assertInternalType('object', $board );
        $this->assertInstanceOf('PhitFlyer\Object\Board', $board );
    }

    public function testGetBoardWithProductCode()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $board = $client->getBoard('BTC_JPY');
        
        $this->assertInternalType('object', $board );
        $this->assertInstanceOf('PhitFlyer\Object\Board', $board );
    }

    public function testTicker()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $ticker = $client->getTicker();
        
        $this->assertInternalType('object', $ticker );
        $this->assertInstanceOf('PhitFlyer\Object\Ticker', $ticker );
    }

    public function testGetTickerWithProductCode()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $ticker = $client->getTicker('BTC_JPY');
        
        $this->assertInternalType('object', $ticker );
        $this->assertInstanceOf('PhitFlyer\Object\Ticker', $ticker );
    }

    public function testGetExecutions()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $executions = $client->getExecutions();
        
        $this->assertInternalType('array', $executions );
        $this->assertGreaterThanOrEqual(0, count($executions) );
    
        foreach($executions as $item){
            $this->assertInstanceOf('PhitFlyer\Object\Execution', $item );
        }
    }

    public function testGetExecutionsWithProductCode()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $executions = $client->getExecutions('BTC_JPY');
        
        $this->assertInternalType('array', $executions );
        $this->assertGreaterThanOrEqual(0, count($executions) );
    
        foreach($executions as $item){
            $this->assertInstanceOf('PhitFlyer\Object\Execution', $item );
        }
    }

    public function testGetBoardState()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $board_state = $client->getBoardState('BTC_JPY');
    
        $this->assertInternalType('object', $board_state );
        $this->assertInstanceOf('PhitFlyer\Object\BoardState', $board_state );
    }

    public function testGetHealth()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $health = $client->getHealth();
        
        $this->assertInternalType('object', $health );
        $this->assertInstanceOf('PhitFlyer\Object\Health', $health );
    }

    public function testGetChats()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $from_date = date('Y-m-d\Th:i:s', strtotime('-1 min'));
        $chats = $client->getChats($from_date);
        
        $this->assertInternalType('array', $chats );
        $this->assertGreaterThanOrEqual(0, count($chats) );
        
        foreach($chats as $item){
            $this->assertInstanceOf('PhitFlyer\Object\Chat', $item );
        }
    }

    public function testMeGetPermissions()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $permissions = $client->meGetPermissions();
        
        $this->assertInternalType('array', $permissions );
        $this->assertGreaterThanOrEqual(0, count($permissions) );
        
        foreach($permissions as $item){
            $this->assertInternalType('string', $item );
        }
    }

    public function testMeGetBalance()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $balances = $client->meGetBalance();
        
        $this->assertInternalType('array', $balances );
        $this->assertGreaterThanOrEqual(0, count($balances) );
        
        foreach($balances as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeBalance', $item );
        }
    }

    public function testMeGetCollateral()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $collateral = $client->meGetCollateral();
    
        $this->assertInternalType('object', $collateral );
        $this->assertInstanceOf('PhitFlyer\Object\MeCollateral', $collateral );
    }

    public function testMeGetCollateralAccounts()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $accounts = $client->meGetCollateralAccounts();
        
        $this->assertInternalType('array', $accounts );
        $this->assertGreaterThanOrEqual(0, count($accounts) );
        
        foreach($accounts as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeCollateralAccount', $item );
        }
    }

    public function testMeGetAddress()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $addresses = $client->meGetAddress();
    
        $this->assertInternalType('array', $addresses );
        $this->assertGreaterThanOrEqual(0, count($addresses) );
    
        foreach($addresses as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeAddress', $item );
        }
    }

    public function testMeGetCoinIns()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $coinins = $client->meGetCoinIns();
        
        $this->assertInternalType('array', $coinins );
        $this->assertGreaterThanOrEqual(0, count($coinins) );
        
        foreach($coinins as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeCoinIn', $item );
        }
    }

    public function testMeGetCoinOuts()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $coinouts = $client->meGetCoinOuts();
        
        $this->assertInternalType('array', $coinouts );
        $this->assertGreaterThanOrEqual(0, count($coinouts) );
        
        foreach($coinouts as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeCoinOut', $item );
        }
    }

    public function testMeGetBankAccounts()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $bank_accounts = $client->meGetBankAccounts();
        
        $this->assertInternalType('array', $bank_accounts );
        $this->assertGreaterThanOrEqual(0, count($bank_accounts) );
        
        foreach($bank_accounts as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeBankAccount', $item );
        }
    }

    public function testMeGetDeposits()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $deposits = $client->meGetDeposits();
        
        $this->assertInternalType('array', $deposits );
        $this->assertGreaterThanOrEqual(0, count($deposits) );
        
        foreach($deposits as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeDeposit', $item );
        }
    }
    
    public function testMeSendChildOrder()
    {
        $this->assertTrue(true);
        
        //$client = new PhitFlyerObjectClient($this->client);
        
        //$result = $client->meSendChildOrder(
        //    'FX_BTC_JPY', 'LIMIT', 'SELL' ,300000, 0.1
        //);
    
        //$this->assertInternalType('object', $result );
        //$this->assertInstanceOf('PhitFlyer\Object\MeChildOrderResult', $result );
    }
    
    public function testMeCancelChildOrder()
    {
        $this->assertTrue(true);
        
        //$client = new PhitFlyerObjectClient($this->client);
        
        //$client->meCancelChildOrder('FX_BTC_JPY', 'JFX20170717-213404-907976F');
    }

    public function testMeCancelAllChildOrders()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $client->meCancelAllChildOrders('FX_BTC_JPY');
    }

    public function testMeGetChildOrders()
    {
        $client = new PhitFlyerObjectClient($this->client);
    
        $child_orders = $client->meGetChildOrders(
            'FX_BTC_JPY', null, null, null, 'ACTIVE'
        );
    
        $this->assertInternalType('array', $child_orders );
        $this->assertGreaterThanOrEqual(0, count($child_orders) );
    
        foreach($child_orders as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeChildOrder', $item );
        }
    }

    public function testMeGetExecutions()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $executions = $client->meGetExecutions( 'FX_BTC_JPY', null, null, 10 );
        
        $this->assertInternalType('array', $executions );
        $this->assertGreaterThanOrEqual(0, count($executions) );
        
        foreach($executions as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MeExecution', $item );
        }
    }

    public function testMeGetPositions()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $positions = $client->meGetPositions('FX_BTC_JPY');
        
        $this->assertInternalType('array', $positions );
        $this->assertGreaterThanOrEqual(0, count($positions) );
        
        foreach($positions as $item){
            $this->assertInstanceOf('PhitFlyer\Object\MePosition', $item );
        }
    }

    public function testMeGetTradingCommission()
    {
        $client = new PhitFlyerObjectClient($this->client);
        
        $commissions = $client->meGetTradingCommission('FX_BTC_JPY');
        
        $this->assertInternalType('object', $commissions );
        $this->assertInstanceOf('PhitFlyer\Object\MeCommission', $commissions );
    }
}