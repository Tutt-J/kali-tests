<?php

namespace App\Tests\Service;

use App\Service\Invoice;
use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InvoiceTest extends KernelTestCase
{
    public function testProcessInvoice()
    {
        /**
         * @var EmailService&\PHPUnit\Framework\MockObject\MockObject
         */
        $emailServiceMock = $this->createMock(EmailService::class);

        $emailServiceMock
            ->expects($this->once())
            ->method("send")
            ->willReturn(true);

        $invoice = new Invoice($emailServiceMock);
        $result = $invoice->process("j.doe@mail.com", 20);

        $this->assertTrue($result);
    }
}
