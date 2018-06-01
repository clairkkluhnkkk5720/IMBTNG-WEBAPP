<template>
    <div class="list">
        <div class="item" v-for="image in imageList">
            <img v-bind:src="image.urls.thumb" v-on:click="save(image)"/>
            <div class="author">
                <p>{{image.user.name}}</p>
            </div>
        </div>
        <div  v-if="hasError">
            <p>Sorry cannot connect to <a href="https://unsplash.com">https://unsplash.com</a>.</p>
        </div>
    </div>
</template>

<script>
    import Axios from 'axios'

    export default {
        name: 'ImagesList',
        data: () => {
            return {
                imageList: [],
                hasError: false,
            }
        },
        mounted: function() {
            Axios.get(`https://api.unsplash.com/photos/random?count=10&orientation=landscape&query=soccer&client_id=82d7201756d72298da9ba28db49476fd90070de9084b480fa9ec511e0509cc1a`)
                .then(response => {
                    this.hasError = false;
                    this.imageList = response.data;
                })
                .catch(() => this.hasError = true);
        },
        methods: {
            save: (image) => {
                const input = document.getElementById('id_logo_url');

                if (input) {
                    input.value = image.urls.full;
                }
            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .list {
        display: flex;
        flex: 1 0 100%;
        flex-wrap: wrap;
        justify-content: center;
    }
    .item {
        cursor: pointer;
        display: flex;
        margin: .5em;
        position: relative;
    }
    img {
        border: 1px solid #c5ccd2;
        border-radius: .5rem;
        padding: .25rem;
    }

    .item>img:hover {
        opacity: 0.8;
    }

    .author {
        background-color: rgba(0, 0, 0, .5);
        bottom: 0.25em;
        border-bottom-left-radius: .5em;
        border-bottom-right-radius: .5em;
        color: #fff;
        display: none;
        height: 40px;
        justify-content: center;
        left: 0.25em;
        position: absolute;
        right: 0.25em;

    }
    .item:hover>.author {
        display: flex;
    }
    .author>p {
        display: flex;
        margin: auto;
    }
</style>
