<template>
    <div id="ticket">
        <div id="over-header">
            <img id="logo" src="img/logo.png" alt="logo">
            <h3>Ambassdor</h3>
            <h6>2017</h6>
            <div id="text-vote">
                <h2>VOTING</h2>
                <h2>TICKET</h2>
            </div>
        </div>
        <div id="info">
            <p>{{ firstname }} {{ lastname }}</p>
        </div>
        <div id="top"></div>
    </div>
</template>

<script>
    export default {
        props: ['firstname', 'lastname']
    }
</script>

<style lang="scss" scoped>
    #ticket {
        width: 322px;
        height: 445px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        overflow: hidden;
        border-radius: 7px;
        position: relative;
        #top {
            width: 100%;
            height: 73%;
            background: linear-gradient(125deg, rgb(2, 109, 255), rgb(107, 204, 255));
            transform: rotate(5deg) scale(1.3);
        }
    }
    /*overcard content*/
    #over-header {
        position: absolute;
        padding: 1.4rem;
        z-index: 1;
        color: #fff;
        height: 65%;
        #logo {
            width: 46px;
            margin-right: 10px;
            float: left;
        }
        h3 {
            margin: 0;
            font-family: code;
            float: left;
            margin-top: 9px;
        }
        h6 {
            margin: 0;
            font-family: code;
        }
        #text-vote {
            position: absolute;
            font-family: Roboto;
            bottom: 0;
            h2 {
                margin: 0;
                &:first-child {
                    font-weight: 700;
                    font-size: 3rem;
                }
                &:last-child {
                    font-weight: 300;
                    font-size: 2rem;
                }
            }
        }
    }
    #info {
        position: absolute;
        bottom: 0;
        margin: 0 0 1rem 1rem;
        font-family: cloud;
        input {
            transition: 0.5s ease;
            border: none;
            border-bottom: 0px solid #c0c0c0;
            outline: none;
            font-size: 1.2rem;
            &:focus {
                border-bottom: 1px solid #808080;
            }
            &::-webkit-input-placeholder {
                font-family: "Cloud Light";
            }
            &::-moz-placeholder {
                font-family: "Cloud Light";
            }
            &:-ms-input-placeholder {
                font-family: "Cloud Light"
            }
            &:-moz-placeholder {
                font-family: "Cloud Light"
            }
        }
    }
</style>
