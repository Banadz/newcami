<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import TButton from "@/Components/Button/TButton.vue";
import TFormSection from "@/Components/Form/TFormSection.vue";
import TFormContent from "@/Components/Form/TFormContent.vue";
// import 'simple-syntax-highlighter/dist/sshpre.css'
import TInputGroup from "@/Components/Form/TInputGroup.vue";
import TInputSelect from "@/Components/Form/Inputs/TInputSelect.vue";
import TCheckCircleIcon from "@/Components/Icon/TCheckCircleIcon.vue";
import TXCircleIcon from "@/Components/Icon/TXCircleIcon.vue";


</script>

<template>
    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Article > Insertion
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <t-form-content @reset="reset" @submitted="save">
                <t-form-section
                    description="This information is subject to personal data protection law."
                    title="Personal Infos">
                    <!-- Manager -->
                    <t-input-group class="col-span-12 md:col-span-6" label="Manager - Searchable" labelFor="user_id">
                        <t-input-select
                            v-model="form.user_id"
                            :clear-button="true"
                            :options="users"
                            :search="true"
                            optionsLabelKey="name"
                            optionsValueKey="id"
                            place-holder="Select a manager"
                            search-place-holder="Search a manager..."
                        />
                    </t-input-group>
                    <!-- Rich Options Content -->
                    <t-input-group class="col-span-12 md:col-span-6" label="Rich Options Content" labelFor="status">
                        <t-input-select
                            v-model="form.status"
                            :clear-button="true"
                            :options="status"
                            optionsLabelKey="name"
                            optionsValueKey="value"
                            place-holder="Select a status"
                        >
                            <template #label="{ props }">
                                <span v-if="props.value===true" class="flex flex-row items-center gap-1">
                  <t-check-circle-icon class="w-5 h-5 text-green-500 "/> {{ props.name }}
                </span>
                                <span v-if="props.value===false" class="flex flex-row items-center gap-1">
                                    <t-x-circle-icon class="w-5 h-5 text-red-500 items-center"/> {{ props.name }}
                                </span>
                            </template>
                        </t-input-select>
                    </t-input-group>
                    <!--Disabled-->
                    <t-input-group label="Disabled" class="col-span-12 md:col-span-6">
                        <t-input-select disabled/>
                    </t-input-group>
                    <!--Read Only-->
                    <t-input-group label="Read Only" class="col-span-12 md:col-span-6">
                        <t-input-select
                            :model-value="true"
                            :options="status"
                            options-value-key="value"
                            options-label-key="name"
                            read-only
                        >
                            <template #label="{ props }">
                                <span v-if="props.value===true" class="flex flex-row items-center gap-1">
                                    <t-check-circle-icon class="w-5 h-5 text-green-500 "/> {{ props.name }}
                                </span>
                                <span v-if="props.value===false" class="flex flex-row items-center gap-1">
                                    <t-x-circle-icon class="w-5 h-5 text-red-500 items-center"/> {{ props.name }}
                                </span>
                            </template>
                        </t-input-select>
                    </t-input-group>
                </t-form-section>
            </t-form-content>
                    <FormSection @submitted="">
                        <template #title>
                            Insérer un article
                        </template>

                        <template #description>
                            Veuillez remplir le formulaire d'insertion.
                        </template>



                        <template #form>
                            <!-- Compte -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="Compte" value="Compte" />
                                <TextInput
                                    id="compte"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="name"
                                />
                                <!-- <InputError :message="form.errors.name" class="mt-2" /> -->
                            </div>

                            <!-- Catégorie -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="Categorie" value="Catégorie" />
                                <TextInput
                                    id="categorie"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="categorie"
                                />
                                <!-- <InputError :message="form.errors.name" class="mt-2" /> -->
                            </div>

                            <!-- Désignation -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="Designation" value="Désignation" />
                                <TextInput
                                    id="designation"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="designation"
                                />
                                <!-- <InputError :message="form.errors.name" class="mt-2" /> -->
                            </div>

                            <!-- Spécification Technique -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="Specification" value="Spécification Technique" />
                                <TextInput
                                    id="specification"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="specification"
                                />
                                <!-- <InputError :message="form.errors.name" class="mt-2" /> -->
                            </div>

                            <!-- Unité -->
                            <div class="col-span-6 sm:col-span-4">
                                <InputLabel for="Unite" value="Type d'unité" />
                                <TextInput
                                    id="unite"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="Nombre"
                                />
                                <!-- <InputError :message="form.errors.name" class="mt-2" /> -->
                            </div>
                        </template>

                        <template #actions>

                            <PrimaryButton>Annuller</PrimaryButton>
                            <PrimaryButton>Insèrer</PrimaryButton>
                        </template>

                    </FormSection>
            </div>
        </div>
    </AppLayout>
</template>
