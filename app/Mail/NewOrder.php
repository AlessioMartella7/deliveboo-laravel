<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuovo Ordine',
            replyTo: $this->order->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $restaurant = Restaurant::find($this->order->plates->first()->restaurant_id);
        return new Content(
            view: 'emails.new-order-email',
            with: [
                'plates' => $this->order->plates,
                'order' => $this->order,
                'restaurant' => $restaurant,
                ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
