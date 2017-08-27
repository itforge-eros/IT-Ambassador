<template>
    <div class="over-header">
        <img id="logo" src="img/logo.png" alt="logo">
        <h3>Ambassdor</h3>
        <h6>2017</h6><br>
    </div>
</template>

<script>
    export default {
        props: []
    }
</script>

<style lang="scss" scoped>
    .over-header {
        position: relative;
        padding: 1.4rem;
        z-index: 1;
        color: #fff;
        height: 65%;
        #logo {
            width: 46px;
            margin-right: 10px;
            float: left;
        }
        h3 {
            margin: 0;
            font-family: code;
            float: left;
            margin-top: 9px;
        }
        h6 {
            margin: 0;
            font-family: code;
        }
    }
</style>