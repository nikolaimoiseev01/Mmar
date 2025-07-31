<?php

namespace App\Livewire\Components\Account\Settings;

use Livewire\Component;

class ShippingInfo extends Component
{

    public $edit_id = null;
    public $name, $country, $address, $apartment, $postal_code, $city;
    public $userAddresses;
    public function render()
    {
        return view('livewire.components.account.settings.shipping-info');
    }

    public function editAddress($id)
    {
        $address = auth()->user()->userAddresses()->findOrFail($id);

        $this->edit_id = $address->id;
        $this->name = $address->name;
        $this->country = $address->country;
        $this->address = $address->address;
        $this->apartment = $address->apartment;
        $this->postal_code = $address->postal_code;
        $this->city = $address->city;
    }

    public function addNewAddress()
    {
        $this->reset(['edit_id', 'name', 'country', 'address', 'apartment', 'postal_code', 'city']);
    }

    public function mount()
    {
        $this->userAddresses = auth()->user()->userAddresses;
    }

    public function saveAddress()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string',
            'address' => 'required|string',
            'apartment' => 'nullable|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
        ]);

        if ($this->edit_id) {
            auth()->user()->userAddresses()->where('id', $this->edit_id)->update($this->only([
                'name', 'country', 'address', 'apartment', 'postal_code', 'city',
            ]));
        } else {
            auth()->user()->userAddresses()->create($this->only([
                'name', 'country', 'address', 'apartment', 'postal_code', 'city',
            ]));
        }

        $this->edit_id = null;
        $this->mount(); // Перезагрузка адресов
    }

    public function deleteAddress($id)
    {
        auth()->user()->userAddresses()->where('id', $id)->delete();
        $this->mount(); // Обновить список
    }
}
