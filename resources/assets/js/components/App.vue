<template>
    <div>
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
</template>
<script>
    export default {
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