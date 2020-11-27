<template>
    <div class="card text-center">
        <div class="card-header">
            創建任務
        </div>

        <div class="card-body">
            <form @submit.prevent="createTaskProcess" method="post">
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
                    <label class="input-group-prepend" for="startTime">
                        <div class="input-group-text">開始時間</div>
                    </label>
                    <input type="date" class="form-control" v-model="start_time" id="startTime" placeholder="請輸入任務標題">
                </div>

                <div class="input-group">
                    <label class="input-group-prepend" for="endTime">
                        <div class="input-group-text">結束時間</div>
                    </label>
                    <input type="date" class="form-control" v-model="end_time" id="endTime" placeholder="請輸入任務標題">
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
    import {createTask} from "../api";

    export default {
        data() {
            return {
                title: '',
                content: '',
                start_time: '',
                end_time: ''
            }
        },
        methods: {
            async createTaskProcess() {
                let isAllFull = Object.values(this.$data).filter(d => d.length === 0).length === 0;
                let msgConfig = {
                    'icon': 'info',
                    'text': ''
                }

                if (!isAllFull) {
                    msgConfig.text = '標題、內容、開始、結束時間都不可為空。';
                } else if (this.start_time > this.end_time) {
                    msgConfig.text = '開始時間不能超過結束時間。';
                } else {
                    let data = await createTask(Object.assign({
                        'user_id': this.$route.params.id
                    },this.$data));

                    msgConfig.icon = 'success';
                    msgConfig.text = data.msg
                }

                toastMsg(msgConfig).then(() => this.$router.push('/Task'));
            }
        }
    }
</script>
