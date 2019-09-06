<template>
    <div id="wall">
        <accepted @close="showAccept = false" v-show="showAccept"></accepted>
        <passcode
                :show="showModal"
                :selectedMale="selectedMale"
                :selectedFemale="selectedFemale"
                v-show="showModal"
                @accept="showAccept = true; showModal = false"
                @close="showModal = false">
        </passcode>
        <div :class="{'getblur': showModal || showAccept}" id="wrapper">
            <div id="bg"></div>
            <div class="container-fluid">
                <div class="row">
                    <div id="logo" class="col-xs-12">
                        <img src="img/logo2019.png" alt="logo">
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
                                :paginationSize="10"
                                :minSwipeDistance="80"
                                paginationColor="#a0a0a0"
                                :perPageCustom="[[420, 1], [700, 2], [1024, 3]]">
                            <slide v-for="candidate in maleCandidates" :key="candidate.id">
                                <person-ticket
                                        :candidate="candidate"
                                        @click.native="handleSelected(candidate); handleButton()"
                                        :selected="selectedMale">
                                </person-ticket>
                            </slide>
                        </carousel>
                    </div>
                    <!-- Female -->
                    <div class="row female-buttom">
                        <carousel
                                :perPage="1"
                                :scrollPerPage="true"
                                :paginationSize="10"
                                :minSwipeDistance="80"
                                paginationColor="#a0a0a0"
                                :perPageCustom="[[420, 1], [700, 2], [1024, 3]]">
                            <slide v-for="candidate in femaleCandidates" :key="candidate.id">
                                <person-ticket
                                        :candidate="candidate"
                                        @click.native="handleSelected(candidate); handleButton()"
                                        :selected="selectedFemale">
                                </person-ticket>
                            </slide>
                        </carousel>
                    </div>
                </div>
            </div>
            <shooter
                :class="{'btn-disabled': btnDisabled}"
                @click.native="showModal = isDisabled()"
                :selectedFemale="selectedFemale"
                :selectedMale="selectedMale"
            />
        </div>
    </div>
</template>
<script>
    import Shooter from './block/Shooter.vue'
    import PersonTicket from './block/Person-Ticket.vue'
    import Passcode from './block/Passcode.vue'
    import { Carousel, Slide } from 'vue-carousel'
    import Accepted from './block/Accepted.vue'
    export default {
        components: {Shooter, PersonTicket, Passcode, Carousel, Slide, Accepted},
        data () {
            return {
                selectedFemale: {},
                selectedMale: {},
                candidates: [],
                code: '720AE',
                btnDisabled: true,
                showModal: false,
                showAccept: false,
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
                if (Object.keys(this.selectedMale).length === 0 || Object.keys(this.selectedFemale).length === 0) {
                    this.btnDisabled = true
                    return
                }
                this.btnDisabled = false
            },
            isDisabled () {
                return !this.btnDisabled && !this.showModal
            },
        },
        computed: {
            femaleCandidates() {
                return this.candidates.filter(candidate => candidate.title === "นางสาว")
            },
            maleCandidates() {
                return this.candidates.filter(candidate => candidate.title === "นาย")
            }
        }
    }
</script>
<style lang="css">
    .VueCarousel-wrapper {
        width: 100%;
        position: relative;
        overflow: hidden;
        padding-bottom: 14px;
    }
    .VueCarousel-dot-container, .VueCarousel-dot{
        margin: 0px!important;
    }
</style>
<style lang="scss" scoped>
    #bg {
        position: absolute;
        width: 100%;
        height: 50vh;
        background: linear-gradient(200deg, #3dbbff, #a275ff);
        // background-image: linear-gradient(to right top, #e8139e, #d03dc0, #ab59dd, #786ef1, #007efb);
        z-index: -1;
    }
    #wrapper {
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
        margin-top: 2em;
        img {
            width: 225px;
        }
    }
    #logo-itforge {
        padding: 32px;
        text-align: center;
        .red {
            color: rgb(232, 4, 78);
        }
        .artisan {
            color: rgb(109, 0, 237);
        }
    }
    .btn-disabled {
        cursor: not-allowed!important;
        filter: brightness(0.5)!important;
    }
    .getblur {
        filter: blur(7px)!important;
    }
    .female-buttom {
        margin-bottom: 60px;
    }
</style>