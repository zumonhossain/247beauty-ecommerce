<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#chatModal">
            Chat Now
        </button>

        <!-- Modal -->
        <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chat with {{ receiverName }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="sendMsg()">
                        <div class="modal-body">
                            
                                <div class="forrm-group">
                                    <textarea v-model="form.msg" class="form-control" id="" rows="3" placeholder="type your message"></textarea>
                                    <h4 class="text-success" v-if="succMessage.message">{{ succMessage.message }} </h4>
                                    <h4 class="text-danger" v-if="errors.msg">{{ errors.msg[0] }} </h4>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["receiverId", "receiverName", "productId"],

        data() {
            return {
            form: {
                msg: "",
                receiver_id: this.receiverId,
                product_id: this.productId,
            },

            errors: {},
            succMessage: {},

            };
        },

        methods:{
            sendMsg(){
                axios
                .post("/send-message", this.form)
                .then((result) => {
                    this.form.msg = "";
                    this.errors = "";
                    this.succMessage = result.data;
                    console.log(result.data);
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                    
                });
            }
        }
    }
</script>

<style>
    .modal-backdrop {
        position: relative;
    }
</style>