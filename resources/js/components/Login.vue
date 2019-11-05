<template>
    <v-row justify="center">
        <v-dialog v-model="dialogShared" persistent max-width="300">
            <v-form ref="form" v-model="valid">
            <v-card> 
                <v-card-title>
                    <span class="headline">Log in</span>
                </v-card-title>
                <v-card-text>
                   <v-text-field
                    v-model="user"
                    :rules="userRules"
                    label="Username"
                    required
                ></v-text-field>
                <v-text-field
                    type="password"
                    v-model="password"
                    :rules="passRules"
                    label="Password"
                    required
                ></v-text-field>
                </v-card-text>
                <v-card-actions>
                    <v-spacer/>
                    <v-btn text color="primary">Log In</v-btn>
                    <v-btn text color="error" v-on:click="changeInitial">Cancel</v-btn>
                </v-card-actions>
            </v-card>
            </v-form>
        </v-dialog>
    </v-row>
</template>
<script>
export default {
    name: 'Login',
    props: ["dialogShared"],
    data: () => ({
        valid: true,
        user: '',
        userRules: [
        v => !!v || 'Email is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        password: '',
        passRules: [
        v => !!v || 'Password is requiered',
        ]
    }),
    mounted() {

},
    methods: {
        changeInitial(){
            this.$emit("log", false);
            this.$refs.form.reset()
        }
    }
    
}
</script>

