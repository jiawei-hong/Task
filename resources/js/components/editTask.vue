<template>
    <div class="card text-center">
        <div class="card-header"> 更新任務</div>

        <div class="card-body">
            <form @submit.prevent="editTaskProcess" method="post">
                <div class="input-group">
                    <label class="input-group-prepend" for="title">
                        <div class="input-group-text">標題</div>
                    </label>
                    <input type="text" class="form-control" v-model="title" id="title" placeholder="請輸入任務標題" autofocus>
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="content">
                        <div class="input-group-text">內容</div>
                    </label>
                    <input type="text" class="form-control" v-model="content" id="content" placeholder="請輸入任務標題">
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="status">
                        <div class="input-group-text">狀態</div>
                    </label>

                    <select class="form-control" v-model="status" id="status">
                        <option value="created">created</option>
                        <option value="running">runnig</option>
                        <option value="accepted">accepted</option>
                    </select>
                </div>

                <div class="d-flex">
                    <input type="submit" class="btn btn-primary btn-block" value="更新">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {editTask} from "../api";
    import {toastMsg} from "../swal";

    export default {
        data(){
            return {
                title:'',
                content:'',
                status:'',
            }
        },
        mounted() {
            let id = this.$route.params.id;

            this.$store.dispatch('getEditTask', id);
        },
        created() {
            let editTask = this.$store.getters.getEditTask;

            for(let key in editTask){
                this.$data[key] = editTask[key];
            }
        },
        methods:{
            async editTaskProcess(){
                let id = this.$route.params.id;
                let result = await editTask(id,this.$data);

                await toastMsg({
                    icon: 'success',
                    text: result.msg
                });
                await this.$router.push('/Task');
            }
        },
        computed: {
            editTask() {
                return this.$store.getters.getEditTask;
            }
        }
    }
</script>
