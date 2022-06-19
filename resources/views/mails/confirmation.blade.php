@extends('layout.mail')

@section('pageTitle', 'Confirmation de demande de prise de rendez-vous')

@section('preheader', 'Confirmation de votre demande de prise de rendez-vous')

@section('content')
    <table role="presentation" class="main">
        <tr>
            <td class="wrapper">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <div align="center" style="margin-bottom: 2rem;">
                                ByNativ
                            </div>

                            <p style="margin-bottom: 1.5rem;">Bonjour {{ $appointment->name }},</p>
                            <p>Nous avons bien reçu votre demande de prise de rendez-vous.</p>
                            <p>Votre demande :</p>

                           <ul>
                               <li><span class="font-weight-bold">Nom :</span> {{ $appointment->name }}</li>
                               <li><span class="font-weight-bold">Téléphone :</span> {{ $appointment->phone }}</li>
                               <li><span class="font-weight-bold">Adresse Email :</span> {{ $appointment->email }}</li>
                               <li><span class="font-weight-bold">Date désirée :</span> {{ $appointment->appointment_date }}</li>
                               <li><span class="font-weight-bold">Message :</span> {{ $appointment->messages }}</li>
                           </ul>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection

<?php /** @var \App\Appointment $appointment */ ?>
