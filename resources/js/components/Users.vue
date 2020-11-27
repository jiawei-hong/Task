<template>
    <div class="text-center">
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
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('setUsers');
        },
        computed: {
            users() {
                return this.$store.getters.getUsers;
            }
        }
    }
</script>
