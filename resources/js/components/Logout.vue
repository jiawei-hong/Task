<template>

</template>

<script>
    import {toastMsg} from "../swal";
    import {logout} from "../api";

    export default {
        async mounted() {
            let token = this.$store.getters.getUser.api_token;
            let feat = await logout({
                token:token
            });

            toastMsg({
                'icon': feat.status ? 'success' : 'error',
                'text': feat.msg
            }).then(async () => {
                await this.$store.commit('logout');
                await this.$router.push('/')
            });
        }
    }
</script>
