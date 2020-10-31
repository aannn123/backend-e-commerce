<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Belajar Vue Dalam Laravel</div>

                <div class="card-body">
                    Belajar Mengaplikasikan Vue Kedalam Laravel
                    <div v-for="prov in provinsi" :key="prov.id">
                        <p>{{prov.name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            provinsi: []
        }
    },

    mounted() {
        console.log('Component mounted.')
        axios
            .get("https://x.rajaapi.com/MeP7c5ne8X8nDTl9682Lq6ZATgwuujc52Na3U2tRLq3gq67UyyWexlHGRN/m/wilayah/provinsi")
            .then(res => (this.provinsi = res.data.data))
            .catch(err => console.log(err))
    }
}
</script>
