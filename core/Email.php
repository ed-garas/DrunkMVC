<?php

defined('CORE_PATH') or exit('no access');

class Email
{
    private $emailSendTo;
    private $subject;
    private $message;

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


    public function isValid()
    {
        $hasValidEmailSendTo = (($this->getEmailSendTo() != null) && (!empty($this->getEmailSendTo())));
        $hasValidSubject = (($this->getMessage() != null) && (!empty($this->getMessage())));
        $hasValidMessage = (($this->getMessage() != null) && (!empty($this->getMessage())));
        return $hasValidEmailSendTo && $hasValidSubject && $hasValidMessage;
    }

    public function sendIfValid()
    {
        if ($this->isValid()) {
            return mail($this->getEmailSendTo(), $this->getSubject(), $this->getMessage());
        }
        return false;
    }
}
