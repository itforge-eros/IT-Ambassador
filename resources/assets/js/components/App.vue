<template>
    <div id="wall">
        <password></password>
        <div id="wrapper">
            <div id="bg"></div>
            <div class="container-fluid">
                <logo></logo>
                <span id="header-text">
                <h3>ร่วมโหวต IT AMBASSADOR ในดวงใจคุณ</h3>
                <p>ชอบใคร รักใคร เทหัวใจให้หมดตัว</p>
            </span>
            <div class="container">
                <div class="row">

                    <!-- Male -->
                    <carousel
                            :perPage="1"
                            :scrollPerPage="true"
                            :paginationSize="15"
                            :minSwipeDistance="50"
                            :perPageCustom="[[420, 1], [700, 2], [1024, 3]]">
                        <slide v-if="candidate.title === 'นาย'" v-for="candidate in candidates" :key="candidate.id">
                            <person-ticket
                                    :candidate="candidate"
                                    @click.native="handleSelected(candidate)"
                                    :selected="selectedMale">
                            </person-ticket>
                        </slide>
                    </carousel>


                    <!-- Female -->
                    <carousel
                            :perPage="1"
                            :scrollPerPage="true"
                            :paginationSize="15"
                            :minSwipeDistance="50"
                            :perPageCustom="[[420, 1], [700, 2], [1024, 3]]">\
                        <slide v-if="candidate.title === 'นางสาว'" v-for="candidate in candidates" :key="candidate.id">
                            <person-ticket
                                    :candidate="candidate"
                                    @click.native="handleSelected(candidate)"
                                    :selected="selectedFemale">
                            </person-ticket>
                        </slide>
                    </carousel>
                </div>
                <shooter @click.native="handleSend" :selectedFemale="selectedFemale" :selectedMale="selectedMale"></shooter>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
    import Shooter from './block/Shooter.vue'
    import PersonTicket from './block/Person-Ticket.vue'
    import Logo from './block/Logo.vue'
    import Password from './block/Password.vue'
    import { Carousel, Slide } from 'vue-carousel'
    export default {
        components: {Shooter, PersonTicket, Logo, Password, Carousel, Slide},
        data () {
            return {
                selectedFemale: {},
                selectedMale: {},
                candidates: [],
                code: '720AE',
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
            handleSend () {
                if (Object.keys(this.selectedMale).length === 0 ||Object.keys(this.selectedFemale).length === 0) {
                    // TODO push modal when this conditions occur
                    console.log('not xxx')
                } else {
                    axios.post('/vote', {
                        code: this.code,
                        male: this.selectedMale,
                        female: this.selectedFemale,
                    }).then(res => console.log(res.data)).catch(err => console.log(err.response))
                }
            },
        },
    }
</script>
<style lang="scss" scoped>
    #bg {
        position: fixed;
        width: 100%;
        height: 70vh;
        background: linear-gradient(200deg, #3dbbff, #a275ff);
        z-index: -1;
    }
    #wrapper {
        margin-bottom: 56px;
    }
    #header-text {
        margin-top: 10px;
        color: #fff;
        text-align: center;
    }
    .candidates {
        display: flex;
        overflow-x: auto;
    }
</style>