import { Routes } from '@angular/router';
import { CardEvenementComponent } from './pages/card-evenement/card-evenement.component';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { EvenementFormComponent } from './pages/evenement-form/evenement-form.component';
import { LoginComponent } from './pages/login/login.component';
import { SignInComponent } from './pages/sign-in/sign-in.component';

export const routes: Routes = [
  {
    path: '',
    component: HomePageComponent,
  },
  {
    path: 'ShowAllEvenements',
    component: CardEvenementComponent,
  },
  {
    path: 'createEvenement',
    component: EvenementFormComponent,
  },
  {
    path: 'Login',
    component: LoginComponent,
  },
  {
    path: 'SignIn',
    component: SignInComponent,
  },
];
