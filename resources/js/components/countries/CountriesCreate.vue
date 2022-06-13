<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveCountry">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.name">
                </div>
            </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-green-600 rounded-md border border-transparent">Create
        </button>
        <router-link :to="{ name: 'countries.index' }"
                     class="inline-flex items-center ml-2 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent">Back</router-link>
    </form>
</template>

<script>
import { reactive } from "vue";
import useCountries from "../../composables/countries";

export default {
    setup() {
        const form = reactive({
            'name': '',
        })

        const { errors, storeCountry } = useCountries()

        const saveCountry = async () => {
            await storeCountry({...form});
        }

        return {
            form,
            errors,
            saveCountry
        }
    }
}
</script>
