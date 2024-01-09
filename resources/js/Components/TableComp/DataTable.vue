<template>
    <div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Âge</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in data" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.age }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  export default {
    props: {
      data: Array, // Les données à afficher dans le tableau
    },
  };
  </script>

  <style scoped>
  /* Styles CSS pour le tableau, à personnaliser selon vos besoins */
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }

  thead {
    background-color: #f2f2f2;
  }
  </style>

