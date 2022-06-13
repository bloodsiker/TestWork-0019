import { createRouter, createWebHistory } from "vue-router";

import CompaniesIndex from '../components/companies/CompaniesIndex'
import CompaniesCreate from '../components/companies/CompaniesCreate'
import CompaniesEdit from '../components/companies/CompaniesEdit'
import CountriesIndex from "../components/countries/CountriesIndex";
import CountriesCreate from "../components/countries/CountriesCreate";
import CountriesEdit from "../components/countries/CountriesEdit";
import CityEdit from "../components/city/CityEdit";
import CityCreate from "../components/city/CityCreate";
import CityIndex from "../components/city/CityIndex";

const routes = [
    {
        path: '/companies',
        name: 'companies.index',
        component: CompaniesIndex
    },
    {
        path: '/companies/create',
        name: 'companies.create',
        component: CompaniesCreate
    },
    {
        path: '/companies/:id/edit',
        name: 'companies.edit',
        component: CompaniesEdit,
        props: true
    },
    {
        path: '/countries',
        name: 'countries.index',
        component: CountriesIndex
    },
    {
        path: '/countries/create',
        name: 'countries.create',
        component: CountriesCreate
    },
    {
        path: '/countries/:id/edit',
        name: 'countries.edit',
        component: CountriesEdit,
        props: true
    },
    {
        path: '/cities',
        name: 'cities.index',
        component: CityIndex
    },
    {
        path: '/cities/create',
        name: 'cities.create',
        component: CityCreate
    },
    {
        path: '/cities/:id/edit',
        name: 'cities.edit',
        component: CityEdit,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
