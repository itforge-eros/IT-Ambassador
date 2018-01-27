<template>
    <transition name="modal">
        <div class="modal-mask" @click="$emit('close')">
            <div class="modal-wrapper">
                <div class="modal-container" @click.stop>

                    <div class="modal-header">
                        <h3 v-if="res.status == '400'" style="color: #ff9f20">รหัสถูกใช้ไปแล้ว</h3>
                        <h3 v-else-if="res.status == '404'" style="color: #ff4135">รหัสไม่ถูกต้อง</h3>
                        <h3 v-else>กรุณากรอกรหัส</h3>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <input autocomplete="off" maxlength="7" minlength="5" type="text" class="form-control" id="passcode" v-model="code">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button :class="{'modal-default-button': true, 'grayout': code.length < 5}" @click="handleSend" :disabled="code.length < 5">Vote</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        data () {
            return {
                code: '',
                res: '',
            }
        },
        props: ['selectedMale', 'selectedFemale', 'show'],
        methods: {
            close: function () {
                this.code = ''
                this.res = ''
                this.$emit('close')
            },
            handleSend () {
                axios.post('/vote', {
                    code: this.code,
                    male: this.selectedMale,
                    female: this.selectedFemale,
                }).then(res => {
                    console.log(res.data)
                    this.res = res.data
                    if (this.res.status === '200') {
                        this.$emit('accept')
                        this.code = ''
                    }
                }).catch(err => console.log(err.response))
            },
        },
        mounted: function () {
            document.addEventListener("keydown", (e) => {
                if (this.show && e.keyCode === 27) {
                    this.close()
                    return
                }
                if (this.show && e.keyCode === 13 && this.code.length === 4) {
                    this.handleSend()
                }
            });
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
        background: linear-gradient(-45deg, #ff4d2f, #54190f);
        color: white;
        border: none;
        font-size: 20px;
        font-family: cloud;
        font-weight: bold;
        filter: brightness(1);
        transition: 0.3s ease;
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
    .grayout {
        cursor: not-allowed;
        filter: brightness(0.70);
    }
</style>
