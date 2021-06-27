<?php

namespace App\Mail;

use App\Models\Convite\Convite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConviteEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $convite;
    private $urlDeAceite;

    public function __construct(Convite $convite, string $urlDeAceite)
    {
        $this->convite = $convite;
        $this->urlDeAceite = $urlDeAceite;
    }

    public function build()
    {
        try {
            return $this->from('nao-responda@bleauboard.com.br')
                ->view('convite.emails.convite')
                ->with(
                    [
                        'convite' => $this->convite,
                        'urlDeAceite' => $this->urlDeAceite
                    ]
                );
        } catch (\Exception $e) {
        }
    }
}
