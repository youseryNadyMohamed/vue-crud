<template>
    <div class="card">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body p-0">
            <table v-if="posts.length > 0" class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">body</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts">
                    <th scope="col">{{post.id}}</th>
                    <th scope="col">{{post.title}}</th>
                    <th scope="col">{{post.body}}</th>
                    <td>
                        <router-link :to="'/post/edit/'+ post.id" class="text-secondary">edit</router-link>
                        <a @click="onDelete(post.id,post.title)" class="text-danger">delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "index",
        data(){
            return{
                posts:{}
            }
        },
        methods:{
            getPosts(){
                // this.form.get()
                axios.get('api/post').then((res)=>{
                    this.posts=res.data.data;
                }).catch()
            },
            onDelete(id,title){
                if (confirm('do you want delete ' + title)){
                    axios.delete('/api/post/'+id).then((res)=>{
                        this.getPosts();
                    }).catch((err)=>{
                        alert(err.response.data.message);
                    })
                }

            }
        },
        created() {
            this.getPosts();
        }
    }
</script>

<style scoped>

</style>
