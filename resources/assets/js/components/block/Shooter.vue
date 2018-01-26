<template>
    <div id="shooter">
        <p v-if="isBothSelected">โหวต นาย{{selectedMale.name}} และ นางสาว{{selectedFemale.name}} <span class="glyphicon glyphicon-circle-arrow-right"></span></p>
        <p v-else>กรุณาเลือกคนให้ครบ</p>
    </div>
</template>
<script>
    export default {
        name: 'shooter',
        props: ['selectedMale', 'selectedFemale'],
        computed: {
            isBothSelected () {
                if (Object.keys(this.selectedMale).length === 0 ||Object.keys(this.selectedFemale).length === 0) {
                    return false
                } else {
                    return true
                }
            },
        },
    }
</script>
<style lang="scss" scoped>
    #shooter {
        cursor: pointer;
        position: fixed;
        display: block;
        bottom: 0;
        left: 0;
        width: 100%;
        background: gray;
        background: linear-gradient(200deg, rgb(83, 24, 24), rgb(126, 81, 61));
        z-index: 4;
        transition: 0.3s ease;
        filter: brightness(1);
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