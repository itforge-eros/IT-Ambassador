<template>
    <div id="shooter">
        <p>โหวต นายกษิดิศ และ นางสาวกษิดิศ <span class="glyphicon glyphicon-circle-arrow-right"></span></p>
    </div>
</template>
<script>
    export default {
        name: 'shooter'
    }
</script>
<style lang="scss" scoped>
    #shooter {
        position: fixed;
        display: block;
        bottom: 0;
        left: 0;
        width: 100%;
        background: gray;
        background: linear-gradient(200deg, #3dbbff, #a275ff);
        p {
            font-size: 1.9rem;
            font-family: cloud;
            color: #fff;
            padding: 10px 0px;
            text-align: center;
            margin: 0;
        }
    }
</style>