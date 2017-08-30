<template>
    <div id="wall">
        <passcode :selectedMale="selectedMale" :selectedFemale="selectedFemale" v-if="showModal" @close="showModal = false"></passcode>
        <div :class="{'getblur': showModal}" id="wrapper">
            <div id="bg"></div>
            <div class="container-fluid">
                <div class="row">
                    <div id="logo" class="col-xs-12">
                        <img src="img/logo.png" alt="logo">
                    </div>
                </div>
                <span id="header-text">
                    <h3>ร่วมโหวต IT AMBASSADOR ในดวงใจคุณ</h3>
                    <p>ชอบใคร รักใคร เทหัวใจให้หมดตัว</p>
                </span>
                <div class="container">
                    <!-- Male -->
                    <div class="row">
                        <carousel
                                :perPage="1"
                                :scrollPerPage="true"
                                :paginationSize="15"
                                :minSwipeDistance="80"
                                :perPageCustom="[[420, 1], [700, 2], [1024, 3]]">
                            <slide v-if="candidate.title === 'นาย'" v-for="candidate in candidates" :key="candidate.id">
                                <person-ticket
                                        :candidate="candidate"
                                        @click.native="handleSelected(candidate); handleButton()"
                                        :selected="selectedMale">
                                </person-ticket>
                            </slide>
                        </carousel>
                    </div>
                    <!-- Female -->
                    <div class="row">
                        <carousel
                                :perPage="1"
                                :scrollPerPage="true"
                                :paginationSize="15"
                                :minSwipeDistance="80"
                                :perPageCustom="[[420, 1], [700, 2], [1024, 3]]">
                            <slide v-if="candidate.title === 'นางสาว'" v-for="candidate in candidates" :key="candidate.id">
                                <person-ticket
                                        :candidate="candidate"
                                        @click.native="handleSelected(candidate); handleButton()"
                                        :selected="selectedFemale">
                                </person-ticket>
                            </slide>
                        </carousel>
                    </div>
                <shooter :class="{'btn-disabled': btnDisabled}" @click.native="showModal = isDisabled()" :selectedFemale="selectedFemale" :selectedMale="selectedMale"></shooter>
            </div>
                <div class="row">
                    <div id="logo-itforge" class="col-xs-12">
                        <img src="img/itforge.png" alt="itforge logo">
                    </div>
                </div>
        </div>
    </div>
    </div>
</template>
<script>
    import Shooter from './block/Shooter.vue'
    import PersonTicket from './block/Person-Ticket.vue'
    import Passcode from './block/Passcode.vue'
    import { Carousel, Slide } from 'vue-carousel'
    export default {
        components: {Shooter, PersonTicket, Passcode, Carousel, Slide},
        data () {
            return {
                selectedFemale: {},
                selectedMale: {},
                candidates: [],
                code: '720AE',
                btnDisabled: true,
                showModal: false,
            }
        },
        mounted () {
            axios.get('/candidates').then(res => this.candidates = res.data).catch(err => console.log(err))
        },
        methods: {
            handleSelected (candidate) {
                if (candidate.title === 'นาย') {
                    if (this.selectedMale === candidate) {
                        this.selectedMale = {}
                        return
                    }
                    this.selectedMale = candidate
                } else {
                    if (this.selectedFemale === candidate) {
                        this.selectedFemale = {}
                        return
                    }
                    this.selectedFemale = candidate
                }
            },
            handleButton () {
                if (Object.keys(this.selectedMale).length === 0 ||Object.keys(this.selectedFemale).length === 0) {
                    this.btnDisabled = true
                    return
                }
                this.btnDisabled = false
            },
            isDisabled () {
                return !this.btnDisabled && !this.showModal
            }
        },
    }
</script>
<style lang="scss" scoped>
    #bg {
        position: absolute;
        width: 100%;
        height: 50vh;
        background: linear-gradient(200deg, #3dbbff, #a275ff);
        z-index: -1;
    }
    #wrapper {
        margin-bottom: 56px;
        transition: 0.3s ease;
        filter: blur(0px);
    }
    #header-text {
        margin-top: 10px;
        color: #fff;
        text-align: center;
        font-family: cloud;
        p {
            font-size: 18px;
        }
    }
    .candidates {
        display: flex;
        overflow-x: auto;
    }
    #logo {
        text-align: center;
        img {
            width: 225px;
        }
    }
    #logo-itforge {
        text-align: center;
        img {
            width: 230px;
        }
    }
    .btn-disabled {
        cursor: not-allowed!important;
        filter: brightness(0.5)!important;
    }
    .getblur {
        filter: blur(7px)!important;
    }
</style>