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
            <div id="bg"><img class="inner" src="img/overlay.png" alt=""></div>
            <div class="container-fluid">
                <div class="row">
                    <div id="logo" class="col-xs-12">
                        <img src="img/logo.png" alt="logo">
                    </div>
                </div>
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
                                :paginationSize="10"
                                :minSwipeDistance="80"
                                paginationColor="#a0a0a0"
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
                    <h2 class="text-center">
                        Amount: {{ this.amount }}
                    </h2>
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
                amount: 0
            }
        },
        mounted () {
            axios.get('/candidates').then(res => this.candidates = res.data).catch(err => console.log(err))
            axios.get('/amount').then(({data}) => this.amount = data.amount).catch(err => console.log(err))
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
            },
        },
    }
</script>
<style lang="scss" scoped>
    #bg {
        position: absolute;
        width: 100%;
        height: 50vh;
        background: #531818;
        z-index: -1;
        overflow: hidden;
        .inner {
            position: absolute;
            min-width: 100%;
            min-height: 100%;
            z-index: 1;
            opacity: 0.42;
        }
    }
    #wrapper {
        margin-bottom: 56px;
        transition: 0.3s ease;
        filter: blur(0px);
    }
    .candidates {
        display: flex;
        overflow-x: auto;
    }
    #logo {
        text-align: center;
        img {
            width: 280px;
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