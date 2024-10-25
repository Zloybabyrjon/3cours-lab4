<?php

use PHPUnit\Framework\TestCase;
use Egor\Interfaces\SMSNotification;

class SMSNotificationTest extends TestCase
{
    public function testSendMessage()
    {
        $message = "Deaf Bonce";
        $sms = new SMSNotification();
        $sms->send($message);
        $this->assertEquals('sent', $sms->getStatus(), "Ожидался статус 'sent' для успешной отправки сообщения");
    }

    public function testMessageExceedsMaxCharacters()
    {
        $message = str_repeat("A", 200);
        $sms = new SMSNotification();
        $sms->send($message);
        $this->assertEquals('failed', $sms->getStatus(), "Ожидался статус 'failed' при превышении лимита символов");
    }
}
