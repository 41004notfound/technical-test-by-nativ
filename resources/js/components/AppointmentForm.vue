<template>
    <v-form>
        <v-container>
            <div v-if="errors.length" class="bg-warning pa-4 mb-5 rounded">
                <ul class="text-left mb-0">
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>

            <v-row v-if="!appointment">
                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="form.name"
                        label="Nom"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="form.phone"
                        label="Téléphone"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                    <v-text-field
                        v-model="form.email"
                        label="Email"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field
                        v-model="form.appointment_date"
                        label="Date désirée"
                        placeholder="Ex: 2021-12-31 12:00"
                        required
                    ></v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field
                        v-model="form.message"
                        label="Commentaires"
                    ></v-text-field>
                </v-col>

                <v-col cols="12" class="justify-content-center">
                    <v-btn
                        class="mt-4"
                        color="primary"
                        depressed
                        @click="submit"
                    >
                        Envoyer
                    </v-btn>
                </v-col>
            </v-row>

            <div v-else class="bg-success pa-4 mb-5 rounded">
                <p>Votre demande de prise de rendez-vous a bien été prise en compte.</p>
                <a :href="getAppointmentShowUrl()">Consulter votre demande de rendez-vous</a>.
            </div>
        </v-container>
    </v-form>
</template>

<script>
export default {
    name: 'AppointmentFormComponent',

    props: {
        appointmentShowRoute: {
            type: String,
            required: true
        }
    },

    data: () => ({
        appointment: null,
        success: false,
        errors: [],
        form: {
            name: null,
            phone: null,
            email: null,
            appointment_date: null,
            message: null,
            localTZ: "Europe/Paris",
            _token: document.querySelector('meta[name="_token"]').getAttribute('content')
        }
    }),

    methods: {
        submit () {
            this.errors = []

            axios.post('/api-front/appointments', {...this.form})
                .then(({ data }) => {
                    this.appointment = data
                    this.success = true
                })
                .catch(({ response }) => {
                    if (response.status === 422) {
                        this.errors = Object.entries(response.data.errors).map((err) => {
                            return err[1][0]
                        })
                    } else {
                        this.errors = ['Une erreur innatendue s‘est produite.']
                    }
                })
        },

        getAppointmentShowUrl () {
            return this.appointmentShowRoute.replace(':appointmentID', this.appointment.id)
        }
    },
}
</script>
