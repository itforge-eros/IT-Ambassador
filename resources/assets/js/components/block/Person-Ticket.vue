<template>
    <div id="ticket">
        <div id="info">
            <h2>{{ nickname }}</h2>
            <p>{{ name }} {{ surname }}</p>
        </div>
        <div id="top">
            <img :src="`img/${img_link}`" alt="profile">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'nickname' ,'name', 'surname', 'img_link']
    }
</script>

<style lang="scss" scoped>
    #ticket {
        width: 322px;
        height: 445px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        overflow: hidden;
        border-radius: 7px;
        position: relative;
        #top {
            width: 100%;
            height: 73%;
            background: linear-gradient(125deg, rgb(2, 109, 255), rgb(107, 204, 255));
            transform: rotate(5deg) scale(1.3);
            overflow: hidden;
            img {
                transform: rotate(-5deg);
                height: 110%;
            }
        }
    }
    #info {
        position: absolute;
        bottom: 0;
        margin: 0 0 0.5rem 1rem;
        font-family: cloud;
        font-size: 1.2rem;
        p {
            margin: 0;
        }
        h2 {
            margin: 0;
        }
    }
</style>
