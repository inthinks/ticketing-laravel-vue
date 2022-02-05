import AllTicket from './components/AllTicket.vue';
import PurchaseForm from './components/PurchaseForm.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: AllTicket
    },
    {
        name: 'detail',
        path: '/detail/:id',
        component: PurchaseForm
    }
];