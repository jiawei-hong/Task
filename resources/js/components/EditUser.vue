<template>
    <div class="card text-center">
        <div class="card-header">更新會員</div>

        <div class="card-body">
            <form @submit.prevent="editUserProcess" method="post">
                <div class="input-group">
                    <label class="input-group-prepend" for="username">
                        <div class="input-group-text">姓名</div>
                    </label>
                    <input type="text" class="form-control" v-model="username" id="username" placeholder="請輸入姓名" autofocus>
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="password">
                        <div class="input-group-text">密碼</div>
                    </label>
                    <input type="text" class="form-control" v-model="password" id="password" placeholder="請輸入密碼" autofocus>
                </div>

                <div class="d-flex">
                    <input type="submit" class="btn btn-primary btn-block" value="更新">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import {updateUser} from "../api";
import {toastMsg} from "../swal";

export default {
    data(){
        return {
            username: '',
            password: ''
        }
    },
    methods:{
        async editUserProcess(){
            let id = this.$route.params.id;
            let result = await updateUser(id,this.$data);

            await toastMsg({
                icon: 'success',
                text: result.msg
            });
            await this.$router.push('/Users');
        }
    }
}
</script>
