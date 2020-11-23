<template>
    <div class="text-center">
        <router-link class="btn btn-primary btn-block" to="Task/create">新增任務</router-link>

        <div class="card">
            <div class="card-header">
                任務管理主頁
            </div>

            <div class="card-body">
                <div class="row" v-if="taskCount !== 0">
                    <div class="col">

                    </div>
                </div>

                <div v-else>
                    目前沒有任何的任務事項
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        computed:{
            taskCount(){
                return 0;
            },
            task(){
                return 0;
            }
        }
    }
</script>
