<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <router-link class="navbar-brand" to="/">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-task" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"></path>
                <path
                    d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"></path>
                <path fill-rule="evenodd"
                      d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"></path>
            </svg>
            Task Manager
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown" v-if="userItemCount !== 0">
                    <span id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">管理員</span>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div>
                            <router-link to="/Users" class="nav-link">Users</router-link>
                            <router-link to="/Task" class="nav-link">Task</router-link>
                        </div>

                        <router-link to="/Logout" class="nav-link">Logout</router-link>
                    </div>
                </li>

                <li class="nav-item" v-else>
                    <router-link to="/Login" class="nav-link">Login<span class="sr-only">(current)</span></router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        computed: {
            user() {
                return this.$store.getters.getUser;
            },
            userItemCount(){
                return Object.keys(this.user).length;
            }
        }
    };
</script>
