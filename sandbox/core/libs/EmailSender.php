<?php

class EmailSender extends Singleton
{
    static public function isValid(Message $message)
    {
        $hasValidEmailSendTo = !empty($message->getEmailSendTo());
        $hasValidSubject = !empty($message->getSubject());
        $hasValidMessage = !empty($message->getMessage());
        return $hasValidEmailSendTo && $hasValidSubject && $hasValidMessage;
    }

    static public function sendIfValid(Message $message)
    {
        if ($message->isValid()) {
            return mail($message->getEmailSendTo(), $message->getSubject(), $message->getMessage());
        }
        if ($message->getAttachment()) {
            return false;
        }
    }
}
