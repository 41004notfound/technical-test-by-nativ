<?php

namespace App\Http\Requests\ApiFront\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'phone' => ['required', 'regex:/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/'],
            'email' => ['required', 'email'],
            'message' => ['string', 'nullable'],
            'localTZ' => ['required', 'timezone'],
            'appointment_date' => ['required', 'date_format:Y-m-d H:i']
        ];
    }

    /**
     * Get the validation attributs names
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nom',
            'phone' => 'Téléphone',
            'email' => 'Email',
            'appointment_date' => 'Date désirée',
            'message' => 'Commentaire',
            'localTZ' => 'Fuseau horaire'
        ];
    }
}
