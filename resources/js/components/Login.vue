<template>
    <div class="card">
        <div class="card-header">
            登入
        </div>

        <div class="card-body">
            <form @submit.prevent="loginProcess" method="post">
                <div class="input-group">
                    <label class="input-group-prepend" for="username">
                        <div class="input-group-text">帳號</div>
                    </label>
                    <input type="text" class="form-control" v-model="account" id="username" placeholder="請輸入帳號" autofocus>
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="password">
                        <div class="input-group-text">密碼</div>
                    </label>
                    <input type="password" class="form-control" v-model="password" id="password" placeholder="請輸入密碼">
                </div>

                <div class="d-flex">
                    <input type="submit" class="btn btn-primary w-50 mr-1" value="登入">
                    <input type="reset" class="btn btn-primary w-50 mr-1" value="重設">
                </div>
            </form>

        </div>
    </div>
</template>

<script>
    import {toastMsg} from "../swal";
    import {login} from "../api";

    export default {
        data(){
            return {
                account:'',
                password:''
            }
        },
        methods:{
            async loginProcess(){
                let data = await login(this.$data);

                await toastMsg({
                    icon: data.status ? 'success' : 'error',
                    text:data.msg
                });

                if(data.status){
                    this.$store.dispatch('setUser',data.data);
                    this.$router.push('/');
                }
            }
        }
    }
</script>
