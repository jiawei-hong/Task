<template>
    <div class="card text-center">
        <div class="card-header">
            創建會員
        </div>

        <div class="card-body">
            <form @submit.prevent="createUserProcess" method="post">
                <div class="input-group">
                    <label class="input-group-prepend" for="username">
                        <div class="input-group-text">姓名</div>
                    </label>
                    <input type="text" class="form-control" v-model="username" id="username" placeholder="請輸入使用者姓名" autofocus>
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="account">
                        <div class="input-group-text">帳號</div>
                    </label>
                    <input type="text" class="form-control" v-model="account" id="account" placeholder="請輸入使用者帳號">
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="password">
                        <div class="input-group-text">密碼</div>
                    </label>
                    <input type="password" class="form-control" v-model="password" id="password" placeholder="請輸入使用者密碼">
                </div>

                <div class="d-flex">
                    <input type="submit" class="btn btn-primary w-50 mr-1" value="創建">
                    <input type="reset" class="btn btn-primary w-50 mr-1" value="重設">
                </div>
            </form>

        </div>
    </div>
</template>

<script>
import {toastMsg} from "../swal";
import {createUser} from "../api";

export default {
    data() {
        return {
            username: '',
            account: '',
            password: '',
        }
    },
    methods: {
        async createUserProcess() {
            let isAllFull = Object.values(this.$data).filter(d => d.length === 0).length === 0;
            let msgConfig = {
                'icon': 'info',
                'text': ''
            };

            if (!isAllFull) {
                msgConfig.text = '姓名、帳號、密碼，都不可為空。';
            } else {
                let result = await createUser(this.$data);

                msgConfig.icon = 'success';
                msgConfig.text = result.msg
            }

            toastMsg(msgConfig).then(() => this.$router.push('/Users'));
        }
    }
}
</script>
