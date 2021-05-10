<template>
    <breeze-authenticated-layout>
        <template #header>
            <section class="container mx-auto px-6 p-10">
                <div class="grid grid-cols-3 grid-rows-5 grid-flow-col">
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl "><b>Client:</b></div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl "><b>Description:</b></div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl "><b>Subtotal:</b></div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl "><b>Tax:</b></div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl "><b>Total:</b></div>

                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl ">{{ invoice.client_id }}</div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl ">{{ invoice.description }}
                    </div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl ">{{ invoice.subtotal }}</div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl ">{{ invoice.tax }}</div>
                    <div class=" rounded-md h-12 flex items-center justify-left text-2xl ">{{ invoice.total }}</div>
                </div>
            </section>
        </template>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'

export default {
    props: ['invoice'],
    components: {
        BreezeAuthenticatedLayout,
    },
    setup() {

    },

}
</script>
