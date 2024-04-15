<template>
    <h1>Listado de Posts</h1>
    <o-table :loading="isLoading" :data="posts || []">
        <!-- ID -->
        <o-table-column field="id" label="ID" numeric v-slot="post">
            {{ post.row.id }}
        </o-table-column>
        <!-- Titulo -->
        <o-table-column field="title" label="Titulo" v-slot="post">
            {{ post.row.title }}
        </o-table-column>
        <!-- Publicado -->
        <o-table-column field="posted" label="Publicado" v-slot="post">
            {{ post.row.posted }}
        </o-table-column>
        <!-- Fecha -->
        <o-table-column field="created_at" label="Fecha" v-slot="post">
            {{ post.row.created_at }}
        </o-table-column>
        <!-- Categoria -->
        <o-table-column field="category" label="Categoria" v-slot="post">
            {{ post.row.category.title }}
        </o-table-column>
    </o-table>
</template>

<script setup>

import { ref, onMounted } from 'vue';
import axios from 'axios';

const posts = ref( [] );
const isLoading = ref( true );

/* ========================================
Obtener todos los posts
========================================= */
const getPosts = async () => {
    try {
        const response = await axios.get( '/api/post' );
        console.log( response.data ); // Check the data structure here
        posts.value = response.data.data;
        isLoading.value = false;
    } catch ( error ) {
        console.error( error );
    }
};

/* ========================================
Montar las funciones
========================================= */
onMounted( getPosts );

</script>
