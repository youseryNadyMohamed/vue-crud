<template>
    <form @submit.prevent="onSubmit">
        <alert-success :form="form" >updated successfully </alert-success>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" name="title" v-model="form.title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
            <has-error :form="form" field="title"></has-error>

        </div>
        <div class="form-group">
            <label >Password</label>
            <textarea class="form-control" v-model="form.body" name="body"></textarea>
            <has-error :form="form" field="body"></has-error>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
<script>
    export default {
        name: "edit",
        data(){
            return{
                form:new Form({
                    title:'',
                    body:'',
                }),
                id:0,

            }
        },
        methods: {
            onSubmit(){
                this.form.put('/api/post/'+this.id).then((response)=>{}).catch((err)=>{})
            },
            loadPost(){
                axios.get('/api/post/'+this.id).then((res)=>{
                    this.form.fill(res.data.data)
                })
            }
        },
        created(){
            this.id =this.$route.params.id;
            this.loadPost();
        }
    }
</script>


<style scoped>

</style>
