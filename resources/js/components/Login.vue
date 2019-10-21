<template>
    <v-row justify="center">
        <v-dialog v-model="this.dialog3" persistent max-width="300">
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
                    <v-btn block color="primary">Log In</v-btn>
                </v-card-actions>
            </v-card>
            </v-form>
        </v-dialog>
    </v-row>
</template>
<script>
export default {
    props: ["dial"],
    name: 'Login',
    data: () => ({
        dialog3: false,
        valid: true,
        user: '',
        userRules: [
        v => !!v || 'User is required',
        ],
        password: '',
        passRules: [
        v => !!v || 'Password is requiered',
        ]
    }),
    mounted() {
        console.log(this.dial)
    }
    
}
</script>