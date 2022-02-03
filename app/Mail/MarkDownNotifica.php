<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;


class MarkDownNotifica extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new Product instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@example.com')->markdown('admin.products.usermessage.contactBanner')->with([
            'name' => $this->product->name,
            'user' => $this->product->user_id,
        ]);
    }
}
