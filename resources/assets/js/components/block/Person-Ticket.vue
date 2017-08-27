<template>
    <div :class="className()">
        <div class="info">
            <h2>{{ candidate.nickname }}</h2>
            <p>{{ candidate.name }} {{ candidate.surname }}</p>
        </div>
        <div class="top">
            <img :src="`img/${candidate.img_link}`" alt="profile">
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
                      'col-xs-12',
                      'col-sm-6',
                      'col-md-3',
                      'choose',
                  ]
              } else {
                  return [
                      'ticket',
                      'col-xs-12',
                      'col-sm-6',
                      'col-md-3',
                  ]
              }
          }
        },
    }
</script>

<style lang="scss" scoped>
    .ticket {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        max-width: 350px;
        height: 445px;
        overflow: hidden;
        border-radius: 7px;
        position: relative;
        transform: scale(0.95);
        background: #fff;
        .top {
            width: 100%;
            height: 73%;
            background: linear-gradient(125deg, rgb(2, 109, 255), rgb(107, 204, 255));
            transform: rotate(5deg) scale(1.3);
            overflow: hidden;
            img {
                transform: rotate(-5deg);
                height: 110%;
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
        background: linear-gradient(-45deg, rgba(255, 120, 144, 0.9) 25%, rgba(255, 160, 65, 0.9) 75%);
        color: white;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
</style>
