<template>
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
                    <div v-for="candidate in candidates">
                        <person-ticket
                                :id="candidate.id"
                                :nickname="candidate.nickname"
                                :name="candidate.name"
                                :surname="candidate.surname"
                                :img_link="candidate.img_link"
                        >
                        </person-ticket>
                    </div>
                </div>
                <shooter></shooter>
            </div>
        </div>
    </div>
</template>
<script>
    import Shooter from './block/Shooter.vue';
    import PersonTicket from './block/Person-Ticket.vue';
    import Logo from './block/Logo.vue';
    export default {
        components: {Shooter, PersonTicket, Logo},
        data () {
            return {
                candidates: [],
                code: '',
            }
        },
        mounted () {
            axios.get('/candidates').then(res => this.candidates = res.data)
        }
    }
</script>
<style lang="scss" scoped>
    #bg {
        position: absolute;
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