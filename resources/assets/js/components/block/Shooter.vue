<template>
    <div id="shooter">
        <p v-if="isSelected">โหวต {{selected.title + selected.name}} <span class="glyphicon glyphicon-circle-arrow-right"></span></p>
        <p v-else>กรุณาเลือกคนให้ครบ</p>
    </div>
</template>
<script>
    export default {
        name: 'shooter',
        props: ['selected'],
        computed: {
            isSelected () {
                if (Object.keys(this.selected).length === 0) {
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
        background: linear-gradient(-45deg, #ff4d2f, #54190f);
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