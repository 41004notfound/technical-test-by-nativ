<template>
    <v-container class="px-5">
        <div v-if="errors.length" class="bg-warning pa-4 mb-5 rounded">
            <ul class="text-left mb-0">
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
        <v-card v-if="appointment" class="pa-5">
            <h2>Détails de votre demande de rendez-vous</h2>

            <v-row class="mt-4 text-left">
                <v-col cols="12" md="3">
                    <span class="font-weight-bold">Nom :</span> {{ appointment.name }}
                </v-col>

                <v-col cols="12" md="3">
                    <span class="font-weight-bold">Téléphone :</span> {{ appointment.phone }}
                </v-col>

                <v-col cols="12" md="3">
                    <span class="font-weight-bold">Email :</span> {{ appointment.email }}
                </v-col>

                <v-col cols="12" md="3">
                    <span class="font-weight-bold">Date désirée :</span> {{ appointment.appointment_date }}
                </v-col>

                <v-col cols="12" md="12">
                    <span class="font-weight-bold">Message :</span> {{ appointment.message }}
                </v-col>
            </v-row>
        </v-card>
    </v-container>
</template>

<script>
export default {
    name: 'AppointmentShowComponent',

    props: {
        appointmentId: {
            type: Number,
            requried: true
        }
    },

    data: () => ({
        appointment: null,
        errors: [],
    }),

    mounted () {
        axios.get(`/api-front/appointments/${this.appointmentId}`)
            .then(({ data }) => {
                this.appointment = data
                this.success = true
            })
            .catch(({ response }) => {
                this.errors = ['Une erreur innatendue s‘est produite.']
            })
    }
}
</script>
