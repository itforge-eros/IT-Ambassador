<template>
    <transition name="modal">
        <div class="modal-mask" @click="$emit('close')">
            <div class="modal-wrapper">
                <div class="modal-container" @click.stop>

                    <div class="modal-header">
                        <h3>รหัสโหวต</h3>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input maxlength="5" type="text" class="form-control" id="passcode">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="modal-default-button" @click="$emit('close')">Vote</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: ['show'],
        methods: {
            close: function () {
                this.$emit('close');
            }
        }
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
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin: 0;
        color: #000;
        text-align: center;
        font-family: cloud;
        font-weight: bold;
    }

    .modal-body {
        padding: 0;
        .form-group {
            margin-bottom: 0;
        }
        input {
            font-size: 40px;
            text-align: center;
            height: auto;
            text-transform: uppercase;
            border: none;
        }
    }


    .modal-default-button {
        width: 100%;
        padding: 10px;
        background: linear-gradient(200deg, #3dbbff, #a275ff);
        color: white;
        border: none;
        font-size: 20px;
        font-family: cloud;
        font-weight: bold;
    }
    .modal-footer {
        padding: 0;
        border-top: none;
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
</style>
