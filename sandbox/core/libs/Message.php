<?php

defined('CORE_PATH') or exit('no access');

class Message
{
    private $emailSendTo;
    private $subject;
    private $message;
    private $attachment;

    public function __construct($emailSendTo,$subject,$message){
        $this->setEmailSendTo($emailSendTo);
        $this->setSubject($subject);
        $this->setMessage($message);
    }

    public function setEmailSendTo($emailSendTo)
    {
        $this->emailSendTo = $emailSendTo;
    }

    public function getEmailSendTo()
    {
        return $this->emailSendTo;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getAttachment()
    {
        return $this->attachment;
    }

    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }

}
