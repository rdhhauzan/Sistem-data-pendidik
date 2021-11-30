<template>
     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <router-link :to="{ name: 'DataGuru.index'}" class="btn btn-primary btn-sm rounded shadow mb-3" >Back</router-link>
            </div>

            <div class="card rounded shadow">
                <div class="card-header">
                    Create Data
                </div>
                <div class="card-body">
                   <form @submit.prevent="store()">
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
    import { reactive, ref } from 'vue'
    import { useRouter } from 'vue-router'
    import axios from 'axios'

    export default {
        setup() {
            // data binding
            const DataGuru = reactive({
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

            function store() {
                axios.post(
                    '/api/dataguru',
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
                store
            }
        }
    }
</script>