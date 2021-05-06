<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConviteEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function build()
    {
        $pessoa = $this->pessoa;
        return $this->view('view.name', compact('pessoa'));
    }
}
