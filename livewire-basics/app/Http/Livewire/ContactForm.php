<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $contact;
    public $successMessage;
    protected $rules = [
      'contact.name' => 'required',
      'contact.email' => 'required|email',
      'contact.phone' => 'required',
      'contact.message' => 'required|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {

        $this->validate();

        sleep(1);
        # Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));
        $this->successMessage = 'We received your message successfully and will get back to you shortly!';
        // session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');
        $this->resetExcept('successMessage');
    }

    public function render()
    {
        return view('livewire.contact-form')->layout('welcome');
    }

}
