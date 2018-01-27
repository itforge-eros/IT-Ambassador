<template>
    <div :class="className()">
        <div class="info">
            <h2>{{ candidate.nickname }}</h2>
            <p>{{ candidate.name }} {{ candidate.surname }}</p>
        </div>
        <div class="top">
            <img :class="`candidate-${candidate.id}`" :src="`img/candidates/${candidate.id}.jpg`" alt="profile">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['candidate', 'selected'],
        methods: {
          className () {
              if (this.candidate.id === this.selected.id) {
                  return [
                      'ticket',
                      'choose',
                  ]
              } else {
                  return [
                      'ticket',
                  ]
              }
          }
        },
    }
</script>

<style lang="scss" scoped>

    @media screen and (max-width: 320px) {
        .ticket {
            max-width: 290px!important;
        }
    }

    .ticket {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        max-width: 320px;
        height: 445px;
        overflow: hidden;
        border-radius: 7px;
        position: relative;
        transform: scale(0.95);
        background: #fff;
        padding: 15px;
        margin: 0 auto;
        .top {
            width: 100%;
            height: 73%;
            background: linear-gradient(125deg, rgb(2, 109, 255), rgb(107, 204, 255));
            transform: rotate(5deg) scale(1.3);
            overflow: hidden;
            img {
                transform: rotate(-5deg) translateY(-38px);
                width: 110%;
                position: relative;
            }
        }
    }
    .info {
        position: absolute;
        bottom: 0;
        margin: 0 0 1rem 0;
        font-family: cloud;
        p {
            margin: 0;
            font-size: 1.7rem!important;
        }
        h2 {
            margin: 0;
            font-weight: bold;
        }
    }
    .choose {
        transform: scale(0.99);
        background: linear-gradient(-45deg, #ff4d2f, #54190f);
        color: white;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }

    //Style for Candidates

    .candidate-1 {
        
    }
    .candidate-2 {
        top: 20px;
    }
    .candidate-3 {
        top: 48px;
    }
    .candidate-4 {

    }
    .candidate-5 {
        top: 38px;
    }
    .candidate-6 {
        top: 6px;
    }
</style>
