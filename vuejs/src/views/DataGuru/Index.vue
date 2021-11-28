<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <router-link :to="{ name: 'DataGuru.create'}" class="btn btn-primary btn-sm rounded shadow mb-3" >Add</router-link>
            </div>

            <div class="card rounded shadow">
                <div class="card-header">
                    Data Guru List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Status</th>
                                <th>Jabatan</th>
                                <th>Mapel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(DataGuru, index) in DataGuru.data" :key="index">
                                <td>{{ DataGuru.name }}</td>
                                <td>{{ DataGuru.nisn }}</td>
                                <td>{{ DataGuru.jeniskelamin }}</td>
                                <td>{{ DataGuru.umur }}</td>
                                <td>{{ DataGuru.status }}</td>
                                <td>{{ DataGuru.jabatan }}</td>
                                <td>{{ DataGuru.mapel }}</td>
                                <td>
                                    <div class="btn-group">
                                        <router-link :to="{ name: 'DataGuru.edit', params:{id: DataGuru.id}}" class="btn btn-sm btn-outline-info">Edit</router-link>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import {onMounted, ref} from 'vue'

    export default {
        setup() {
            let DataGuru = ref([]);

            onMounted(() => {
                // get data from api endpoint
                axios.get('http://127.0.0.1:8000/api/dataguru')
                .then((result) => {
                    DataGuru.value = result.data
                }).catch((err) => {
                    console.log(err.response)
                });
            });

            return {
                DataGuru
            }
        }
    }
</script>