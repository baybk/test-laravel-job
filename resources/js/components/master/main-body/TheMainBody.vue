<template>
    <div class="container">
        <div class="main">
            <LeftSideBar></LeftSideBar>

            <div class="content">
                <!-- <KeepAlive>
                    <component :is="selected_page_prop"></component>
                </KeepAlive> -->
                <router-view></router-view>
            </div>

            <RightSideBar></RightSideBar>

        </div>

        <div class="clear-float"></div>
    </div>
</template>

<script>
import LeftSideBar from '../../master/sidebar/LeftSideBar.vue'
import RightSideBar from '../../master/sidebar/RightSideBar.vue';

export default {
    components: { LeftSideBar, RightSideBar},
    props: ['selected_page_prop'],
}
</script>