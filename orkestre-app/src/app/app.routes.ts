import { Routes } from '@angular/router';
import { CardEvenementComponent } from './pages/card-evenement/card-evenement.component';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { EvenementFormComponent } from './pages/evenement-form/evenement-form.component';

export const routes: Routes = [

    {
        path: '',
        component: HomePageComponent 
    },
    {
        path:'ShowAllEvenements',
        component:CardEvenementComponent
    },
     {
        path:'CreateEvenement',
        component:EvenementFormComponent
    },
];
