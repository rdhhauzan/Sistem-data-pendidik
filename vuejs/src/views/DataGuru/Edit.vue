<template>
     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <router-link :to="{ name: 'DataGuru.index'}" class="btn btn-primary btn-sm rounded shadow mb-3" >Back</router-link>
            </div>

            <div class="card rounded shadow">
                <div class="card-header">
                    Edit Data
                </div>
                <div class="card-body">
                   <form @submit.prevent="update()">
                       <div class="mb-3">
                           <label for="" class="form-label">Nama</label>
                           <input type="text" class="form-control" v-model="DataGuru.name">
                           <div v-if="validation.name" class="text-danger">
                               {{ validation.name [0] }}
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="" class="form-label">NISN</label>
                           <input type="number" class="form-control" v-model="DataGuru.nisn">
                           <div v-if="validation.nisn" class="text-danger">
                               {{ validation.nisn [0] }}
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="" class="form-label">Jenis Kelamin</label>
                           <select id="" class="form-select"  v-model="DataGuru.jeniskelamin">
                               <option value="L">Laki - Laki</option>
                               <option value="P">Perempuan</option>
                           </select>
                           <div v-if="validation.jeniskelamin" class="text-danger">
                               {{ validation.jeniskelamin [0] }}
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="" class="form-label">Umur</label>
                           <input type="number" class="form-control"  v-model="DataGuru.umur">
                           <div v-if="validation.umur" class="text-danger">
                               {{ validation.umur [0] }}
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="" class="form-label">Status</label>
                           <select id="" class="form-select"  v-model="DataGuru.status">
                               <option value="PNS">PNS</option>
                               <option value="Honorer">Honorer</option>
                           </select>
                           <div v-if="validation.status" class="text-danger">
                               {{ validation.status [0] }}
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="" class="form-label">Jabatan</label>
                           <input type="text" class="form-control"  v-model="DataGuru.jabatan">
                           <div v-if="validation.jabatan" class="text-danger">
                               {{ validation.jabatan [0] }}
                           </div>
                       </div>
                       <div class="mb-3">
                           <label for="" class="form-label">Mapel</label>
                           <input type="text" class="form-control"  v-model="DataGuru.mapel">
                           <div v-if="validation.mapel" class="text-danger">
                               {{ validation.mapel [0] }}
                           </div>
                       </div>
                       <button class="btn btn-outline-primary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { reactive, ref, onMounted } from 'vue'
    import { useRouter, useRoute } from 'vue-router'
    import axios from 'axios'

    export default {
        setup() {
            // data binding
            let DataGuru = reactive({
                name: '',
                nisn: '',
                jenisKelamin: '',
                umur: '',
                status: '',
                jabatan: '',
                mapel: '',
            });

            const validation = ref([]);

            const router = useRouter();
            const route = useRoute();

            onMounted(() => {
                axios.get(`http://127.0.0.1:8000/api/dataguru/${route.params.id}`)

                .then((result) => {
                    DataGuru.name = result.data.data.name
                    DataGuru.nisn = result.data.data.nisn
                    DataGuru.jeniskelamin = result.data.data.jenisKelamin
                    DataGuru.umur = result.data.data.umur
                    DataGuru.status = result.data.data.status
                    DataGuru.jabatan = result.data.data.jabatan
                    DataGuru.mapel = result.data.data.mapel
                }).catch((err) => {
                    console.log(err.response.data)
                });
            });

            function update() {
                axios.put(
                    `http://127.0.0.1:8000/api/dataguru/${route.params.id}`,
                    DataGuru
                )

                .then(() => {
                    router.push({
                        name: 'DataGuru.index'
                    });
                }).catch((err) => {
                    validation.value = err.response.data
                });
            }

            return {
                DataGuru,
                validation,
                router,
                update
            }
        }
    }
</script>