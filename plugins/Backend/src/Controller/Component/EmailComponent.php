<?php 
namespace Backend\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;

class EmailComponent extends Component
{
    public function sendMail($destEmail, $subject, $data = [] ) {
        $email = new Email('gmail');
        $email
            ->viewVars(['data' => $data])
            ->to($destEmail)
            ->subject($subject)
            ->template('Backend.approved')
            ->send();
    }

    public function sendMailBlockUser($destEmail, $subject) {
        $email = new Email('gmail');
        $email
            ->to($destEmail)
            ->subject($subject)
            ->template('Backend.block_user')
            ->send();
    }
}