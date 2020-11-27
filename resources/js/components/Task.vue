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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(task,index) in tasks">
                            <th scope="row">{{ index + 1}}</th>
                            <td>{{ task.title }}</td>
                            <td>{{ task.content }}</td>
                            <td>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8" cy="8" r="8"/>
                                </svg>
                                {{ task.status }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('getTasks');
        },
        computed:{
            tasks(){
                return this.$store.getters.getTasks;
            },
            taskCount(){
                return this.$store.getters.getTasks.length;
            },
        }
    }
</script>
