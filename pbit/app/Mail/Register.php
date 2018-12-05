<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EmailTemplate;

class Register extends Mailable
{
    use Queueable, SerializesModels;

    
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $subject = 'Sucessfully Register';
        $template = $this->get_email_template();
        
        return $this->view('email.name')->subject($subject)->with([ 'user' => $this->user , 'template' => $template ]);
    }




    private function get_email_template()
    {
      $template =  EmailTemplate::where('template_for','on_registeration')->first();
      $user = $this->user->toArray();
      $user_keys = array_keys($user);
      $filtered_html = '';
      if($template){
        if(!empty($template->template)){
            $filtered_html = $template->template;
             foreach ($user_keys as $value) {
                 $filtered_html = str_replace(('{$'.$value.'}'), $user[$value], $filtered_html );
             }
        }
      }

      return $filtered_html;
    }

}
