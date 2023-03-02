<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="main-nav">
            <div class="container">
                <a href="" class="navbar-brand">
                <h4 class="d-inline align-middle text-primary">Healthy</h4>
                </a>
                <button class="navbar-toggler text-primary" style="border: none; color: orange;" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a v-if="false" href="" class="nav-link link-active">Summarize Database/API</a>
                        <a v-else href="" class="nav-link text-white">Summarize Database/API</a>
                    </li>

                    <li class="nav-item">
                        <a v-if="false" href="" class="nav-link link-active" target="_blank">Api Docs</a>
                        <a v-else href="" class="nav-link text-white" target="_blank">Apis Docs</a>
                    </li>

                    <li class="nav-item">
                        <a v-if="false" href="" class="nav-link link-active">Recommended</a>
                        <a v-else href="" class="nav-link text-white">Recommended</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="" class="nav-link text-white" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>

                    <li class="nav-item">
                        <a v-if="false" href="" class="nav-link link-active">Top Page</a>
                        <a v-else href="" class="nav-link text-white">Top Page</a>
                    </li>

                    <li class="nav-item">
                        <a v-if="false" href="" class="nav-link link-active">My Record</a>
                        <a v-else href="" class="nav-link text-white">My Record</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    inject: ['changeSelectedPage', 'selectedPage']
}
</script>