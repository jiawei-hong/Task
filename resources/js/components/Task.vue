<template>
    <div class="text-center">
        <div class="card">
            <div class="card-header">
                任務管理主頁
            </div>

            <div class="card-body">
                <table class="table table-striped border" v-if="taskCount !== 0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">標題</th>
                            <th scope="col">內容</th>
                            <th scope="col">狀態</th>
                            <th scope="col">feat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(task,index) in tasks">
                            <th scope="row">{{ index + 1}}</th>
                            <td>{{ task.title }}</td>
                            <td>{{ task.content }}</td>
                            <td>
                                <svg :style="'color:' + getStatusColor(task.status)" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>
                                {{ task.status }}
                            </td>
                            <td>
                                <div v-if="task.status !== 'closed'">
                                    <router-link class="btn btn-warning" :to="'Task/edit/' + task.id">更新</router-link>
                                    <button v-if="userPermission === '管理員'" class="btn btn-danger" @click="deleteTaskWithId(task.id)">刪除</button>
                                </div>

                                <div v-else>
                                    此任務已關閉
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    import {getTasks,deleteTask} from "../api";
    import {toastMsg,deleteMsg} from "../swal";

    export default {
        async mounted() {
            let token = this.getToken();

            await this.$store.dispatch('getTasks',token);
        },
        methods:{
            getToken(){
              return this.$store.getters.getUser.api_token;
            },
            getStatusColor(status){
                let status_obj = {
                    created:'var(--info)',
                    running:'var(--success)',
                    closed:'var(--danger)'
                };

                return status_obj[status];
            },
            async deleteTaskWithId(id){
                let isDeleteTask = await deleteMsg('刪除此任務');

                if(isDeleteTask){
                    let result = await deleteTask(id);

                    await toastMsg({
                        icon: 'success',
                        text: result.msg
                    });
                    await this.$store.dispatch('getTasks',this.getToken());
                }
            }
        },
        computed:{
            tasks(){
                return this.$store.getters.getTasks;
            },
            taskCount(){
                return this.$store.getters.getTasks.length;
            },
            userPermission(){
                return this.$store.getters.getUser.permission;
            }
        }
    }
</script>
