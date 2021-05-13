<template>
    <breeze-authenticated-layout>
        <div class="container mx-auto mt-10 px-10 p-10 h-100 bg-white"  v-if="can.view">
            <div class="grid grid-cols-3 grid-rows-6 grid-flow-col">
                <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Client:</b></div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Description:</b></div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Subtotal:</b></div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Tax:</b></div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Total:</b></div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl "><b>Accountant:</b></div>

                <div class=" rounded-md h-12 flex items-center justify-left text-xl ">{{ invoice.client.name }}</div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl ">{{ invoice.description }}
                </div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl ">{{ invoice.subtotal }}</div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl ">{{ invoice.tax }}</div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl ">{{ invoice.total }}</div>
                <div class=" rounded-md h-12 flex items-center justify-left text-xl ">
                    <select v-model="accountant">
                        <option disabled value="default">Please select one</option>
                        <option v-for="accountant in accountants"
                                v-bind:key="accountant.id"
                                :value="accountant"
                        >
                            {{ accountant.first_name }} {{ accountant.last_name }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container mx-auto mt-10 px-10 p-10 h-100 bg-white text-red-500 text-center" v-else>You don't have permissions to view</div>
    </breeze-authenticated-layout>
</template>


<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

export default {
    props: ['invoice', 'accountants', 'can'],
    components: {
        BreezeAuthenticatedLayout,
    },
    data() {
        return {
            accountant: (this.invoice.accountant != null) ? this.invoice.accountant : 'default'
        }
    },
    watch: {
        accountant: function () {
            let formData = new FormData();

            formData.append('accountant_id', this.accountant.id);
            axios.post("/invoice/update/" + this.invoice.id, formData);
        }
    }

}
</script>
