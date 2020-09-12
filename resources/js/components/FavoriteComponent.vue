<template>
    <div>
        <button  v-if="show" @click="unsave()"  class="btn btn-dark"> Unsave </button>
        <button v-else @click="save()" class="btn btn-success"> save </button>
    </div>
</template>

<script>
    export default {
        props:['jobid','Fav'],
        mounted() {
             this.show = this.Fav ? true:false
        },
        data(){
            return{
                'show':true
            }
        },
        methods:
            {
                save(){
                    axios.post('/save/'+this.jobid)
                    .then(response=>this.show=true)
                    .catch(error=>alert('Error Generate'))
                },
                unsave(){
                    axios.post('/unsave/'+this.jobid)
                        .then(response=>this.show=false)
                        .catch(error=>alert('Error Generate'))
                },
            }
    }
</script>

<style scoped>

</style>
