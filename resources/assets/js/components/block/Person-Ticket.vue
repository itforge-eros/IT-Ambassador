<template>
    <div class="ticket col-xs-12 col-sm-6 col-md-3">
        <div class="info">
            <h2>{{ candidate.nickname }}</h2>
            <p>{{ candidate.name }} {{ candidate.surname }}</p>
        </div>
        <div class="top">
            <img :src="`img/${candidate.img_link}`" alt="profile">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['candidate', 'selected']
    }
</script>

<style lang="scss" scoped>
    .ticket {
        height: 445px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        overflow: hidden;
        border-radius: 7px;
        position: relative;
        transform: scale(0.95);
        background: #fff;
        .top {
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
    .info {
        position: absolute;
        bottom: 0;
        margin: 0 0 1rem 0;
        font-family: cloud;
        p {
            margin: 0;
            font-size: 1.7rem!important;
        }
        h2 {
            margin: 0;
            font-weight: bold;
        }
    }
</style>
