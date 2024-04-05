<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DataTable from '@/Components/TableComp/DataTable.vue';


</script>
<script>

export default {
  components: {
    DataTable,
  },
  data() {
    return {
      myData: [
        { id: 1, name: "John Doe", age: 30 },
        { id: 2, name: "Jane Smith", age: 25 },
        // Ajoutez d'autres données ici
      ],
    };
  },
};
</script>
<template>
    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Article > Liste
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <DataTable :data="myData"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
