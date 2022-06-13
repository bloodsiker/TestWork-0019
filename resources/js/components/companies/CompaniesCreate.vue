<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k"
             class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveCompany">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Country</label>
                <select id="country" @change="onChangeCountry($event)" v-model="form.country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                </select>
            </div>

            <div>
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">City</label>
                <select id="city" v-model="form.city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                </select>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.name">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.email">
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <div class="mt-1">
                    <input type="text" name="address" id="address"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.address">
                </div>
            </div>

            <div>
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <div class="mt-1">
                    <input type="text" name="website" id="website"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.website">
                </div>
            </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-green-600 rounded-md border border-transparent">Create
        </button>
        <router-link :to="{ name: 'companies.index' }"
                     class="inline-flex items-center ml-2 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent">Back</router-link>
    </form>
</template>

<script>
import { reactive, onMounted } from "vue";
import useCompanies from "../../composables/companies";
import useCountries from "../../composables/countries";

export default {
    setup() {
        const form = reactive({
            'country_id': '',
            'city_id': '',
            'name': '',
            'email': '',
            'address': '',
            'website': '',
        })

        const { errors, storeCompany } = useCompanies()
        const { countries, cities, getCountries, getCitiesByCountry } = useCountries()

        onMounted(getCountries)

        const saveCompany = async () => {
            await storeCompany({...form});
        }

        const onChangeCountry = (event) => {
            let countryId = event.target.value;
            getCitiesByCountry(countryId);
        }

        return {
            form,
            errors,
            cities,
            countries,
            saveCompany,
            onChangeCountry
        }
    }
}
</script>
