import { Component } from '@angular/core';
import { CardEvenementComponent } from "../card-evenement/card-evenement.component";

@Component({
  selector: 'app-home-page',
  imports: [CardEvenementComponent],
  templateUrl: './home-page.component.html',
  styleUrl: './home-page.component.css'
})
export class HomePageComponent {

}
