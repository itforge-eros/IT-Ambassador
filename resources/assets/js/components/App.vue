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
                    <div v-for="candidate in candidates">
                        <person-ticket
                                v-if="candidate.title === 'นาย'"
                                :candidate="candidate"
                                @click.native="handleSelected(candidate)"
                                :selected="selectedMale">
                        </person-ticket>
                    </div>
                    <div v-for="candidate in candidates">
                        <!-- Female -->
                        <person-ticket
                                v-if="candidate.title === 'นางสาว'"
                                :candidate="candidate"
                                @click.native="handleSelected(candidate)"
                                :selected="selectedFemale">
                        </person-ticket>
                    </div>
                </div>
                <shooter @click.native="handleSend" :selectedFemale="selectedFemale" :selectedMale="selectedMale"></shooter>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
    import Shooter from './block/Shooter.vue';
    import PersonTicket from './block/Person-Ticket.vue';
    import Logo from './block/Logo.vue';
    import Password from './block/Password.vue';
    export default {
        components: {Shooter, PersonTicket, Logo, Password},
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
                    this.selectedMale = candidate
                } else {
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
</style>