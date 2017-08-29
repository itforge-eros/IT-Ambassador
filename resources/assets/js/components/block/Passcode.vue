<template>
    <div id="passcode">
        <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="ticket">
                        <div class="info">

                        </div>
                        <div class="action">
                            <div class="row">
                                <form>
                                    <div class="form-group col-xs-12">
                                        <label for="pass_code">Enter your passcode:</label>
                                        <input maxlength="5" type="text" class="form-control" id="pass_code">
                                    </div>
                                </form>
                                <button type="button" class="col-xs-12 col-sm-6 btn btn-info" data-dismiss="modal">Close</button>
                                <button type="button" class="col-xs-12 col-sm-6 btn btn-info">Vote</button>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [],
    }
</script>

<style lang="scss" scoped>
    @media screen and (max-width: 320px) {
        .ticket {
            max-width: 290px!important;
        }
    }

    .ticket {
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        width: 60vw;
        height: auto;
        overflow: hidden;
        border-radius: 7px;
        position: relative;
        transform: scale(0.95);
        background: #fff;
        padding: 15px;
        margin: 0 auto;
        .action {
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            input {
                background: none;
                font-size: 60px;
                color: #fff;
                height: auto;
                text-align: center;
                text-transform: uppercase;
                font-family: cloud;
                font-weight: bold;
            }
            button {
                font-size: 16px;
                transform: scale(0.95);
            }

        }
    }
    .info {
        position: absolute;
        top: 0;
        left: 0;
        width: 120%;
        height: 60%;
        background: linear-gradient(125deg, rgb(2, 109, 255), rgb(107, 204, 255));
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
    .modal-dialog, .modal-content {
        width: 100vw;
        height: 100vh;
        margin: 0;
    }
    .modal-content {
        background: transparent;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: none;
        .form-control {

        }
    }
</style>
