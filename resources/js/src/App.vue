<template>
    <div id="app">
<!--        <img width="25%" src="./assets/logo.png" />-->

        <LinkPreview url="https://www.ezpapel.com/" @click="handleClick"></LinkPreview>
    </div>
</template>

<script>
import LinkPreview from "@ashwamegh/vue-link-preview";

export default {
    name: "App",
    components: {
        LinkPreview,
    },
    methods: {
        handleClick(preview) {
            console.log(
                "click",
                preview.domain,
                preview.title,
                preview.description,
                preview.img
            );
        },
    },
};
</script>

<style>
#app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>





<!--<template>-->
<!--    <div class="container">-->
<!--        <div class="row align-items-center vh-100">-->
<!--            <div class="col-6 mx-auto">-->
<!--                <div class="card shadow border">-->
<!--                    <div class="card-body d-flex flex-column align-items-center">-->
<!--                        <div class="input-group">-->
<!--                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"-->
<!--                                   aria-describedby="search-addon"/>-->
<!--                            <button type="button" class="btn btn-outline-primary">search</button>-->
<!--                        </div>-->
<!--                        <vue-link-preview url="https://vuejs.org/" @click="handleClick">-->
<!--                            <template v-slot:loader>-->
<!--                                loader...-->
<!--                            </template>-->
<!--                            <template v-slot:default="preview">-->
<!--                                <div>-->
<!--                                    <p>Domain: {{ preview.domain }}</p>-->
<!--                                    <p>Title: {{ preview.title }}</p>-->
<!--                                    <p>Description: {{ preview.description }}</p>-->
<!--                                    <img height="100px" width="100px" :src="preview.img" :alt="preview.title ">-->
<!--                                </div>-->
<!--                            </template>-->
<!--                        </vue-link-preview>-->
<!--                        <div class="row">-->
<!--                            <div class="col-3">-->
<!--                                <div class="mt-5">-->
<!--                                    <img-->
<!--                                        src="http://www.google.com/images/branding/googlelogo/1x/googlelogo_white_background_color_272x92dp.png"-->
<!--                                        alt="..." height="100%" width="100%"/>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-9">-->
<!--                                <div>-->
<!--                                    <h2 class="mt-4 mb-0">Google</h2>-->
<!--                                </div>-->
<!--                                <div class="">-->
<!--                                    <p style="color:rgba(0,0,0,.54);font-size:14px;">Search the world's information,-->
<!--                                        including webpages, images, videos and more. Google has many special features to-->
<!--                                        help you find exactly what you're looking for.</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--const urlMetaData = require('url-metadata');-->
<!--const LinkPreview=require('@ashwamegh/vue-link-preview')-->
<!--export default {-->
<!--    components:{-->
<!--      LinkPreview-->
<!--    },-->
<!--    data() {-->
<!--        return {-->
<!--            property: 'Blank'-->
<!--        }-->
<!--    },-->

<!--    computed: {},-->
<!--    mounted() {-->
<!--        // urlMetaData('https://google.com').then(-->
<!--        //     function (metadata) {-->
<!--        //         console.log(metadata)-->
<!--        //     },-->
<!--        //     function (error){-->
<!--        //         console.log(error)-->
<!--        //     }-->
<!--        // )-->
<!--    },-->
<!--    created() {-->

<!--    },-->
<!--    methods: {-->
<!--        handleClick(preview) {-->
<!--            console.log('click', preview.domain, preview.title, preview.description, preview.img)-->
<!--        }-->
<!--    }-->
<!--}-->
<!--// const urlMetadata = require('url-metadata')-->

<!--// export default {-->
<!--//     mounted() {-->
<!--//         console.log('Component mounted.')-->
<!--//         urlMetadata('http://bit.ly/2ePIrDy').then(-->
<!--//             function (metadata) { // success handler-->
<!--//                 console.log(metadata)-->
<!--//             },-->
<!--//             function (error) { // failure handler-->
<!--//                 console.log(error)-->
<!--//             })-->
<!--//     },-->
<!--//     methods: {-->

<!--//     }-->
<!--// }-->
<!--</script>-->
