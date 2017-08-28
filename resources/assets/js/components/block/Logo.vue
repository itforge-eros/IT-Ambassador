<template>
    <div class="over-header">
        <div class="row">
            <div class="col-xs-4">
                <img id="logo" src="img/logo.png" alt="logo">
            </div>
            <div class="col-xs-8">
                <h3 class="col-xs-12">Ambassdor</h3>
                <h6 class="col-xs-12">2017</h6>
            </div>
        </div>
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
        display: flex;
        justify-content: center;
        align-items: center;
        #logo {
            width: 46px;
            margin: 0 auto;
        }
        h3 {
            margin: 0;
            font-family: code;
            float: left;
            padding-left: 0;
            padding-right: 0;
        }
        h6 {
            margin: 0;
            font-family: code;
            padding-left: 0;
            padding-right: 0;
        }
    }
    .row div {
        padding-left: 0;
        padding-right: 0;
    }
</style>