<template>
    <div class="text-center">
        <router-link class="btn btn-primary btn-block mb-2" to="createUser">新增會員</router-link>

        <table class="table table-striped border">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">姓名</th>
                    <th scope="col">權限</th>
                    <th scope="col">feat</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(user,index) in users">
                    <td>{{ index　+ 1 }}</td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.permission }}</td>
                    <td>
                        <router-link class="btn btn-primary" :to="'/Task/create/' + user.id">新增任務</router-link>
                        <router-link class="btn btn-warning" :to="'/User/edit/' + user.id">更新</router-link>
                        <button class="btn btn-danger" @click="deleteUserProcess(user.id)">刪除</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {toastMsg,deleteMsg} from "../swal";
    import {deleteUser} from "../api";

    export default {
        mounted() {
            this.$store.dispatch('getUsers');
        },
        methods:{
          async deleteUserProcess(id){
              let isDeleteUser = await deleteMsg('要刪除此會員麻?');

              if(isDeleteUser){
                  let result = await deleteUser(id);

                  await this.$store.dispatch('getUsers');
                  await toastMsg({
                      icon: 'success',
                      text: result.msg
                  });
              }
          }
        },
        computed: {
            users() {
                return this.$store.getters.getUsers;
            }
        }
    }
</script>
