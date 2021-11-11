// CreatePost.vue

<template>
    <div class="container">
        <div class="col-md-8 ml-auto mr-auto">
            <div class="form">
                <h3 class="text-center">Add New Product</h3>
                <form method="post" @submit.prevent="addPost">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" :class="['form-control', allerros.title ? 'is-invalid' : '']" name="title" id="title"
                               placeholder="Enter the title of the product" v-model="post.product_title" autofocus>
                        <div v-if="allerros.title" :class="['invalid-feedback']">
                            {{ allerros.title[0] }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea :class="['form-control', allerros.body ? 'is-invalid' : '']" name="description" id="description"
                                  placeholder="Enter the description of the product" v-model="post.product_desc" rows="5"></textarea>
                        <div v-if="allerros.body" :class="['invalid-feedback']">
                            {{ allerros.body[0] }}
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" :class="['form-control', allerros.price ? 'is-invalid' : '']" name="price" id="price"
                               placeholder="Enter the price of the product" v-model="post.product_price">
                        <div v-if="allerros.price" :class="['invalid-feedback']">
                            {{ allerros.price[0] }}
                        </div>
                    </div>



                    <button type="submit" class="btn btn-dark btn-lg btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {},
                allerros: [],
                success: false,
            }
        },
        methods: {
            addPost() {
                // console.log(this.post);
                let uri = 'http://127.0.0.1:8000/api/product/create';
                this.axios.post(uri, this.post).then((response) => {

                    event.preventDefault();
                    alert('Product successfully created');
                    this.$router.push({name: 'products'});

                }).catch((error) => {
                    this.allerros = error.response.data.errors;
                    this.success = false;
                });
            },
        },
    }
</script>
