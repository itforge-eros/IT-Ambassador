<template>
    <transition name="modal">
        <div class="modal-mask" @click="$emit('close')">
            <div class="modal-wrapper">
                <div class="modal-container" @click.stop>
                    <div class="row">
                        <span class="col-xs-12 glyphicon glyphicon glyphicon-heart"></span>
                        <h1 class="col-xs-12"><b>ขอบคุณ!</b></h1>
                        <h4 class="col-xs-12">สามารถติดตามรายละเอียดได้ที่</h4>
                        <h4 class="col-xs-12">fb.com/ITKMITLAmbassador</h4>
                        <div class="col-xs-12">
                            <img src="img/logo2019.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: []
    }
</script>

<style lang="scss" scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 30px 10px;
        background: linear-gradient(200deg, #3dbbff, #a275ff);
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        text-align: center;
        font-family: cloud;
        color: #fff;
        span {
            font-size: 100px;
        }
        img {
            width: 168px;
        }
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .grayout {
        cursor: not-allowed;
        filter: brightness(0.70);
    }
</style>
