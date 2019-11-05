<template>
    <v-row justify="center">
        <v-dialog v-model="this.signShared" persistent max-width="300">
            <v-form ref="form" v-model="valid">
            <v-card>
            <v-card-title>
                <span class="headline">Sign in</span>
            </v-card-title>
            <v-card-text>
            <v-text-field
                v-model="user"
                :rules="userRules"
                label="Username"
                required>
            </v-text-field>
            <v-text-field
                v-model="email"
                :rules="emailRules"
                label="E-mail"
                required>
            </v-text-field>
            <v-text-field
                type="password"
                :counter="8"
                v-model="password"
                :rules="passRules"
                label="Password"
                required>
            </v-text-field>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn text color="primary">Sign In</v-btn>
                <v-btn text color="error" v-on:click="changeSign">Cancel</v-btn>
            </v-card-actions>
            </v-card>
            </v-form>
        </v-dialog>
    </v-row>
</template>
<script>
export default {
    name: 'Signin',
    props:["signShared"],
    data: () => ({
        valid: true,
        user: '',
        userRules: [
        v => !!v || 'User is required',
        ],
        email: '',
        emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        password: '',
        passRules: [
        v => !!v || 'Password is requiered',
        v => (v && v.length > 8) || 'Password must be at least 8 characters',
        ],
    }),
    mounted() {

    },
    methods: {
        changeSign(){
            this.$emit("sign", false)
            this.$refs.form.reset()
        }
    }
    
}
</script>

