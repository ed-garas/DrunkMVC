<?php

class EmailController extends BaseController
{
    public function testAction()
    {
        echo "Email test<br/>";
        $mail = new Email("test@mail.com","Test subject","Test message body, test message body, test message body, test 
            message body, test message body");

        echo "Email send with result :".$mail->sendIfValid();
    }
}
